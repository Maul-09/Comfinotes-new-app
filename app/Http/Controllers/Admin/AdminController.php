<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\AdminModel;
use App\Models\Auth\AuthModel;
use App\Models\Bendahara\BendaharaModel;
use App\Models\User\DepartemenModel;
use App\Models\User\UserModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use function App\Helpers\path_view;

class AdminController extends Controller
{
    public function admin()
    {
        $Admin = AdminModel::all();
        $Bendahara = BendaharaModel::all();

        $acountSetting = $Admin->concat($Bendahara);
        $departemens = DepartemenModel::all();
        $view = path_view('admin.dashboard-admin');
        return view($view, compact('acountSetting', 'departemens'));
    }

    public function detail($key_id){
        $departemens = DepartemenModel::where('name_divisi', $key_id)->firstOrFail();
        $data = $departemens->users;
        $view = path_view('admin.detail-user');
        return view($view, compact('departemens', 'data'));
    }

    public function addAcount(Request $request){
       $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'username' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'password' => 'required|min:8',
            'role' => 'required|string|in:admin,bendahara'
        ],
        [
            'username.required' => 'Nama wajib di isi',
            'username.max' => 'Nama tidak boleh lebih dari 100 charachter',
            'email.required' => 'Email wajib di isi',
            'email.max' => 'Email tidak boleh lebih dari 100 charachter',
            'password.required' => 'Password wajib di isi',
            'password.min' => 'password tidak boleh kurang dari 8 character'

        ]);

        $acount = new AuthModel();
        $acount->username = $validated['username'];
        $acount->email = $validated['email'];
        $acount->role = $validated['role'];
        $acount->password = Hash::make($validated['password']);

        if($request->hasFile('image')){
            $image = time() . "." . $request->image->extension();
            $request->image->move(public_path('profile/'), $image);
            $acount->image = $image;
        }

        $acount->save();
        return redirect()->back()->with('success', 'Akun Berhasil ditambahkan');
    }

    public function deleteAcount($id){
        $acount = AuthModel::find( $id);

        $deletAcount = $acount->username;

        if($acount->image && File::exists(public_path('profile/' . $acount->image))){
             File::delete(public_path('profile/' . $acount->image));
        }

        $acount->delete();
        return redirect()->back()->with('success', 'Akun ' . $deletAcount . ' berhasil di hapus');
    }

    public function AddUser(Request $request){
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'username' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'divisi_id' => 'required|exists:departemens,id'
        ]);

        $departemen = DepartemenModel::where('name_divisi', $request->divisi_name)->first();

        AuthModel::created([
            'image' => $departemen->image_divisi,
            'username' => $departemen->name_divisi,
            'email' => $request->email,
            'password' => hash::make($request->password),
            'role' => 'user',
            'divisi_id' => $departemen->divisi_id
        ]);

        return redirect()->back()->with('success', 'User Berhasil ditambahkan');
    }
}
