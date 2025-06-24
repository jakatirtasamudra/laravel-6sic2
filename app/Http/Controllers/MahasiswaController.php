<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MahasiswaController extends Controller
{
    public function IndexMahasiswa()
    {
        $sess = Session::get('auth_login_mahasiswa');
        return view('dashmahasiswa', [
            'auth' => $sess,
        ]);
    }

    public function IndexMahasiswa_Bayar($id)
    {
        $update = mahasiswa::findOrFail($id);
        $update->bayar = '1';
        $update->save();

        if (!$update) {
            return redirect(url('/mahasiswa'))->with('error', 'tidak berhasil bayar mahasiswa data');
        } else {
            return redirect(url('/mahasiswa'))->with('success', 'berhasil bayar mahasiswa data');
        }
    }
}
