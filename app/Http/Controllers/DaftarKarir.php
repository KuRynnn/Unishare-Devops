<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pendaftaran;
use App\Models\KarirPost;

class DaftarKarir extends Controller
{

    public function showForm(KarirPost $karir_post_id){
        $karir_post_id->formatted_date = $karir_post_id->updated_at->format('d F Y');
        return view('formdaftarkarir', ["post" => $karir_post_id]);
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
        pendaftaran::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'reason' => $request->reason,
        ]);

        return redirect()->route('karir')->with('success', 'Pendaftaran berhasil!');
    }
}