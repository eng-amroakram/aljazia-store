<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PanelController extends Controller
{

    protected $authentication;

    public function __construct(Authentication $authentication)
    {
        $this->authentication = $authentication;
    }

    public function login(Request $request)
    {
        return $this->authentication->login($request);
    }

    public function logout()
    {
        $user = auth()->guard('sanctum')->user();
        return  $this->authentication->logout($user);
    }
}




