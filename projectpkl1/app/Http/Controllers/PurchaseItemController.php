<?php

namespace App\Http\Controllers;

use App\Models\PurchaseItem;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PurchaseItemController extends Controller
{
    /**
     * Menampilkan semua purchase items
     */
    public function index(): View
    {
        $items = PurchaseItem::with(['product', 'purchase'])
            ->latest()
            ->paginate(10);

        return view('purchase_items.index', compact('items'));
    }

    /**
     * Form tambah purchase item
     */
    public function create(): View
    {
        $products = Product::all();
        $purchases = Purchase::all();

        return view('purchase_items.create', compact('products', 'purchases'));
    }

    /**
     * Simpan purchase item baru
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'purchase_id' => 'required|exists:purchases,id',
            'product_id'  => 'required|exists:products,id',
            'quantity'    => 'required|numeric|min:1',
            'price'       => 'required|numeric|min:0'
        ]);

        PurchaseItem::create($request->all());

        return redirect()->route('purchase-items.index')
            ->with('success', 'Purchase item berhasil ditambahkan!');
    }

    /**
     * Form edit purchase item
     */
    public function edit($id): View
    {
        $item = PurchaseItem::findOrFail($id);
        $products = Product::all();
        $purchases = Purchase::all();

        return view('purchase_items.edit', compact('item', 'products', 'purchases'));
    }

    /**
     * Update purchase item
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'purchase_id' => 'required|exists:purchases,id',
            'product_id'  => 'required|exists:products,id',
            'quantity'    => 'required|numeric|min:1',
            'price'       => 'required|numeric|min:0'
        ]);

        $item = PurchaseItem::findOrFail($id);
        $item->update($request->all());

        return redirect()->route('purchase-items.index')
            ->with('success', 'Purchase item berhasil diperbarui!');
    }

    /**
     * Hapus purchase item
     */
    public function destroy($id): RedirectResponse
    {
        $item = PurchaseItem::findOrFail($id);
        $item->delete();

        return redirect()->route('purchase-items.index')
            ->with('success', 'Purchase item berhasil dihapus!');
    }
}
