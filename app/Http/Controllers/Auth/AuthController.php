<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginView()
    {
        return view('pages.auth.login');
    }

    public function registerView()
    {
        $roles = Role::all();
        return view('pages.auth.register',compact('roles'));
    }

    public function login(Request $request)
    {
        try{
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
            {
                /** @var User $user */
                $user = Auth::user();
                $token = $user->createToken('app')->accessToken;
                return view('pages.home');
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

    public function register(RegisterRequest $request)
    {
        try
        {
            User::create([
                'first_name' => $request->input('first_name'),
                'last_name'=> $request->input('last_name'),
                'role_id' => $request->input('role'),
                'email'=> $request->input('email'),
                'password' => Hash::make($request->input('password'))
            ]);
            return view('pages.home');
        } catch (\Exception $e) {
            return response([
                'message'=> 'Error'. $e->getMessage()
            ],400);
        }
    }
}
