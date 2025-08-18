<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Histori Harga Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm rounded">
                <div class="card-body">
                    <h4 class="mb-4 text-center">Edit Histori Harga Produk</h4>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('product_price_history.update', $history->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="product_id" class="form-label">Produk</label>
                            <select name="product_id" id="product_id" class="form-select" required>
                                <option value="">-- Pilih Produk --</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" {{ $history->product_id == $product->id ? 'selected' : '' }}>
                                        {{ $product->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="price_type" class="form-label">Jenis Harga</label>
                            <select name="price_type" id="price_type" class="form-select" required>
                                <option value="">-- Pilih Jenis Harga --</option>
                                <option value="purchase" {{ $history->price_type == 'purchase' ? 'selected' : '' }}>Purchase</option>
                                <option value="selling" {{ $history->price_type == 'selling' ? 'selected' : '' }}>Selling</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Harga</label>
                            <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ $history->price }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="change_reason" class="form-label">Alasan Perubahan</label>
                            <textarea name="change_reason" id="change_reason" rows="3" class="form-control" required>{{ $history->change_reason }}</textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">UPDATE</button>
                            <a href="{{ route('product_price_history.index') }}" class="btn btn-secondary">KEMBALI</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
