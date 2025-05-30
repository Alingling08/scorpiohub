<?php

namespace App\Http\Controllers;

use App\Events\UserSubscribed;
use App\Http\Controllers\Controller;
use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function showLogin()
    {
        // Mail::to('sample@email.com')->send(new WelcomeMail(Auth::user()));

        return view('auth.login');
    }

    public function register(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        // Create a new user
        $user =  User::create($validatedData);
        Auth::login($user);

        event(new Registered($user));

        if ($request->subscribe) {
            event(new UserSubscribed($user));
        }

        return redirect()->route('products.index');
    }

    public function verifyNotice()
    {
        // if (Auth::check()) {
        //     return redirect()->route('products.index');
        // }

        return view('auth.verify-email');
    }

    //Email Verification Handler Route
    public function verifyEmail(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect()->route('products.index');
    }

    //Resending the Verification Email Route
    public function verifyHandler(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }

    public function login(Request $request)
    {
        // Step 1: Validate input
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $remember = $request->filled('remember'); // true if checkbox is checked

        // Step 2: Check if the user exists
        $user = User::where('email', $validatedData['email'])->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'This email is not registered.'
            ])->withInput();
        }

        // Step 3: Check if password is correct
        if (!Hash::check($validatedData['password'], $user->password)) {
            return back()->withErrors([
                'password' => 'Incorrect password.'
            ])->withInput();
        }

        // Step 4: Log the user in
        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->intended('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }
}
