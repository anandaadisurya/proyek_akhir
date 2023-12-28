<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;

class AuthController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function index()
    {

        return view('auth.login');
    }

    public function auth(Request $request)
    {
        //  dd($request->all());

        $validated = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            $notification = array(
                'status' => 'toast_success',
                'title' => 'Login Berhasil',
                'message' => 'Login Berhasil',

            );

            $id = Auth::user()->id;

            $update = User::find($id);
            $update->updated_at = now();
            $update->save();

            return redirect()->intended('/dashboard')->with($notification);
        }

        $notification = array(
            'status' => 'error',
            'title' => 'Login Gagal',
            'message' => 'Username / Password Salah',
        );
        return back()->with($notification);
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // You can customize this part based on your needs, for example, send a verification email.
        $user->save();
        $notification = [
            'status' => 'toast_success',
            'title' => 'Registration Successful',
            'message' => 'You have successfully registered. Please log in.',
        ];


        return redirect('/dashboard')->with($notification);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $notification = array(
            'status' => 'toast_success',
            'title' => 'Logout berhasil',
            'message' => 'Terima kasih telah menggunakan aplikasi kami'
        );

        return redirect('/')->with($notification);
    }

    public function forget()
    {
        return view('auth.forget');
    }
}
