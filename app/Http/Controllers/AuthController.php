<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function verify(Request $request){
    $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $remember = $request->filled('remember'); // <--- Tambahan

    if (Auth::guard('user')->attempt([
        'email' => $request->email,
        'password' => $request->password
    ], $remember)) {
        return redirect()->intended('/admin');
    } else {
        return redirect(route('auth.index'))->with('pesan', 'Kombinasi email dan password salah');
        }
    }

    public function logout(){
        if(Auth::guard('user')->check()){
            Auth::guard('user')->logout();
        }
        return redirect(route('auth.index'));
    }

}
