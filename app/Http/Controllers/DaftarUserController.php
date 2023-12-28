<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daftaruser;
use Illuminate\Support\Facades\Hash;




class DaftarUserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }


    public function index()
    {
        $users = Daftaruser::orderBy('id', 'desc')->get();
        return view('dashboard.daftaruser', compact('users'));
    }

    public function store(Request $request)
    {


        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required',
        ]);

        $user = Daftaruser::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // You can customize this part based on your needs, for example, send a verification email.
        $user->save();
        $notification = [
            'status' => 'toast_success',
            'title' => 'Registration Successful',
            'message' => 'You have successfully registered. Please log in.',
        ];


        return Redirect()->back()->with($notification);
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'gambar' => 'required',
        ], [
            'nama.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'telepon.required' => 'Telepon tidak boleh kosong',
            'gambar.image' => 'File harus berupa gambar',
            'gambar.mimes' => 'Format gambar tidak valid. Gunakan format jpeg, png, jpg, atau gif.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2MB',
        ]);
        $data = daftarUser::find($request->id);
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->email = $request->email;
        $data->telepon = $request->telepon;
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $namaGambar = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('public/assets/gambar'), $namaGambar);
            $data->gambar = $namaGambar;
        }
        $data->save();

        $notification = array(
            'status' => 'success',
            'title' => 'Proses berhasil',
            'message' => 'Data berhasil diperbaharui'
        );

        return Redirect()->back()->with($notification);
    }

    public function destroy(Request $request)
    {
        $data = Daftaruser::find($request->id);
        $data->delete();

        $notification = array(
            'status' => 'success',
            'title' => 'Proses berhasil',
            'message' => 'Data berhasil dihapus'
        );
        return Redirect()->back()->with($notification);
    }
}
