<?php

namespace App\Http\Controllers;

use App\Models\SaleItem;
use App\Models\Sale;
use App\Models\Product;
use Illuminate\Http\Request;

class SaleItemController extends Controller
{
    // Tampilkan semua sale items
    public function index()
    {
        // gunakan paginate biar bisa pakai links() di blade
        $saleItems = SaleItem::with(['sale', 'product'])->paginate(10);
        return view('sale_items.index', compact('saleItems'));
    }

    // Form tambah sale item
    public function create()
    {
        $sales = Sale::all();       // ambil semua data sales
        $products = Product::all(); // ambil semua data products
        return view('sale_items.create', compact('sales', 'products'));
    }

    // Simpan sale item
    public function store(Request $request)
    {
        $request->validate([
            'sale_id'    => 'required|exists:sales,id',
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
            'price'      => 'required|numeric|min:0',
        ]);

        $subtotal = $request->quantity * $request->price;

        SaleItem::create([
            'sale_id'    => $request->sale_id,
            'product_id' => $request->product_id,
            'quantity'   => $request->quantity,
            'price'      => $request->price,
            'subtotal'   => $subtotal,
        ]);

        return redirect()->route('sale_items.index')
                         ->with('success', 'Sale Item berhasil ditambahkan.');
    }

    // Form edit
    public function edit(SaleItem $saleItem)
    {
        $sales = Sale::all();
        $products = Product::all();
        return view('sale_items.edit', compact('saleItem', 'sales', 'products'));
    }

    // Update data
    public function update(Request $request, SaleItem $saleItem)
    {
        $request->validate([
            'sale_id'    => 'required|exists:sales,id',
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
            'price'      => 'required|numeric|min:0',
        ]);

        $subtotal = $request->quantity * $request->price;

        $saleItem->update([
            'sale_id'    => $request->sale_id,
            'product_id' => $request->product_id,
            'quantity'   => $request->quantity,
            'price'      => $request->price,
            'subtotal'   => $subtotal,
        ]);

        return redirect()->route('sale_items.index')
                         ->with('success', 'Sale Item berhasil diupdate.');
    }

    // Hapus data
    public function destroy(SaleItem $saleItem)
    {
        $saleItem->delete();
        return redirect()->route('sale_items.index')
                         ->with('success', 'Sale Item berhasil dihapus.');
    }

    // Lihat detail
    public function show(SaleItem $saleItem)
    {
        return view('sale_items.show', compact('saleItem'));
    }
}
