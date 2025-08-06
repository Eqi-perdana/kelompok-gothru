<?php

namespace App\Http\Controllers;

use App\Models\Supplier; // Model Supplier
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class SupplierController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        // get all suppliers, paginate 10 per page
        $suppliers = Supplier::latest()->paginate(10);

        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('suppliers.create');
    }

    /**
     * store
     *
     * @param  Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // validate form
        $request->validate([
            'name'      => 'required|min:3',
            'contact'   => 'nullable|string|max:255',
            'address'   => 'nullable|string|min:5',
        ]);

        // create supplier
        Supplier::create([
            'name'      => $request->name,
            'contact'   => $request->contact,
            'address'   => $request->address,
        ]);

        return redirect()->route('suppliers.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * show
     *
     * @param  string $id
     * @return View
     */
    public function show(string $id): View
    {
        $supplier = Supplier::findOrFail($id);
        return view('suppliers.show', compact('supplier'));
    }

    /**
     * edit
     *
     * @param  string $id
     * @return View
     */
    public function edit(string $id): View
    {
        $supplier = Supplier::findOrFail($id);
        return view('suppliers.edit', compact('supplier'));
    }

    /**
     * update
     *
     * @param  Request $request
     * @param  string $id
     * @return RedirectResponse
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'name'      => 'required|min:3',
            'contact'   => 'nullable|string|max:255',
            'address'   => 'nullable|string|min:5',
        ]);

        $supplier = Supplier::findOrFail($id);
        $supplier->update([
            'name'      => $request->name,
            'contact'   => $request->contact,
            'address'   => $request->address,
        ]);

        return redirect()->route('suppliers.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param  string $id
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return redirect()->route('suppliers.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
