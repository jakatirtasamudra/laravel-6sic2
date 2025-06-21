<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function Login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect(url('/'))->with('error', 'harap isi form semuanya');
        }

        $user = User::where('email', $request->email)->where('password', $request->password)->first();
        if (!$user) {
            return redirect(url('/'))->with('error', 'harap isi form semuanya');
        } else {
            Session::put('auth_login', $user);
            return redirect(url('/admin'))->with('success', 'berhasil login');
        }
    }

    public function logout(Request $request)
    {
        Session::forget('auth_login');
        Session::forget('auth_login_mahasiswa');
        return redirect(url('/'))->with('success', 'berhasil logout');
    }

    // public function Login_Mahasiswa(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'nirm' => 'required',
    //         'hp' => 'required|numeric'
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect(url('/'))->with('error', 'harap isi form semuanya');
    //     }

    //     $user = mahasiswa::where('nirm', $request->nirm)->where('hp', $request->hp)->first();
    //     if (!$user) {
    //         return redirect(url('/'))->with('error', 'harap isi form semuanya');
    //     } else {
    //         Session::put('auth_login_mahasiswa', $user);
    //         return redirect(url('/mahasiswa'))->with('success', 'berhasil login');
    //     }
    // }
}
