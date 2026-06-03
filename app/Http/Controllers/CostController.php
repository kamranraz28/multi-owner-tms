<?php

namespace App\Http\Controllers;

use App\Models\Cost;
use App\Models\Costdetail;
use App\Models\Service;
use Illuminate\Http\Request;

class CostController extends Controller
{
    public function index()
    {
        $orgId = auth()->user()->organization_id;
        $costs = Cost::where('organization_id', $orgId)->get();

        return view('costs.index', compact('costs'));
    }

    public function create()
    {
        $orgId = auth()->user()->organization_id;
        $services = Service::where('organization_id', $orgId)->get();

        return view('costs.create', compact('services'));
    }

    public function store(Request $request)
    {
        $orgId = auth()->user()->organization_id;

        $request->validate([
            'date' => 'required|date',
            'service_id' => 'required|array',
            'service_id.*' => 'required|exists:services,id',
            'amount' => 'required|array',
            'amount.*' => 'required|numeric|min:0',
            'voucher' => 'nullable|array',
            'voucher.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $cost = Cost::create([
            'date' => $request->date,
            'organization_id' => $orgId,
        ]);

        foreach ($request->service_id as $index => $serviceId) {
            $voucherName = null;

            if ($request->hasFile("voucher.$index")) {
                $voucherFile = $request->file("voucher.$index");
                $voucherName = time() . '_' . uniqid() . '.' . $voucherFile->getClientOriginalExtension();
                $voucherFile->storeAs('public/vouchers', $voucherName);
            }

            Costdetail::create([
                'cost_id' => $cost->id,
                'service_id' => $serviceId,
                'amount' => $request->amount[$index],
                'memo_upload' => $voucherName,
            ]);
        }

        return redirect()->route('costs.index')->with('success', 'Costs added successfully.');
    }

    public function show($id)
    {
        $orgId = auth()->user()->organization_id;
        $cost = Cost::with('costDetails')
            ->where('organization_id', $orgId)
            ->findOrFail($id);

        return view('costs.show', compact('cost'));
    }

    public function edit($id)
    {
        $orgId = auth()->user()->organization_id;
        $cost = Cost::with('costDetails')
            ->where('organization_id', $orgId)
            ->findOrFail($id);
        $services = Service::where('organization_id', $orgId)->get();

        return view('costs.edit', compact('cost', 'services'));
    }

    public function update(Request $request, $id)
    {
        $orgId = auth()->user()->organization_id;

        $request->validate([
            'date' => 'required|date',
            'service_id' => 'required|array',
            'service_id.*' => 'required|exists:services,id',
            'amount' => 'required|array',
            'amount.*' => 'required|numeric|min:0',
            'voucher' => 'nullable|array',
            'voucher.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $cost = Cost::where('organization_id', $orgId)->findOrFail($id);
        $cost->date = $request->date;
        $cost->save();

        foreach ($request->service_id as $index => $serviceId) {
            $voucherName = null;

            if ($request->hasFile("voucher.$index")) {
                $voucherFile = $request->file("voucher.$index");
                $voucherName = time() . '_' . uniqid() . '.' . $voucherFile->getClientOriginalExtension();
                $voucherFile->storeAs('public/vouchers', $voucherName);
            }

            Costdetail::updateOrCreate(
                ['cost_id' => $cost->id, 'service_id' => $serviceId],
                ['amount' => $request->amount[$index], 'memo_upload' => $voucherName]
            );
        }

        return redirect()->route('costs.index')->with('success', 'Costs updated successfully.');
    }

    public function destroy($id)
    {
        $orgId = auth()->user()->organization_id;
        $cost = Cost::where('organization_id', $orgId)->findOrFail($id);
        $cost->costDetails()->delete();
        $cost->delete();

        return redirect()->route('costs.index')->with('success', 'Cost deleted successfully.');
    }
}
