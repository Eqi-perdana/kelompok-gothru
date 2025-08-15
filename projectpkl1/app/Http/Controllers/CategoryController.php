<?php

namespace App\Http\Controllers;

use App\Models\Category; 
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    /**
     * Menampilkan semua kategori
     *
     * @return View
     */
    public function index(): View
    {
        $categories = Category::latest()->paginate(10);
        return view('categories.index', compact('categories'));
    }

    /**
     * Form tambah kategori baru
     *
     * @return View
     */
    public function create(): View
    {
        return view('categories.create');
    }

    /**
     * Simpan kategori baru
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name'        => 'required|min:3',
            'description' => 'required|min:10',
        ]);

        Category::create([
            'name'        => $request->name,
            'description' => $request->description
        ]);

        return redirect()->route('categories.index')->with(['success' => 'Kategori Berhasil Disimpan!']);
    }

    /**
     * Tampilkan detail kategori
     *
     * @param string $id
     * @return View
     */
    public function show(string $id): View
    {
        $category = Category::findOrFail($id);
        return view('categories.show', compact('category'));
    }

    /**
     * Form edit kategori
     *
     * @param string $id
     * @return View
     */
    public function edit(string $id): View
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    /**
     * Update kategori
     *
     * @param Request $request
     * @param string $id
     * @return RedirectResponse
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'name'        => 'required|min:3',
            'description' => 'required|min:10',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name'        => $request->name,
            'description' => $request->description
        ]);

        return redirect()->route('categories.index')->with(['success' => 'Kategori Berhasil Diubah!']);
    }

    /**
     * Hapus kategori
     *
     * @param string $id
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with(['success' => 'Kategori Berhasil Dihapus!']);
    }
}
