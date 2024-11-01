<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KarirPost;

class KarirPostController extends Controller
{
    public function index(Request $request){
        $data = KarirPost::latest()->filter(request(['search']));
    
        if ($request->has('theme')) {
            $themes = $request->theme;
            $data->whereIn('tema', $themes);
        }
    
        if ($request->has('category')) {
            $category = $request->category;
            $data->where('kategori', $category);
        }
    
        $data = $data->paginate(2);
    
        return view('karir', compact('data'));
    }
    

    public function showCreateForm()
    {
        return view('admin.admin-create-karir');
    }

    public function showCreateForms()
    {
        return view('admin.admin-karir');
    }

    public function storeNewPost(Request $request)
    {
        // TO DO : VALIDASI DISINI 
        $adminId = 1;
        $incomingFields = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'kategori' => 'required',
            'tema' => 'required',
            'content' => 'required',
            'url_event' => 'required',
            'guidebook' => 'file', // Add file validation rule
            'banner_img' => 'image|file|max:5120', // Max uploaded img = 5MB
        ]);
         
        // TO DO : INPUT FILE
        if ($request->hasFile('guidebook')) {
            $incomingFields['guidebook'] = $request->file('guidebook')->store('guidebooks', 'public');
        }

        if ($request->hasFile('banner_img')) {
            $incomingFields['banner_img'] = $request->file('banner_img')->store('banners', 'public');
        }
        $incomingFields['admin_id'] = $adminId;

        KarirPost::create($incomingFields);
        return redirect('/admin');
    }


    public function viewPost(KarirPost $id) {
        $id->formatted_date = $id->updated_at->format('d F Y');
        return view('karir-post', ["post" => $id]);
    }
    
}
