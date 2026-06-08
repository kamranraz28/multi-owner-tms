<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;



class LoginController extends Controller
{
    //
    public function userLogin(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Authenticate the user
            Auth::login($user);

            return redirect()->intended(route('users.dashboard'));
        } else {
            return redirect()->back()->withErrors(['email' => 'Invalid credentials.']);
        }
    }

    public function userLogout(Request $request)
    {
        Auth::logout(); // Log out the user

        $request->session()->invalidate(); // Invalidate the session

        $request->session()->regenerateToken(); // Regenerate CSRF token

        return redirect(''); // Redirect to login page
    }

    public function resetPassord()
    {
        return view('passwordReset');
    }

    public function sendOTP(Request $request)
    {
        // Validate the email
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        // Get the user by email
        $user = User::where('email', $request->email)->first();
        // dd($user);

        if ($user) {
            // Generate OTP (can be a random string or number)
            //$otp = Str::random(6); // You can also use rand(100000, 999999) for a numeric OTP
            $otp = rand(100000, 999999);
            //dd($otp);

            // Update user's password to OTP (hash the OTP)
            $user->password = Hash::make($otp);
            $user->save();

            // Send the OTP via email
            Mail::send('otp', ['otp' => $otp, 'user' => $user], function ($message) use ($user) {
                $message->to($user->email);
                $message->subject('Your OTP for Login');
            });


            return redirect()->back()->with('success', 'An OTP has been sent to your email. Use this OTP as password and Login.');
        }

        return redirect()->back()->with('error', 'This email is not correct.');
        try {

            // user fetch
            $user = \App\Models\User::where('email', $request->email)->first();

            // generate OTP
            $otp = rand(100000, 999999);

            // send mail
            Mail::send('otp', [
                'otp' => $otp,
                'user' => $user
            ], function ($message) use ($user) {

                $message->to($user->email);
                $message->subject('Your OTP for Login');

            });

            return response()->json([
                'success' => true,
                'message' => 'OTP sent successfully'
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ]);

        }
    }

}
