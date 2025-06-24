<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function Admin()
    {
        $mahasiswa = mahasiswa::select('id', 'nirm', 'nama', 'hp', 'prodi', 'status', 'created_at', 'bayar')->orderBy('created_at', 'DESC')->get();
        return view('admin', [
            'auth' => Session::get('auth_login'),
            'mahasiswa' => $mahasiswa,
        ]);
    }

    public function Admin_Hapus($id)
    {
        $hapus = mahasiswa::findOrFail($id);
        $hapus->delete();

        if (!$hapus) {
            return redirect(url('/admin'))->with('error', 'tidak berhasil hapus data');
        } else {
            return redirect(url('/admin'))->with('success', 'berhasil hapus data');
        }
    }

    public function Admin_Tolak($id)
    {
        $update = mahasiswa::findOrFail($id);
        $update->status = 'tolak';
        $update->save();

        if (!$update) {
            return redirect(url('/admin'))->with('error', 'tidak berhasil tolak mahasiswa data');
        } else {
            return redirect(url('/admin'))->with('success', 'berhasil tolak mahasiswa data');
        }
    }

    public function Admin_Validasi($id)
    {
        $update = mahasiswa::findOrFail($id);
        $update->status = 'validasi';
        $update->save();

        if (!$update) {
            return redirect(url('/admin'))->with('error', 'tidak berhasil validasi mahasiswa data');
        } else {
            return redirect(url('/admin'))->with('success', 'berhasil validasi mahasiswa data');
        }
    }

    public function Admin_Bayar($id)
    {
        $update = mahasiswa::findOrFail($id);
        $update->status = 'selesai';
        $update->save();

        if (!$update) {
            return redirect(url('/admin'))->with('error', 'tidak berhasil selesai mahasiswa data');
        } else {
            return redirect(url('/admin'))->with('success', 'berhasil selesai mahasiswa data');
        }
    }

    public function Admin_TolakBayar($id)
    {
        $update = mahasiswa::findOrFail($id);
        $update->bayar = null;
        $update->save();

        if (!$update) {
            return redirect(url('/admin'))->with('error', 'tidak berhasil tolak bayar mahasiswa data');
        } else {
            return redirect(url('/admin'))->with('success', 'berhasil tolak bayar mahasiswa data');
        }
    }
}
