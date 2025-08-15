<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PurchaseController extends Controller
{
    public function index(): View
    {
        $purchases = Purchase::with(['supplier', 'user'])->latest()->paginate(10);
        return view('purchases.index', compact('purchases'));
    }

    public function create(): View
    {
        $suppliers = Supplier::all();
        $users     = User::all();
        return view('purchases.create', compact('suppliers', 'users'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'supplier_id'   => 'required|exists:suppliers,id',
            'user_id'       => 'required|exists:users,id',
            'purchase_date' => 'required|date',
            'total_amount'  => 'required|numeric',
        ]);

        Purchase::create([
            'supplier_id'   => $request->supplier_id,
            'user_id'       => $request->user_id,
            'purchase_date' => $request->purchase_date,
            'total_amount'  => $request->total_amount,
        ]);

        return redirect()->route('purchases.index')->with('success', 'Purchase berhasil ditambahkan!');
    }

    public function show(int $id): View
    {
        $purchase = Purchase::with(['supplier', 'user'])->findOrFail($id);
        return view('purchases.show', compact('purchase'));
    }

    public function edit(int $id): View
    {
        $purchase  = Purchase::findOrFail($id);
        $suppliers = Supplier::all();
        $users     = User::all();
        return view('purchases.edit', compact('purchase', 'suppliers', 'users'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $request->validate([
            'supplier_id'   => 'required|exists:suppliers,id',
            'user_id'       => 'required|exists:users,id',
            'purchase_date' => 'required|date',
            'total_amount'  => 'required|numeric',
        ]);

        $purchase = Purchase::findOrFail($id);
        $purchase->update([
            'supplier_id'   => $request->supplier_id,
            'user_id'       => $request->user_id,
            'purchase_date' => $request->purchase_date,
            'total_amount'  => $request->total_amount,
        ]);

        return redirect()->route('purchases.index')->with('success', 'Purchase berhasil diupdate!');
    }

    public function destroy(int $id): RedirectResponse
    {
        $purchase = Purchase::findOrFail($id);
        $purchase->delete();
        return redirect()->route('purchases.index')->with('success', 'Purchase berhasil dihapus!');
    }
}
