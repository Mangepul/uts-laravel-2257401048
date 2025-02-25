<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|max:50',
        ]);

        Kategori::create($request->only('nama_kategori'));
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        Kategori::destroy($id);
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
