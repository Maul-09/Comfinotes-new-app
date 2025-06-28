<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\AdminModel;
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
        $User = UserModel::all();


        $acountSetting = $Admin->concat($Bendahara);
        $departemens = DepartemenModel::all();
        $view = path_view('admin.dashboard-admin');
        return view($view, compact('acountSetting', 'departemens'));
    }

    public function detail(){
        $view = path_view('admin.detail-user');
        return view($view);
    }

    public function addAcount(Request $request){
       $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'password' => 'required|min:8',
            'role' => 'required|string|in:admin,bendahara'
        ],
        [
            'name.required' => 'Nama wajib di isi',
            'name.max' => 'Nama tidak boleh lebih dari 100 charachter',
            'email.required' => 'Email wajib di isi',
            'email.max' => 'Email tidak boleh lebih dari 100 charachter',
            'password.required' => 'Password wajib di isi',
            'password.min' => 'password tidak boleh kurang dari 8 character'

        ]);

        $acount = new AdminModel();
        $acount->name = $validated['name'];
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
        $acount = AdminModel::find( $id);

        $deletAcount = $acount->name;

        if($acount->image && File::exists(public_path('profile/' . $acount->image))){
             File::delete(public_path('profile/' . $acount->image));
        }

        $acount->delete();
        return redirect()->back()->with('success', 'Akun ' . $deletAcount . ' berhasil di hapus');
    }
}
