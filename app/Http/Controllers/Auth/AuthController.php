<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('profile'));
        }

        return back()->withErrors([
            'email' => '帳號或密碼錯誤。',
        ]);
    }

    public function loginByNTPCOpenID(Request $request)
    {
        $data = session(config('ntpcopenid.sessionKey'));

        $user = User::firstOrCreate(
            ['email' => $data['contact/email']],
            [
                'name' => $data['namePerson'],
                'password' => bcrypt(Str::random(20))
            ]
        );

        $user->name = $data['namePerson'];
        $user->save();

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->intended(route('profile'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect('/');
    }

    public function profile()
    {
        return view('profile', ['user' => auth()->user()]);
    }
}
