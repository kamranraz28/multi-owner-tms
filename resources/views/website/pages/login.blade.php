<<<<<<< HEAD
=======
@extends('website.layouts.app')

@section('title', 'Login page')

@section('content')

>>>>>>> c57bb21 (subscription module)
<section id="login-section" style="min-height:100vh; display:flex; align-items:center; justify-content:center; padding:80px 20px; background:#f8fafc;">

    <div style="width:100%; max-width:420px;" class="fu d1">

        <!-- Header -->
        <div style="text-align:center; margin-bottom:28px;">
            <div style="display:inline-flex; align-items:center; gap:6px; padding:6px 12px; border-radius:999px; background:#eef2ff; color:#4338ca; font-size:12px; font-weight:500;">
                <i data-lucide="lock" style="width:12px;height:12px;"></i>
                Secure Login
            </div>

            <h2 style="margin-top:14px; font-size:26px; font-weight:700; color:#0f172a;">
                Welcome Back
            </h2>
            <p style="font-size:13px; color:#64748b; margin-top:6px;">
                Login to access your property dashboard
            </p>
        </div>

        <!-- Card -->
        <div style="background:#ffffff; border:1px solid #e2e8f0; border-radius:18px; padding:26px; box-shadow:0 20px 40px rgba(15,23,42,0.06);">

<<<<<<< HEAD
            <form method="POST" action="{{ route('login') }}">
=======
            <form method="POST" action="{{ route('website.login.submit') }}">
>>>>>>> c57bb21 (subscription module)
            @csrf

            <!-- Email -->
                <div style="margin-bottom:14px;">
                    <label style="font-size:12px; color:#475569; font-weight:500;">Email</label>
                    <div style="display:flex; align-items:center; gap:10px; margin-top:6px; padding:12px 14px; border:1px solid #e2e8f0; border-radius:12px; background:#f8fafc;">
                        <i data-lucide="mail" style="width:16px;height:16px;color:#64748b;"></i>
                        <input type="email" name="email" placeholder="Enter your email"
                               style="width:100%; border:none; outline:none; background:transparent; font-size:14px;">
                    </div>
                </div>

                <!-- Password -->
                <div style="margin-bottom:16px;">
                    <label style="font-size:12px; color:#475569; font-weight:500;">Password</label>
                    <div style="display:flex; align-items:center; gap:10px; margin-top:6px; padding:12px 14px; border:1px solid #e2e8f0; border-radius:12px; background:#f8fafc;">
                        <i data-lucide="key-round" style="width:16px;height:16px;color:#64748b;"></i>
                        <input type="password" name="password" placeholder="Enter your password"
                               style="width:100%; border:none; outline:none; background:transparent; font-size:14px;">
                    </div>
                </div>

                <!-- Remember + Forgot -->
                <div style="display:flex; justify-content:space-between; align-items:center; font-size:12px; margin-bottom:18px;">
                    <label style="display:flex; align-items:center; gap:6px; color:#64748b;">
                        <input type="checkbox">
                        Remember me
                    </label>

                    <a href="#" style="color:#4f46e5; text-decoration:none;">Forgot password?</a>
                </div>

                <!-- Button -->
                <button type="submit"
                        style="width:100%; display:flex; align-items:center; justify-content:center; gap:8px;
                    background:#4f46e5; color:white; padding:12px 14px; border:none;
                    border-radius:12px; font-weight:600; cursor:pointer;">
                    <i data-lucide="log-in" style="width:16px;height:16px;"></i>
                    Login
                </button>

                <div style="text-align:center; font-size:12px; color:#64748b; margin-top:14px;">
                    Don’t have an account?
                    <a href="#" style="color:#4f46e5; font-weight:500;">Sign up</a>
                </div>
            </form>

        </div>

    </div>

</section>
<<<<<<< HEAD
=======

@endsection
>>>>>>> c57bb21 (subscription module)
