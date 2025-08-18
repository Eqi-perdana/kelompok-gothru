<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Item Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <h4 class="mb-4">Tambah Item Penjualan</h4>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('sale_items.store') }}" method="POST">
                        @csrf

                        <!-- Pilih Penjualan -->
                        <div class="mb-3">
                            <label class="form-label">Penjualan</label>
                            <select class="form-control @error('sale_id') is-invalid @enderror" name="sale_id" required>
                                <option value="">-- Pilih Penjualan --</option>
                                @foreach ($sales as $sale)
                                    <option value="{{ $sale->id }}">
                                        Penjualan #{{ $sale->id }} - {{ \Carbon\Carbon::parse($sale->sale_date)->format('Y-m-d') }}
                                    </option>
                                @endforeach
                            </select>
                            @error('sale_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Pilih Produk -->
                        <div class="mb-3">
                            <label class="form-label">Produk</label>
                            <select class="form-control @error('product_id') is-invalid @enderror" name="product_id" required>
                                <option value="">-- Pilih Produk --</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }} (Stok: {{ $product->stock }})</option>
                                @endforeach
                            </select>
                            @error('product_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Jumlah -->
                        <div class="mb-3">
                            <label class="form-label">Jumlah</label>
                            <input type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" min="1" required>
                            @error('quantity')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Harga -->
                        <div class="mb-3">
                            <label class="form-label">Harga</label>
                            <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" name="price" required>
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Subtotal (otomatis dihitung) -->
                        <div class="mb-3">
                            <label class="form-label">Subtotal</label>
                            <input type="number" step="0.01" class="form-control" name="subtotal" readonly>
                        </div>

                        <button type="submit" class="btn btn-success">SIMPAN</button>
                        <button type="reset" class="btn btn-warning">RESET</button>
                        <a href="{{ route('sale_items.index') }}" class="btn btn-secondary">KEMBALI</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const quantityInput = document.querySelector('input[name="quantity"]');
    const priceInput = document.querySelector('input[name="price"]');
    const subtotalInput = document.querySelector('input[name="subtotal"]');

    function updateSubtotal() {
        const quantity = parseFloat(quantityInput.value) || 0;
        const price = parseFloat(priceInput.value) || 0;
        subtotalInput.value = (quantity * price).toFixed(2);
    }

    quantityInput.addEventListener('input', updateSubtotal);
    priceInput.addEventListener('input', updateSubtotal);
</script>

</body>
</html>
