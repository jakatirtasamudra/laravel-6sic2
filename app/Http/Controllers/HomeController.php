<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Mahasiswa()
    {
        return view('mahasiswa');
    }

    public function Mahasiswa_Simpan(Request $request)
    {
        $datas = [
            'nirm' => $request['nirm'],
            'nama' => $request['nama'],
            'hp' => $request['hp'],
            'prodi' => $request['prodi'],
        ];
        $simpan = mahasiswa::create($datas);
        if (!$simpan) {
            return redirect('/')->with('error', 'tidak berhasil simpan data');
        } else {
            return redirect('/')->with('success', 'berhasil simpan data');
        }
    }
}
