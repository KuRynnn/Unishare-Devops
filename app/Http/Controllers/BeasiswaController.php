<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beasiswa;

class BeasiswaController extends Controller
{
    public function index(){
        return view('beasiswa', [
            "data" => Beasiswa::latest()->filter(request(['search']))->paginate(2)
        ]);
    }

    // public function userUploadedPosts(){
    //     return view('admin.admin-dashboard', ["data" => Beasiswa::all()]);
    // }

    public function showCreateForm()
    {
        return view('admin.admin-create-beasiswa');
    }

    // public function showCreateForms()
    // {
    //     return view('admin.admin-event');
    // }

    public function storeNewPost(Request $request)
    {
        $adminId = 1;
        $incomingFields = $request->validate([
            'title' => 'required',
            'jenis_beasiswa' => 'required',
            'due_date_beasiswa' => 'required',
            'penyelenggara_beasiswa' => 'required',
            'deskripsi_beasiswa' => 'required',
            'beasiswa_img' => 'image|file|max:5120',
            'beasiswa_url' => 'required'
        ]);

        // Handle file uploads
        if ($request->hasFile('beasiswa_img')) {
            $incomingFields['beasiswa_img'] = $request->file('beasiswa_img')->store('banners', 'public');
        }
        $incomingFields['admin_id'] = $adminId;

        Beasiswa::create($incomingFields);
	    return redirect()->route('admin');
    }

    public function viewPost(Beasiswa $id){
        $id->formatted_date = $id->updated_at->format('d F Y');
        return view('beasiswa-post', ["post" => $id]);
    }

    public function showPostId($id) {
        $data = Beasiswa::findOrFail($id); // Menemukan postingan berdasarkan ID
        return view('admin.update-beasiswa', compact('data')); // Tampilkan form edit dengan data beasiswa
    }
    
    public function updatePost(Request $request, $id) {
        $data = Beasiswa::findOrFail($id); // Menemukan postingan yang akan diperbarui
        
        // Validasi input yang diterima dari form update
        $incomingFields = $request->validate([
            'title' => 'required',
            'jenis_beasiswa' => 'required',
            'due_date_beasiswa' => 'required',
            'penyelenggara_beasiswa' => 'required',
            'deskripsi_beasiswa' => 'required',
            'beasiswa_img' => 'image|file|max:5120',
            'beasiswa_url' => 'required'
        ]);
    
        // Jika ada gambar baru yang diunggah, update gambar
        if ($request->hasFile('beasiswa_img')) {
            $incomingFields['beasiswa_img'] = $request->file('beasiswa_img')->store('banners', 'public');
        }
    
        $data->update($incomingFields); // Update data beasiswa
        return redirect()->route('admin')->with('success', 'Beasiswa updated successfully');
    }
    
    public function deletePost($id) {
        $data = Beasiswa::findOrFail($id); // Menemukan postingan yang akan dihapus
        $data->delete(); // Menghapus data beasiswa
        return redirect()->route('admin')->with('success', 'Beasiswa deleted successfully');
    }
    
}