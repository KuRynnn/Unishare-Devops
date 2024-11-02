<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarBeasiswa;
use App\Models\Beasiswa;

class DaftarBeasiswaController extends Controller
{
    public function showForm(Beasiswa $id){
        $id->formatted_date = $id->updated_at->format('d F Y');
        return view('FormPendaftaranBeasiswa', ["post" => $id]);
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
