<?php

namespace App\Http\Controllers;

// Import model Product
use App\Models\Product; 

// Import return type View
use Illuminate\View\View;

// Import return type RedirectResponse
use Illuminate\Http\RedirectResponse;

// Import Request
use Illuminate\Http\Request;

class PurchaseItemController extends Controller
{
    /**
     * Menampilkan daftar produk
     */
    public function index(): View
    {
        // Ambil semua data produk, urutkan dari terbaru
        $produk = Product::latest()->paginate(10);

        // Tampilkan view dengan data produk
        return view('products.index', compact('produk'));
    }

    /**
     * Menampilkan form tambah produk
     */
    public function create(): View
    {
        return view('products.create');
    }

    /**
     * Menyimpan data produk baru
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi form
        $request->validate([
            'image'       => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title'       => 'required|min:5',
            'description' => 'required|min:10',
            'price'       => 'required|numeric',
            'stock'       => 'required|numeric'
        ]);

        // Upload gambar
        $gambar = $request->file('image');
        $gambar->storeAs('products', $gambar->hashName());

        // Simpan ke database
        Product::create([
            'image'       => $gambar->hashName(),
            'title'       => $request->title,
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('products.index')->with(['success' => 'Data produk berhasil disimpan!']);
    }
}
