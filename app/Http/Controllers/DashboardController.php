<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KarirPost;
use App\Models\Post;
use App\Models\Beasiswa;

class DashboardController extends Controller
{
    public function showData(){
        $dataKarirPost = KarirPost::all();
        $dataPost = Post::all();
        $dataBeasiswa = Beasiswa::all();

        return view('dashboard', [
            'dataKarirPost' => $dataKarirPost,
            'dataPost' => $dataPost,
            'dataBeasiswa' => $dataBeasiswa,
        ]);
    }
}
