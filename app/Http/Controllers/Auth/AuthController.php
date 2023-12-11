<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try{
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
            {
                /** @var User $user */
                $user = Auth::user();
                $token = $user->createToken('app')->accessToken;
                return response([
                    'message' => 'success',
                    'token' => $token,
                    'user' => $user
                ]);
            }
        } catch (\Exception $e) {
            return response([
                'message' => $e->getMessage()
            ]);
        }
        return response([
            'error' => 'invalid UserName/Password'
        ]);
    }
}
