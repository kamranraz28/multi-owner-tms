@extends('website.layouts.app')

@section('title') Payment Failed @endsection

@section('content')
<style>
    .failed-wrap {
        max-width: 520px; margin: 0 auto; padding: 80px 28px; text-align: center;
    }
    .failed-icon {
        width: 72px; height: 72px; border-radius: 50%;
        background: #fef2f2; color: #dc2626;
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 24px;
    }
    .failed-wrap h1 {
        font-family: 'Bricolage Grotesque', sans-serif;
        font-size: clamp(1.6rem, 3vw, 2rem);
        font-weight: 800; color: var(--ink); letter-spacing: -0.04em; margin-bottom: 10px;
    }
    .failed-wrap p { font-size: 15px; color: var(--muted); line-height: 1.7; margin-bottom: 24px; }
    .btn-group { display: flex; flex-wrap: wrap; justify-content: center; gap: 12px; }
    .btn-retry {
        display: inline-flex; align-items: center; gap: 8px;
        padding: 14px 32px; border-radius: 12px;
        background: var(--brand); color: #fff; text-decoration: none;
        font-family: inherit; font-size: 14.5px; font-weight: 800;
        transition: all 0.22s;
    }
    .btn-retry:hover {
        background: var(--brand-dark); transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(26,86,219,0.35);
    }
    .btn-plans {
        display: inline-flex; align-items: center; gap: 8px;
        padding: 14px 32px; border-radius: 12px;
        background: transparent; color: var(--ink-2); text-decoration: none;
        border: 1.5px solid var(--border-2); font-family: inherit; font-size: 14.5px; font-weight: 700;
        transition: all 0.2s;
    }
    .btn-plans:hover { border-color: var(--brand); color: var(--brand); }
</style>

<div class="failed-wrap">
    <div class="failed-icon">
        <i data-lucide="x" style="width:34px;height:34px;"></i>
    </div>
    <h1>Payment Failed</h1>
    <p>Something went wrong with your payment. Please try again or choose a different payment method.</p>
    <div class="btn-group">
        <a href="javascript:history.back()" class="btn-retry">
            <i data-lucide="refresh-ccw" style="width:17px;height:17px;"></i>
            Try Again
        </a>
        <a href="{{ route('plans') }}" class="btn-plans">
            <i data-lucide="layers" style="width:17px;height:17px;"></i>
            Back to Plans
        </a>
    </div>
</div>
@endsection
