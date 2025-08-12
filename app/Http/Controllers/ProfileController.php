<?php

namespace App\Http\Controllers;

use App\Models\Auth\AuthModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function App\Helpers\path_view;

class ProfileController
{
     public function profileAdmin(){
        $profileAdmin = AuthModel::where('role', 'admin')->firstOrFail();
        $view = path_view('admin.profile-admin');
        return view($view, compact('profileAdmin'));
    }

     public function profileBendahara(){
        $profileBendahara = AuthModel::where('role', 'bendahara')->firstOrFail();
        $view = path_view('bendahara.profile-bendahara');
        return view($view, compact('profileBendahara'));
    }

    public function updateProfile(Request $request){
        $request->validate([
            'username' => 'required|max:100',
            'password' => 'nullable|min:8',
            'image_profile' => 'nullable|mimes:jpeg,png,jpg|image|max:2048'
        ],[
            'username.required' => 'Username baru wajib di isi',
            'username.max' => 'Username maksimal 100 karakter',
            'password.min' => 'Password minimal 8 karakter',
            'image_profile.image' => 'File harus berupa gambar',
            'image_profile.mimes' => 'Format Harus : jpeg, jpg dan png'
        ]);

        $profile = AuthModel::where('role', 'admin')->first();

        if (!$profile) {
            return back()->with('error', 'User tidak ditemukan.');
        }

        $profile->username = $request->username;

        if ($request->filled('password')) {
            $profile->password = Hash::make($request->password);
        }

        if ($request->hasFile('image_profile')) {
            $imageProfile = time().'.'.$request->image_profile->extension();
            $request->image_profile->move(public_path('uploads/'), $imageProfile);
            $profile->image = $imageProfile;
        }

        $profile->save();

        return back()->with('success', 'Profil berhasil diperbarui.');
    }

}
