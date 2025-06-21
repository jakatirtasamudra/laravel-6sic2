<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MahasiswaController extends Controller
{
    public function IndexMahasiswa()
    {
        $sess = Session::get('auth_login_mahasiswa');
    }
}
