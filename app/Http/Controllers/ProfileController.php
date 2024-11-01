<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function showData(){
        $users = User::all();
        return view('editprof', compact('users'));
    }

    public function updateDataUpper(Request $request, string $id){
        $updatedData = User::find($id);

        User::where('id',$updatedData->id)->update([
            'nama_lengkap' => $request['inNama'],
            'username' => $request['inUsername'],
            'alamat' => $request['inAlamat'],
            'jenis_kelamin' => $request['inKelamin'],
        ]);

        return redirect('/editprof');
    }

    public function updateDataBelow(Request $request, string $id){
        $updatedData = User::find($id);
        $kriptpass = $request['inPassword'];
        $encryptedPassword = bcrypt($kriptpass);

        User::where('id',$updatedData->id)->update([
            'username' => $request['inUsername'],
            'email' => $request['inEmail'],
            'password' => $encryptedPassword,
            'telepon' => $request['inNotelp'],
        ]);
        return redirect('/editprof');
    }

    public function updateProfilePicture(Request $request, $id)
    {
        //dd($id);

        $rules = ['profile_img' => 'image|file|max:5060'];
        $data = $request->validate($rules);

        if($request->file('profile_img')) {
            $data['profile_img'] = $request->file('profile_img')->store('profile_pict', 'public');
        }
        dd($request);
        User::where('id', $id)->update($data);
        return redirect()->route('editprof');
    }


}
