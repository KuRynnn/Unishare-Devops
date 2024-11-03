<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function showForm()
    {
        return view('pendaftaran-event');
    }

    
    public function register(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:registrations,email',
            'phone' => 'required|numeric',
            'event_origin' => 'required|string|max:255',
        ]);

        
        Registration::create([
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'event_origin' => $request->input('event_origin'),
        ]);

        return redirect()->route('event.form')->with('success', 'Pendaftaran berhasil!');
    }
}
