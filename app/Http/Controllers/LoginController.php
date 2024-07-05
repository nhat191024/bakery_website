<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Service\main\LoginService;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new LoginService();
    }

    public function loginPage()
    {
        return $this->service->loginPage();
    }

    public function login(Request $request)
    {
        return $this->service->loginAuth($request);
    }

    public function logout(Request $request)
    {
        return $this->service->logout($request);
    }
}
