<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <h3>{{ $product->name }}</h3>
                    <hr>
                    <p><strong>Kode Produk:</strong> {{ $product->code }}</p>
                    <p><strong>Kategori:</strong> {{ $product->category->name ?? '-' }}</p>
                    <p><strong>Harga Beli:</strong> Rp {{ number_format($product->purchase_price, 2, ',', '.') }}</p>
                    <p><strong>Harga Jual:</strong> Rp {{ number_format($product->selling_price, 2, ',', '.') }}</p>
                    <p><strong>Stok:</strong> {{ $product->stock }}</p>
                    <hr>
                    <p><strong>Deskripsi:</strong></p>
                    <p>{!! $product->description !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
