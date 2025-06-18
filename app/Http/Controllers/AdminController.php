<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function Admin()
    {
        $mahasiswa = mahasiswa::select('id', 'nirm', 'nama', 'hp', 'prodi')->get();
        return view('admin', [
            'auth' => Session::get('auth_login'),
            'mahasiswa' => $mahasiswa,
        ]);
    }
}
