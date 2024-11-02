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
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'event_origin' => $request->event_origin,
        ]);

        return redirect()->route('event.form')->with('success', 'Pendaftaran berhasil!');
    }
}
