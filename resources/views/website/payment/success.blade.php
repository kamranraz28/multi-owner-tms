@extends('website.layouts.app')

@section('title') Payment Submitted @endsection

@section('content')
<style>
    .success-wrap {
        max-width: 580px; margin: 0 auto; padding: 80px 28px; text-align: center;
    }
    .success-icon {
        width: 72px; height: 72px; border-radius: 50%;
        background: #ecfdf5; color: #059669;
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 24px;
    }
    .success-wrap h1 {
        font-family: 'Bricolage Grotesque', sans-serif;
        font-size: clamp(1.6rem, 3vw, 2rem);
        font-weight: 800; color: var(--ink); letter-spacing: -0.04em; margin-bottom: 10px;
    }
    .success-wrap p { font-size: 15px; color: var(--muted); line-height: 1.7; margin-bottom: 6px; }
    .success-card {
        background: var(--card); border: 1.5px solid var(--border); border-radius: 20px;
        padding: 28px; margin: 28px 0; text-align: left;
    }
    .success-card .row {
        display: flex; justify-content: space-between; padding: 10px 0;
        font-size: 14px; border-bottom: 1px solid var(--border);
    }
    .success-card .row:last-child { border-bottom: none; }
    .success-card .label { color: var(--muted); font-weight: 600; }
    .success-card .value { color: var(--ink-2); font-weight: 700; }
    .btn-dashboard {
        display: inline-flex; align-items: center; gap: 8px;
        padding: 14px 32px; border-radius: 12px;
        background: var(--brand); color: #fff; text-decoration: none;
        font-family: inherit; font-size: 14.5px; font-weight: 800;
        transition: all 0.22s;
    }
    .btn-dashboard:hover {
        background: var(--brand-dark); transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(26,86,219,0.35);
    }
</style>

<div class="success-wrap">
    <div class="success-icon">
        <i data-lucide="check" style="width:34px;height:34px;"></i>
    </div>
    <h1>Payment Submitted!</h1>
    <p>Your payment request for <strong>{{ $transaction->plan->name }}</strong> plan has been received.</p>
    <p style="font-size:13px;color:var(--muted-2);">Our team will verify your payment within 24 hours. You'll be notified once approved.</p>

    <div class="success-card">
        <div class="row">
            <span class="label">Transaction ID</span>
            <span class="value">#{{ $transaction->id }}</span>
        </div>
        <div class="row">
            <span class="label">Plan</span>
            <span class="value">{{ $transaction->plan->name }}</span>
        </div>
        <div class="row">
            <span class="label">Amount</span>
            <span class="value">৳{{ number_format($transaction->amount) }}</span>
        </div>
        <div class="row">
            <span class="label">Payment Method</span>
            <span class="value" style="text-transform:capitalize;">{{ $transaction->payment_method }}</span>
        </div>
        <div class="row">
            <span class="label">Status</span>
            <span class="value" style="color:#d97706;">Pending Verification</span>
        </div>
    </div>

    <a href="{{ route('users.dashboard') }}" class="btn-dashboard">
        <i data-lucide="layout-dashboard" style="width:17px;height:17px;"></i>
        Go to Dashboard
    </a>
</div>
@endsection
