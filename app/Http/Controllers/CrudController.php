<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dummy;


class CrudController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }


    public function index()
    {
        $dummy = Dummy::orderBy('id', 'desc')->get();
        return view('dashboard.crud', compact('dummy'));
    }

    public function store(Request $request)
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

        $data = new Dummy;
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->alamat = $request->alamat;
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
            'message' => 'Data berhasil ditambahkan'
        );

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
        $data = Dummy::find($request->id);
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
        $data = Dummy::find($request->id);
        $data->delete();

        $notification = array(
            'status' => 'success',
            'title' => 'Proses berhasil',
            'message' => 'Data berhasil dihapus'
        );
        return Redirect()->back()->with($notification);
    }
}
