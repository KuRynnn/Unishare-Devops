<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function showLoginForm(){
        Session::put('login_admin_flag', false);
        return view('auth.login');
    }

    
    /**
     * Handle authentication of the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   


    public function showRegisterForm(){
        return response()->view('auth.register');
    }

    public function showLoginFormAdmin(){
        return response()->view('auth.login-admin');
    }

    public function login(Request $request)
    {
   
    if($request -> username == 'admin' && $request -> password == 'admin'){
        Session::put('login_admin_flag', true);
        return redirect()->route('admin');    
    }
    $user = User::where('username', $request->username)->first();
        if ($user && password_verify($request->password, $user->password)) {
            Auth::login($user);
            $token = $user->createToken('auth_token')->plainTextToken;
            $data = [
                'signature' => $user->createToken('JWT_SECRET')->accessToken,
                'user' => $user,
                'token' => $token,
            ];
            return redirect()->route('dashboard')->with('success', 'Login successful. Welcome back, '. $user->name)->with('user', $user)->with('data', $data)->with('refresh', true);
        }else {
            return redirect()->route('login')->with('error', 'Invalid credentials');
        }
    }
public function register(Request $request){

    if ($request->password != $request->password_confirmation) {
            return view('auth.login');
    }
    $encryptedPassword = bcrypt($request->password);
    $user = User::create([
        'nama_lengkap' => $request->name,
        'username' => $request->username,
        'password' => $encryptedPassword,
        'email' => $request->email,
    ]);

    Auth::login($user);
    if ($user) {
        $token = $user->createToken('auth_token')->plainTextToken;
        $data = [
            'signature' => $user->createToken('JWT_SECRET')->accessToken,
            'user' => $user,
            'token' => $token,
        ];
        session(['user_data' => $data]);
        // Jika Anda ingin mengembalikan tampilan
        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'success',
                'data' => $data,
            ]);
        } else {
            return view('auth.login');
        }
    }
}

public function logout(){
    return view('landing');
}
}