@extends('website.layouts.app')

@section('title') Payment — {{ $plan->name }} @endsection

@section('content')
@php
    $isSilver = $plan->slug === 'silver';
    $isGold = $plan->slug === 'gold';
    $vatRate = 0.05;
    $subtotal = $plan->price;
    $vat = round($subtotal * $vatRate);
    $total = $subtotal + $vat;
    $icons = ['basic' => 'home', 'silver' => 'building-2', 'gold' => 'landmark'];
    $planIcon = $icons[$plan->slug] ?? 'home';
    $iconBg = $isSilver ? '#eff6ff' : ($isGold ? '#fffbeb' : '#f1f5f9');
    $iconColor = $isSilver ? '#1a56db' : ($isGold ? '#d97706' : '#475569');
    $taglines = [
        'basic' => 'For individual landlords getting started with property management.',
        'silver' => 'For growing property managers who need more power and control.',
        'gold' => 'For large agencies with custom requirements, scale & compliance needs.',
    ];
    $tagline = $taglines[$plan->slug] ?? '';
@endphp
<style>
    .pay-hero {
        padding: 60px 28px 40px;
        text-align: center;
        background: radial-gradient(ellipse 80% 50% at 50% -10%, rgba(26,86,219,0.08) 0%, transparent 65%), var(--surface);
    }
    .pay-hero h1 {
        font-family: 'Bricolage Grotesque', sans-serif;
        font-size: clamp(1.8rem, 3.5vw, 2.4rem);
        font-weight: 800; letter-spacing: -0.04em; color: var(--ink); margin-bottom: 8px;
    }
    .pay-hero p { font-size: 15px; color: var(--muted); }

    .pay-layout {
        max-width: 1100px; margin: 0 auto; padding: 0 28px 80px;
        display: grid; grid-template-columns: 1fr 380px; gap: 32px; align-items: start;
    }
    @media (max-width: 900px) { .pay-layout { grid-template-columns: 1fr; } }

    .pay-card {
        background: var(--card); border: 1.5px solid var(--border); border-radius: 20px;
        padding: 28px 30px; margin-bottom: 20px;
        transition: box-shadow 0.25s;
    }
    .pay-card:hover { box-shadow: 0 4px 20px rgba(13,21,38,0.06); }

    .pay-card-title {
        font-family: 'Bricolage Grotesque', sans-serif;
        font-size: 16px; font-weight: 800; color: var(--ink); letter-spacing: -0.03em;
        display: flex; align-items: center; gap: 9px; margin-bottom: 20px;
    }
    .pay-card-title .ico { color: var(--brand); display: flex; }

    /* Payment method radios */
    .pmethods { display: flex; flex-direction: column; gap: 10px; }
    .pmethod {
        display: flex; align-items: center; gap: 14px;
        padding: 14px 18px; border: 1.5px solid var(--border); border-radius: 14px;
        cursor: pointer; transition: all 0.2s; position: relative;
    }
    .pmethod:hover { border-color: var(--brand-border); background: var(--brand-light); }
    .pmethod input[type="radio"] {
        appearance: none; width: 20px; height: 20px; border-radius: 50%;
        border: 2px solid var(--border-2); flex-shrink: 0; margin: 0;
        transition: all 0.2s; position: relative;
    }
    .pmethod input[type="radio"]:checked {
        border-color: var(--brand); background: var(--brand);
        box-shadow: inset 0 0 0 4px white, 0 0 0 1px var(--brand);
    }
    .pmethod.selected { border-color: var(--brand); background: var(--brand-light); }
    .pmethod-ico {
        width: 40px; height: 40px; border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        background: var(--surface); flex-shrink: 0;
    }
    .pmethod-name { font-size: 14px; font-weight: 700; color: var(--ink); }
    .pmethod-desc { font-size: 12px; color: var(--muted); }

    /* Conditional payment details */
    .pay-detail { display: none; margin-top: 16px; padding-top: 16px; border-top: 1px solid var(--border); }
    .pay-detail.active { display: block; }

    /* Card form */
    .form-row { display: grid; gap: 14px; margin-bottom: 14px; }
    .form-row-2 { grid-template-columns: 1fr 1fr; }
    .form-label {
        display: block; font-size: 12.5px; font-weight: 700; color: var(--ink-2);
        margin-bottom: 5px; letter-spacing: -0.01em;
    }
    .form-input {
        width: 100%; padding: 11px 14px; border: 1.5px solid var(--border);
        border-radius: 10px; font-family: inherit; font-size: 14px; color: var(--ink);
        background: var(--card); transition: border-color 0.2s, box-shadow 0.2s;
        outline: none;
    }
    .form-input:focus { border-color: var(--brand); box-shadow: 0 0 0 3px rgba(26,86,219,0.1); }
    .form-input-wrap {
        position: relative; display: flex; align-items: center;
    }
    .form-input-wrap .prefix {
        position: absolute; left: 14px; color: var(--muted-2); font-size: 13px; font-weight: 600;
        pointer-events: none;
    }
    .form-input-wrap .form-input { padding-left: 36px; }

    /* bKash / Nagad */
    .mobile-wallet-info {
        display: flex; align-items: center; gap: 12px;
        background: var(--surface); border-radius: 12px; padding: 14px 18px;
        border: 1px solid var(--border);
    }
    .mobile-wallet-info .qr-placeholder {
        width: 64px; height: 64px; border-radius: 10px; background: var(--card);
        border: 1.5px dashed var(--border-2); display: flex; align-items: center; justify-content: center;
        color: var(--muted-2); flex-shrink: 0;
    }

    /* Sidebar */
    .pay-sidebar {
        position: sticky; top: 100px;
    }
    .sidebar-card {
        background: var(--card); border: 1.5px solid var(--border); border-radius: 20px;
        padding: 26px; margin-bottom: 16px;
    }
    .sidebar-plan {
        display: flex; align-items: center; gap: 14px; padding-bottom: 18px;
        border-bottom: 1px solid var(--border); margin-bottom: 18px;
    }
    .sidebar-plan-icon {
        width: 44px; height: 44px; border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
    }
    .sidebar-plan-name { font-size: 15px; font-weight: 800; color: var(--ink); letter-spacing: -0.02em; }
    .sidebar-plan-desc { font-size: 12px; color: var(--muted); }

    .sidebar-row {
        display: flex; justify-content: space-between; align-items: center;
        padding: 8px 0; font-size: 13.5px; color: var(--ink-2); font-weight: 500;
    }
    .sidebar-row.total {
        border-top: 1.5px solid var(--border); margin-top: 8px; padding-top: 14px;
        font-family: 'Bricolage Grotesque', sans-serif;
        font-size: 20px; font-weight: 800; color: var(--ink); letter-spacing: -0.03em;
    }
    .sidebar-row .label { color: var(--muted); font-weight: 600; }
    .sidebar-row .value { font-weight: 700; }

    .btn-pay {
        width: 100%; padding: 15px; border-radius: 12px;
        background: var(--brand); color: #fff; border: none;
        font-family: inherit; font-size: 15px; font-weight: 800;
        cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 9px;
        transition: all 0.22s; letter-spacing: -0.01em;
    }
    .btn-pay:hover {
        background: var(--brand-dark); transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(26,86,219,0.35);
    }

    .trust-row {
        display: flex; flex-wrap: wrap; justify-content: center; gap: 16px;
        padding: 14px; font-size: 12px; color: var(--muted-2); font-weight: 600;
    }
    .trust-row .item { display: flex; align-items: center; gap: 6px; }

    @media (max-width: 768px) {
        .pay-hero { padding: 40px 20px 28px; }
        .pay-layout { padding: 0 16px 60px; }
        .pay-card { padding: 20px; }
        .form-row-2 { grid-template-columns: 1fr; }
    }
