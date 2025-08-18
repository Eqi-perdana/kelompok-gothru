<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Sale Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <h4 class="mb-4">Tambah Sale Item</h4>

                    {{-- Menampilkan error validasi --}}
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
                        
                        {{-- Pilih Sale --}}
                        <div class="mb-3">
                            <label class="form-label">Sale</label>
                            <select class="form-control" name="sale_id" required>
                                <option value="">-- Pilih Sale --</option>
                                @foreach ($sales as $sale)
                                    <option value="{{ $sale->id }}">
                                        SALE-{{ $sale->id }} | {{ \Carbon\Carbon::parse($sale->sale_date)->translatedFormat('d F Y') }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Pilih Produk --}}
                        <div class="mb-3">
                            <label class="form-label">Produk</label>
                            <select class="form-control" name="product_id" required>
                                <option value="">-- Pilih Produk --</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">
                                        {{ $product->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Quantity --}}
                        <div class="mb-3">
                            <label class="form-label">Jumlah</label>
                            <input type="number" class="form-control" name="quantity" id="quantity" min="1" required>
                        </div>

                        {{-- Price --}}
                        <div class="mb-3">
                            <label class="form-label">Harga</label>
                            <input type="number" step="0.01" class="form-control" name="price" id="price" min="0" required>
                        </div>

                        {{-- Subtotal (otomatis) --}}
                        <div class="mb-3">
                            <label class="form-label">Subtotal</label>
                            <input type="number" step="0.01" class="form-control" name="subtotal" id="subtotal" readonly>
                        </div>

                        <button type="submit" class="btn btn-success">SIMPAN</button>
                        <a href="{{ route('sale_items.index') }}" class="btn btn-secondary">KEMBALI</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // hitung subtotal otomatis
    document.addEventListener("input", function() {
        let qty = parseFloat(document.getElementById("quantity").value) || 0;
        let price = parseFloat(document.getElementById("price").value) || 0;
        document.getElementById("subtotal").value = qty * price;
    });
</script>

</body>
</html>
