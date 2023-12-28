<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;


class ProdukController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }


    public function index()
    {
        $produk = Produk::orderBy('id', 'desc')->get();
        return view('dashboard.produk', compact('produk'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required',
            'status' => 'required',
            'gambar' => 'required',
        ], [
            'nama_produk.required' => 'Nama tidak boleh kosong',
            'harga.required' => 'Harga tidak boleh kosong',
            'status.required' => 'Alamat tidak boleh kosong',
            'gambar.image' => 'File harus berupa gambar',
            'gambar.mimes' => 'Format gambar tidak valid. Gunakan format jpeg, png, jpg, atau gif.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2MB',
        ]);

        $data = new Produk;
        $data->nama_produk = $request->nama_produk;
        $data->harga = $request->harga;
        $data->status = $request->status;
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
            'nama_produk' => 'required',
            'harga' => 'required',
            'status' => 'required',
            'gambar' => 'required',
        ], [
            'nama_produk.required' => 'Nama tidak boleh kosong',
            'harga.required' => 'Email tidak boleh kosong',
            'status.required' => 'Alamat tidak boleh kosong',
            'gambar.image' => 'File harus berupa gambar',
            'gambar.mimes' => 'Format gambar tidak valid. Gunakan format jpeg, png, jpg, atau gif.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2MB',
        ]);
        $data = Produk::find($request->id);
        $data->nama_produk = $request->nama_produk;
        $data->harga = $request->harga;
        $data->status = $request->status;
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
        $data = Produk::find($request->id);
        $data->delete();

        $notification = array(
            'status' => 'success',
            'title' => 'Proses berhasil',
            'message' => 'Data berhasil dihapus'
        );
        return Redirect()->back()->with($notification);
    }
}
