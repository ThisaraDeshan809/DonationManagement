<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Donator;
use App\Models\Issuer;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

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
                if($user->role_id == 1)
                {
                    Session::flash('success', 'Successfully logged in');
                    return view('pages.home');
                } elseif($user->role_id == 2) {
                    Session::flash('success', 'You Are a Donator...Please Contact Administrator');
                    return redirect()->back();
                } else {
                    Session::flash('success', 'You Are a Issuer...Please Contact Administrator');
                    return redirect()->back();
                }

            }
            Session::flash('fail', 'Credentials are Wrong! Please try again');
            return redirect(route('login.View'));
        } catch (\Exception $e) {
            return response([
                'message' => $e->getMessage()
            ]);
        }
    }

    public function register(RegisterRequest $request)
    {
        try
        {
            $result = User::create([
                'first_name' => $request->input('first_name'),
                'last_name'=> $request->input('last_name'),
                'role_id' => $request->input('role'),
                'email'=> $request->input('email'),
                'password' => Hash::make($request->input('password'))
            ]);
            if($request->role == 1)
            {
                if ($result) {
                    session()->flash('success', 'User registration successful');
                    return view('pages.auth.login');
                }
            } elseif($request->role == 2) {
                $result2 = Donator::create([
                    'user_id' => $result->id,
                    'first_name' => $request->input('first_name'),
                    'last_name'=> $request->input('last_name'),
                    'email'=> $request->input('email'),
                ]);
                if ($result2) {
                    session()->flash('success', 'Donator registration successful');
                    return redirect()->back();
                }
            } else {
                $result3 = Issuer::create([
                    'user_id' => $result->id,
                    'first_name' => $request->input('first_name'),
                    'last_name'=> $request->input('last_name'),
                    'email'=> $request->input('email'),
                ]);
                if ($result3) {
                    session()->flash('success', 'Donator registration successful');
                    return redirect()->back();
                }
            }

            session()->flash('fail', 'User registration failed');
            return redirect()->back();

        } catch (\Exception $e) {
            return response([
                'message'=> 'Error'. $e->getMessage()
            ],400);
        }
    }

    public function logout()
    {
        $user = Auth::user();
        if ($user) {
            $user->tokens->each(function ($token) {
                $token->delete();
            });
        }
        Auth::logout();
        session()->flash('success', 'User Logout successful');
        return view('pages.auth.login');
    }
}
