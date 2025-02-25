<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::with('kategori')->get();
        $kategori = Kategori::all();
        return view('produk.index', compact('produk', 'kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|max:50',
            'kategori_id' => 'required|exists:kategori,id',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        // Upload gambar
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('gambar_produk', 'public');
        }

        Produk::create($data);
        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        Produk::destroy($id);
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}
