<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{

    public function index(){
        return view('admin.admin-dashboard');
    }

    public function viewusers()
    {
        $data = User::all();
        return view('admin.view-users', compact('data'));
    }

    public function showdata($id){
        $data = User::find($id);
        return view('admin.update-user', compact('data'));
    }

    public function updatedata(Request $request, $id){
        $data = User::find($id);
        $data -> update($request -> all());
        return redirect()->route('view-users');
    }

    public function delete($id){
        $data = User::find($id);
        $data -> delete();
        return redirect()->route('view-users');
    }

    public function downloadUserInfo()
    {
        $userData = User::all();
        $csvExporter = new \Laracsv\Export();
        $csvExporter->build($userData, ['id', 'name', 'email', 'username', 'password', 'created_at', 'updated_at'])->download();
    }
}
