<?php

namespace App\Service\main;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class LoginService
{
    public function loginAuth(Request $request)
    {
        $request->validate(
            [
                'username' => ['required', 'string'],
                'password' => ['required', 'string'],
            ],
            [
                'username.required' => 'Username, email, SĐT không được để trống!',
                'password.required' => 'Mật khẩu không được để trống!'
            ]
        );

        $usernameInput = $request->input('username');
        $typeOfInputValue = filter_var($usernameInput, FILTER_VALIDATE_EMAIL) ? 'email'
            : (is_numeric($usernameInput) ? 'phone' : 'username');

        $loginData = [
            $typeOfInputValue => $usernameInput,
            'password' => $request->input('password')
        ];

        if (!Auth::attempt($loginData)) {
            return redirect()->route('main.login')->with('message', 'Thông tin không hợp lệ!');
        }
        /** @var \App\Models\User $user **/  $user = Auth::user();
        if ($user->status == 0) {
            return redirect()->route('main.login')->with('message', 'Người dùng đã bị khoá!');
        }
        return redirect()->intended(route('admin.index'));
    }

    public function loginPage()
    {
        return view('main/login/login');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('main.login');
    }
}
