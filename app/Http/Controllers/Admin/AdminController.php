<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\AdminModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

use function App\Helpers\path_view;

class AdminController extends Controller
{
    public function admin()
    {
        $acountSetting = AdminModel::all();
        $view = path_view('admin.dashboard-admin');
        return view($view, compact('acountSetting'));
    }

    public function addAcount(Request $request){
       $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'password' => 'required|min:8',
            'role' => 'required|string|in:admin,bendahara'
        ]);

        $acount = new AdminModel();
        $acount->name = $validated['name'];
        $acount->email = $validated['email'];
        $acount->role = $validated['role'];
        $acount->password = Hash::make($validated['password']);

        if($request->hasFile('image')){
            $image = time() . "." . $request->image->extension();
            $request->image->move(public_path('image/'), $image);
            $acount->image = $image;
        }

        $acount->save();
        return redirect()->back()->with('success', 'Akun Berhasil ditambahkan');
    }

    public function deleteAcount($id){
        $acount = AdminModel::find( $id);

        if(!$acount){
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $acount->delete();

        return redirect()->back()->with('success', 'Akun berhasil di hapus');
    }
}
