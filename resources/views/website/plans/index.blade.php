@extends('website.layouts.app')

@section('title', 'Login page')

@section('content')
    <section id="plans-section" style="padding: 88px 0 80px;">
        <div class="section-wrap">
            <div class="section-header">
                <div class="section-tag"><i data-lucide="layers" style="width:16px;height:16px;"></i> Plans &amp; Pricing
                </div>
                <h2 class="section-title">Find your perfect plan</h2>
                <p class="section-sub">Start free, scale when you're ready. No surprises — transparent BDT pricing.</p>
            </div>

            <!-- Billing toggle -->
            <div class="billing-pill-wrap fu d3">
                <div class="billing-pill">
                    <button class="pill-btn active" id="btn-monthly" onclick="setBilling('monthly')">Monthly</button>
                    <button class="pill-btn" id="btn-yearly" onclick="setBilling('yearly')">Yearly</button>
                </div>
                <span class="save-tag">
                <i data-lucide="sparkles" style="width:13px;height:13px;"></i>
                Save 20%
            </span>
            </div>

            <div class="plans-grid">
                @foreach($plans as $plan)
                    @php
                        $isSilver = $plan->slug === 'silver';
                        $isGold = $plan->slug === 'gold';
                        $colors = [
                            'basic' => ['icon_bg' => '#f1f5f9', 'icon_color' => '#475569', 'price_color' => '', 'currency_color' => ''],
                            'silver' => ['icon_bg' => '#eff6ff', 'icon_color' => '#1a56db', 'price_color' => 'color:#1447b7;', 'currency_color' => 'color:#5a8adc;'],
                            'gold' => ['icon_bg' => '#fffbeb', 'icon_color' => '#d97706', 'price_color' => 'color:#92400e;', 'currency_color' => 'color:#c4881a;'],
                        ];
                        $c = $colors[$plan->slug] ?? $colors['basic'];
                    @endphp

                    <div class="plan-card fu {{ $isSilver ? 'is-pro' : '' }} {{ $isGold ? 'is-ent' : '' }} d1">
                        @if($isSilver)
                            <div class="popular-badge">
                                <i data-lucide="star" style="width:11px;height:11px;fill:white;"></i>
                                Most Popular
                            </div>
                        @endif

                        <div class="plan-icon" style="background:{{ $c['icon_bg'] }}; color:{{ $c['icon_color'] }}; {{ $isSilver ? 'margin-top:18px;' : '' }}">
                            <i data-lucide="{{ $plan->slug === 'gold' ? 'landmark' : ($plan->slug === 'silver' ? 'building-2' : 'home') }}" style="width:24px;height:24px;"></i>
                        </div>
                        <div class="plan-name" style="{{ $isSilver ? 'color:#1447b7;' : ($isGold ? 'color:#92400e;' : '') }}">{{ $plan->name }}</div>
                        <div class="plan-tagline">{{ $plan->slug === 'basic' ? 'For individual landlords getting started with property management.' : ($plan->slug === 'silver' ? 'For growing property managers who need more power and control.' : 'For large agencies with custom requirements, scale & compliance needs.') }}</div>

                        <div class="price-block">
                            <div class="price-main" style="{{ $c['price_color'] }}">
                                <span class="currency" style="{{ $c['currency_color'] }}">৳</span>
                                <span class="pm-price">{{ number_format($plan->price) }}</span>
                                @if($isSilver)
                                    <span class="crossed pm-crossed" style="display:none;">৳{{ number_format($plan->price * 1.25) }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="price-cycle">per month · billed <span class="cycle-word">monthly</span></div>

                        @if($plan->trial_days > 0)
                            <div class="trial-badge" style="{{ $isGold ? 'background:#fef9c3; border-color:rgba(217,119,6,0.25); color:#92400e;' : '' }}">
                                <i data-lucide="gift" style="width:12px;height:12px;"></i>
                                {{ $plan->trial_days }}-day free trial
                            </div>
                        @endif

                        <div class="chip-grid">
                            <div class="chip-card">
                                <div class="chip-val">{{ $plan->max_properties >= 999999 ? '∞' : $plan->max_properties }}</div>
                                <div class="chip-label">Properties</div>
                            </div>
                            <div class="chip-card">
                                <div class="chip-val">{{ $plan->max_tenants >= 999999 ? '∞' : $plan->max_tenants }}</div>
                                <div class="chip-label">Tenants</div>
                            </div>
                            <div class="chip-card">
                                <div class="chip-val">{{ $plan->max_users >= 999999 ? '∞' : $plan->max_users }}</div>
                                <div class="chip-label">Users</div>
                            </div>
                        </div>

                        @auth
                            <form method="POST" action="{{ route('subscribe', $plan) }}">
                                @csrf
                                <button class="btn-plan {{ $isSilver ? 'btn-plan-primary' : ($isGold ? 'btn-plan-amber' : 'btn-plan-outline') }}">
                                    @if($isGold)
                                        <i data-lucide="phone-call" style="width:16px;height:16px;"></i>
                                        Contact sales
                                    @else
                                        <i data-lucide="zap" style="width:16px;height:16px;"></i>
                                        Subscribe — {{ $plan->name }}
                                    @endif
                                </button>
                            </form>
                            @if($isGold)
                                <div class="btn-sub-note">Custom pricing available · {{ $plan->trial_days }}-day trial</div>
                            @else
                                <div class="btn-sub-note">No credit card needed · Cancel anytime</div>
                            @endif
                        @else
                            <a href="{{ route('register', ['plan' => $plan->id]) }}" class="btn-plan {{ $isSilver ? 'btn-plan-primary' : ($isGold ? 'btn-plan-amber' : 'btn-plan-outline') }}" style="text-decoration:none; display:flex; align-items:center; justify-content:center;">
                                @if($isGold)
                                    <i data-lucide="phone-call" style="width:16px;height:16px;"></i>
                                    Contact sales
                                @else
                                    <i data-lucide="play-circle" style="width:16px;height:16px;"></i>
                                    Start free trial
                                @endif
                            </a>
                            <div class="btn-sub-note">{{ $isGold ? 'Custom plans available · '.$plan->trial_days.'-day trial' : 'No credit card needed · Cancel anytime' }}</div>
                        @endauth
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
