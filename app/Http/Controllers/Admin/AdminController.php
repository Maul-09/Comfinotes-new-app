<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\AdminModel;
use App\Models\Auth\AuthModel;
use App\Models\Bendahara\BendaharaModel;
use App\Models\User\DepartemenModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Str;
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
        $departemens = DepartemenModel::where('key_id', $key_id)->firstOrFail();
        $data = $departemens->users;
        $view = path_view('admin.detail-user');
        return view($view, compact('departemens', 'data'));
    }

    public function addAcount(Request $request){
       $validated = $request->validate([
            'acount_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'acount_username' => 'required|string|max:100',
            'acount_email' => 'required|email|max:100',
            'acount_password' => 'required|min:8',
            'role' => 'required|string|in:admin,bendahara'
        ],
        [
            'acount_username.required' => 'Nama wajib di isi',
            'acount_username.max' => 'Nama tidak boleh lebih dari 100 charachter',
            'acount_email.required' => 'Email wajib di isi',
            'acount_email.max' => 'Email tidak boleh lebih dari 100 charachter',
            'acount_password.required' => 'Password wajib di isi',
            'acount_password.min' => 'password tidak boleh kurang dari 8 character'

        ]);

        $acount = new AuthModel();
        $acount->username = $validated['acount_username'];
        $acount->email = $validated['acount_email'];
        $acount->role = $validated['role'];
        $acount->password = Hash::make($validated['acount_password']);

        if($request->hasFile('acount_image')){
            $image = time() . "." . $request->acount_image->extension();
            $request->acount_image->move(public_path('profile/'), $image);
            $acount->image = $image;
        }

        $acount->save();
        return redirect()->back()->with('success', 'Akun Berhasil ditambahkan')->withInput([]);
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
            'user_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'user_username' => 'required|string|max:100',
            'user_email' => 'required|email|unique:users,email',
            'user_password' => 'required|min:8',
        ], [
            'user_image' => 'Ukuran gambar tidak boleh lebih dari 5 MB',
            'user_image.image' => 'File yang diunggah harus berupa gambar.',
            'user_username.required' => 'Username tidak boleh kosong',
            'user_username.unique' => 'Username sudah tersedia',
            'user_username.max' => 'Username tidak boleh lebih dari 100 karakter',
            'user_email.required' => 'Email tidak boleh kosong',
            'user_email.unique' => 'Email sudah tersedia',
            'user_password.required' => 'Password tidak boleh kosong',
            'user_password.min' => 'Password tidak boleh kurang dari 8 karakter'

        ]);

        $departemen = new DepartemenModel();
        $departemen->name_divisi = $validated['user_username'];

        if ($request->hasFile('user_image')) {
            $imageName = time().'.'.$request->user_image->extension();
            $request->user_image->move(public_path('uploads/'), $imageName);
            $departemen->image_divisi = $imageName;
        }

        $departemen->key_id = Str::slug($request->name_divisi);
        $departemen->save();

        $user = new AuthModel();
        $user->username = $validated['user_username'];
        $user->email = $validated['user_email'];
        $user->password = Hash::make($validated['user_password']);
        $user->image = $departemen->image_divisi;
        $user->role = 'user';
        $user->divisi_id = $departemen->id;
        $user->save();

        return redirect()->back()->with('success', 'Group Berhasil dibuat');
    }

    public function deleteUser($id)
    {
        $user = AuthModel::find($id);
        if (!$user) {
            return back()->withErrors(['error' => 'User tidak ditemukan.']);
        }

        $departemen = $user->departemen;
        $user->delete();

        if ($departemen && $departemen->users()->count() === 0) {
            if ($departemen->image_divisi && File::exists(public_path('uploads/' . $departemen->image_divisi))) {
                File::delete(public_path('uploads/' . $departemen->image_divisi));
            }

            $deletedName = $departemen->name_divisi;
            $departemen->delete();

            return redirect()->route('dashboard-admin')->with('success', 'Divisi ' . $deletedName . ' berhasil dihapus.');
        }
    }

}