</style>

<div class="pay-hero">
    <h1>Complete your payment</h1>
    <p>Secure checkout — your information is encrypted and safe.</p>
</div>

<form method="POST" action="{{ route('payment.store', $plan) }}">
    @csrf

<div class="pay-layout">

    <!-- ─── LEFT COLUMN ─── -->
    <div>

        <!-- Order Summary -->
        <div class="pay-card">
            <div class="pay-card-title">
                <span class="ico"><i data-lucide="shopping-cart" style="width:18px;height:18px;"></i></span>
                Order Summary
            </div>
            <div style="display:flex;align-items:center;gap:14px;">
                <div class="sidebar-plan-icon" style="background:{{ $iconBg }};color:{{ $iconColor }};">
                    <i data-lucide="{{ $planIcon }}" style="width:22px;height:22px;"></i>
                </div>
                <div>
                    <div class="sidebar-plan-name" style="margin-bottom:2px;">{{ $plan->name }} Plan</div>
                    <div class="sidebar-plan-desc">{{ $tagline }} · Billed {{ $plan->billing_cycle ?? 'monthly' }}</div>
                </div>
                <div style="margin-left:auto;font-family:'Bricolage Grotesque',sans-serif;font-size:22px;font-weight:800;color:var(--ink);letter-spacing:-0.03em;">
                    ৳{{ number_format($plan->price) }}
                </div>
            </div>
        </div>

        <!-- Payment Method -->
        <div class="pay-card">
            <div class="pay-card-title">
                <span class="ico"><i data-lucide="wallet" style="width:18px;height:18px;"></i></span>
                Payment Method
            </div>

            <div class="pmethods" id="paymentMethods">

                <!-- bKash -->
                <label class="pmethod selected" data-target="bkash-detail">
                    <input type="radio" name="payment_method" value="bkash" checked>
                    <div class="pmethod-ico" style="background:#fdf2f8;color:#d61c4e;">
                        <svg width="20" height="20" viewBox="0 0 48 48" fill="none"><path d="M10 6h28a4 4 0 0 1 4 4v28a4 4 0 0 1-4 4H10a4 4 0 0 1-4-4V10a4 4 0 0 1 4-4z" fill="#d61c4e"/><path d="M24 14c-5.523 0-10 4.477-10 10s4.477 10 10 10 10-4.477 10-10-4.477-10-10-10zm0 16a6 6 0 1 1 0-12 6 6 0 0 1 0 12z" fill="#fff"/></svg>
                    </div>
                    <div>
                        <div class="pmethod-name">bKash</div>
                        <div class="pmethod-desc">Pay with your bKash mobile wallet</div>
                    </div>
                </label>
                <div class="pay-detail active" id="bkash-detail">
                    <div class="mobile-wallet-info">
                        <div class="qr-placeholder">
                            <i data-lucide="qr-code" style="width:26px;height:26px;"></i>
                        </div>
                        <div>
                            <div style="font-size:13px;font-weight:700;color:var(--ink);margin-bottom:3px;">Send payment to:</div>
                            <div style="font-size:16px;font-weight:800;color:var(--brand);letter-spacing:-0.02em;">01XXX-XXXXXX</div>
                            <div style="font-size:11.5px;color:var(--muted);margin-top:3px;">After sending, enter your bKash TrxID below</div>
                        </div>
                    </div>
                    <div class="form-row" style="margin-top:14px;">
                        <div>
                            <label class="form-label">bKash Transaction ID</label>
                            <input class="form-input" type="text" name="transaction_id" placeholder="TrxID">
                        </div>
                    </div>
                </div>

                <!-- Nagad -->
                <label class="pmethod" data-target="nagad-detail">
                    <input type="radio" name="payment_method" value="nagad">
                    <div class="pmethod-ico" style="background:#fff7ed;color:#e9730e;">
                        <svg width="20" height="20" viewBox="0 0 48 48" fill="none"><circle cx="24" cy="24" r="18" fill="#e9730e"/><path d="M24 12L30 24l-6 12-6-12 6-12z" fill="#fff"/></svg>
                    </div>
                    <div>
                        <div class="pmethod-name">Nagad</div>
                        <div class="pmethod-desc">Pay with your Nagad account</div>
                    </div>
                </label>
                <div class="pay-detail" id="nagad-detail">
                    <div class="mobile-wallet-info">
                        <div class="qr-placeholder">
                            <i data-lucide="qr-code" style="width:26px;height:26px;"></i>
                        </div>
                        <div>
                            <div style="font-size:13px;font-weight:700;color:var(--ink);margin-bottom:3px;">Send payment to:</div>
                            <div style="font-size:16px;font-weight:800;color:var(--brand);letter-spacing:-0.02em;">01XXX-XXXXXX</div>
                            <div style="font-size:11.5px;color:var(--muted);margin-top:3px;">After sending, enter your Nagad TrxID below</div>
                        </div>
                    </div>
                    <div class="form-row" style="margin-top:14px;">
                        <div>
                            <label class="form-label">Nagad Transaction ID</label>
                            <input class="form-input" type="text" name="transaction_id" placeholder="TrxID">
                        </div>
                    </div>
                </div>

                <!-- Bank Transfer -->
                <label class="pmethod" data-target="bank-detail">
                    <input type="radio" name="payment_method" value="bank">
                    <div class="pmethod-ico" style="background:#f0fdf4;color:#059669;">
                        <i data-lucide="landmark" style="width:20px;height:20px;"></i>
                    </div>
                    <div>
                        <div class="pmethod-name">Bank Transfer</div>
                        <div class="pmethod-desc">Direct bank deposit / wire transfer</div>
                    </div>
                </label>
                <div class="pay-detail" id="bank-detail">
                    <div style="background:var(--surface);border-radius:12px;padding:14px 18px;border:1px solid var(--border);">
                        <div style="font-size:12.5px;font-weight:700;color:var(--ink-2);margin-bottom:8px;">Bank Account Details</div>
                        <div style="font-size:13px;color:var(--muted);line-height:2;">
                            <strong style="color:var(--ink-2);">Bank:</strong> Dutch-Bangla Bank Limited<br>
                            <strong style="color:var(--ink-2);">Account Name:</strong> PropNest Ltd.<br>
                            <strong style="color:var(--ink-2);">Account No:</strong> 123-456-789<br>
                            <strong style="color:var(--ink-2);">Routing No:</strong> 123456789<br>
                            <strong style="color:var(--ink-2);">Branch:</strong> Gulshan, Dhaka
                        </div>
                    </div>
                    <div class="form-row" style="margin-top:14px;">
                        <div>
                            <label class="form-label">Bank Transaction Ref</label>
                            <input class="form-input" type="text" name="transaction_id" placeholder="Deposit slip / reference no.">
                        </div>
                    </div>
                </div>

            </div>

        <!-- Billing Information -->
        <div class="pay-card">
            <div class="pay-card-title">
                <span class="ico"><i data-lucide="user" style="width:18px;height:18px;"></i></span>
                Billing Information
            </div>
            <div class="form-row form-row-2">
                <div>
                    <label class="form-label">Full Name</label>
                    <input class="form-input" type="text" name="name" placeholder="John Doe" required>
                </div>
                <div>
                    <label class="form-label">Email</label>
                    <input class="form-input" type="email" name="email" placeholder="john@example.com" required>
                </div>
            </div>
            <div class="form-row form-row-2">
                <div>
                    <label class="form-label">Phone</label>
                    <div class="form-input-wrap">
                        <span class="prefix">+880</span>
                        <input class="form-input" type="text" name="phone" placeholder="1XXX-XXXXXX" style="padding-left:48px;" required>
                    </div>
                </div>
                <div>
                    <label class="form-label">City</label>
                    <input class="form-input" type="text" name="city" placeholder="Dhaka">
                </div>
            </div>
            <div class="form-row">
                <div>
                    <label class="form-label">Address</label>
                    <input class="form-input" type="text" name="address" placeholder="House, Road, Area">
                </div>
            </div>
        </div>

    </div>

    <!-- ─── RIGHT COLUMN (SIDEBAR) ─── -->
    <div class="pay-sidebar">

        <div class="sidebar-card">
            <div class="sidebar-plan">
                <div class="sidebar-plan-icon" style="background:{{ $iconBg }};color:{{ $iconColor }};">
                    <i data-lucide="{{ $planIcon }}" style="width:22px;height:22px;"></i>
                </div>
                <div>
                    <div class="sidebar-plan-name">{{ $plan->name }} Plan</div>
                    <div class="sidebar-plan-desc">{{ $plan->billing_cycle ?? 'Monthly' }}</div>
                </div>
            </div>

            <div class="sidebar-row">
                <span class="label">Subtotal</span>
                <span class="value">৳{{ number_format($subtotal) }}</span>
            </div>
            <div class="sidebar-row">
                <span class="label">VAT (5%)</span>
                <span class="value">৳{{ number_format($vat) }}</span>
            </div>
            <div class="sidebar-row total">
                <span>Total</span>
                <span style="color:var(--brand);">৳{{ number_format($total) }}</span>
            </div>
        </div>

        <button type="submit" class="btn-pay">
            <i data-lucide="lock" style="width:17px;height:17px;"></i>
            Pay ৳{{ number_format($total) }}
        </button>

        <div class="trust-row">
            <span class="item"><i data-lucide="lock" style="width:13px;height:13px;"></i> SSL Secure</span>
            <span class="item"><i data-lucide="refresh-ccw" style="width:13px;height:13px;"></i> 30-day refund</span>
            <span class="item"><i data-lucide="headphones" style="width:13px;height:13px;"></i> 24/7 support</span>
        </div>

        <div style="text-align:center;font-size:12px;color:var(--muted-2);font-weight:500;padding:8px 0;">
            <i data-lucide="shield-check" style="width:13px;height:13px;display:inline;vertical-align:middle;margin-right:4px;"></i>
            Secured by industry-standard encryption
        </div>

    </div>

