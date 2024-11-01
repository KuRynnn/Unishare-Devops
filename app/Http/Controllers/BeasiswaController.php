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

    // public function showPostId($id){
    //     $data = Post::find($id);
    //     return view('admin.update-post', compact('data'));
    // }
    
    // public function deletePost($id){
    //     $data = Post::find($id);
    //     $data -> delete();
    //     return redirect()->route('admin');
    // }

    // public function updatePost(Request $request, $id){
    //     $data =  Post::find($id);
    //     $data -> update($request->all());
    //     return redirect()->route('admin');
    // }
}
