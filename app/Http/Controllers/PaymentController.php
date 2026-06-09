<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Transaction;
use App\Models\Subscription;
use App\Models\SubscriptionHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['success', 'failed']);
    }

    public function show(Plan $plan)
    {
        return view('website.payment.index', compact('plan'));
    }

    public function store(Request $request, Plan $plan)
    {
        $user = auth()->user();
        $org = $user->organization;

        if (!$org) {
            return redirect()->route('plans')->with('error', 'No organization found.');
        }

        $validated = $request->validate([
            'payment_method' => 'required|in:bkash,nagad,bank',
            'transaction_id' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'city' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:500',
        ]);

        $total = $plan->price;

        $existingPendingApproved = Transaction::where('organization_id', $org->id)
            ->where('status', ['pending', 'approved'])
            ->first();

        if ($existingPendingApproved) {
            return redirect()->back()->with('error', 'You already have a pending or approved transaction.');
        }

        $transaction = Transaction::create([
            'user_id' => $user->id,
            'organization_id' => $org->id,
            'plan_id' => $plan->id,
            'amount' => $total,
            'payment_method' => $validated['payment_method'],
            'transaction_id' => $validated['transaction_id'],
            'status' => 'pending',
            'billing_data' => [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'city' => $validated['city'],
                'address' => $validated['address'],
            ],
        ]);

        return redirect()->route('payment.success', ['transaction' => $transaction->id]);
    }

    public function success(Transaction $transaction)
    {
        if ($transaction->user_id !== auth()->id()) {
            abort(403);
        }
        return view('website.payment.success', compact('transaction'));
    }

    public function failed()
    {
        return view('website.payment.failed');
    }

    public function index()
    {
        $transactions = Transaction::with(['user', 'organization', 'plan'])
            ->orderBy('created_at', 'desc')
            ->get();
        return view('transactions.index', compact('transactions'));
    }

    public function approve(Transaction $transaction)
    {
        if ($transaction->status !== 'pending') {
            return redirect()->back()->with('error', 'Transaction is already ' . $transaction->status);
        }

        DB::transaction(function () use ($transaction) {
            $org = $transaction->organization;
            $plan = $transaction->plan;

            $existingActive = $org->subscriptions()->where('status', 'active')->first();
            $existingTrialing = $org->subscriptions()->where('status', 'trialing')->first();

            if ($existingActive) {
                $existingActive->update([
                    'status' => 'cancelled',
                    'ends_at' => now(),
                    'cancelled_at' => now(),
                ]);
            }

            if ($existingTrialing) {
                $existingTrialing->update(['status' => 'expired']);
            }

            $subscription = Subscription::create([
                'organization_id' => $org->id,
                'plan_id' => $plan->id,
                'status' => 'active',
                'price' => $plan->price,
                'billing_cycle' => $plan->billing_cycle ?? 'monthly',
                'starts_at' => now(),
            ]);

            $org->update([
                'plan_id' => $plan->id,
                'trial_ends_at' => null,
            ]);

            SubscriptionHistory::create([
                'subscription_id' => $subscription->id,
                'event' => 'activated',
                'metadata' => json_encode([
                    'plan' => $plan->name,
                    'source' => 'manual_payment',
                    'transaction_id' => $transaction->id,
                ]),
            ]);

            $transaction->update([
                'status' => 'approved',
                'approved_at' => now(),
                'approved_by' => auth()->id(),
            ]);
        });

        return redirect()->route('transactions.index')->with('success', 'Transaction approved. Subscription activated.');
    }

    public function reject(Request $request, Transaction $transaction)
    {
        if ($transaction->status !== 'pending') {
            return redirect()->back()->with('error', 'Transaction is already ' . $transaction->status);
        }

        $request->validate([
            'admin_note' => 'nullable|string|max:1000',
        ]);

        $transaction->update([
            'status' => 'rejected',
            'admin_note' => $request->admin_note,
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaction rejected.');
    }
}