</div>

</form>

<script>
    function syncPaymentMethod(targetId) {
        document.querySelectorAll('.pay-detail').forEach(d => {
            d.classList.remove('active');
            d.querySelectorAll('input[name="transaction_id"]').forEach(inp => inp.disabled = true);
        });
        const target = document.getElementById(targetId);
        if (target) {
            target.classList.add('active');
            target.querySelectorAll('input[name="transaction_id"]').forEach(inp => inp.disabled = false);
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const checked = document.querySelector('#paymentMethods input[name="payment_method"]:checked');
        if (checked) {
            const label = checked.closest('.pmethod');
            syncPaymentMethod(label.dataset.target);
        }
    });

    // Payment method toggle
    document.querySelectorAll('#paymentMethods .pmethod').forEach(el => {
        el.addEventListener('click', function(e) {
            if (e.target.tagName === 'INPUT') return;
            const radio = this.querySelector('input[type="radio"]');
            if (radio) radio.checked = true;
            radio.dispatchEvent(new Event('change', { bubbles: true }));
        });
    });

    document.querySelectorAll('#paymentMethods input[name="payment_method"]').forEach(radio => {
        radio.addEventListener('change', function() {
            document.querySelectorAll('#paymentMethods .pmethod').forEach(p => p.classList.remove('selected'));
            this.closest('.pmethod').classList.add('selected');
            syncPaymentMethod(this.closest('.pmethod').dataset.target);
        });
    });
</script>

@endsection
