<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarBeasiswa;

class DaftarBeasiswaController extends Controller
{
    public function showForm()
    {
        return view('FormPendaftaranBeasiswa');
    }

    public function submitForm(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'reason' => 'required|string',
        ]);

        // Simpan ke database
        DaftarBeasiswa::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'reason' => $request->reason,
        ]);

        return redirect()->route('beasiswa')->with('success', 'Pendaftaran berhasil!');
    }
}
