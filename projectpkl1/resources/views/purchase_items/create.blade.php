<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Purchase Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <form action="{{ route('purchase_items.store') }}" method="POST">
                        @csrf

                        {{-- Purchase ID --}}
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">PURCHASE</label>
                            <select name="purchase_id" class="form-control @error('purchase_id') is-invalid @enderror">
                                <option value="">-- Pilih Purchase --</option>
                                @foreach($purchases as $purchase)
                                    <option value="{{ $purchase->id }}" {{ old('purchase_id') == $purchase->id ? 'selected' : '' }}>
                                        {{ $purchase->id }} - {{ $purchase->purchase_date }}
                                    </option>
                                @endforeach
                            </select>
                            @error('purchase_id')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Product ID --}}
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">PRODUCT</label>
                            <select name="product_id" class="form-control @error('product_id') is-invalid @enderror">
                                <option value="">-- Pilih Product --</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                        {{ $product->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('product_id')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Quantity --}}
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">QUANTITY</label>
                            <input type="number" name="quantity" value="{{ old('quantity') }}" class="form-control @error('quantity') is-invalid @enderror" placeholder="Masukkan Jumlah">
                            @error('quantity')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Price --}}
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">PRICE</label>
                            <input type="number" step="0.01" name="price" value="{{ old('price') }}" class="form-control @error('price') is-invalid @enderror" placeholder="Masukkan Harga">
                            @error('price')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Subtotal --}}
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">SUBTOTAL</label>
                            <input type="number" step="0.01" name="subtotal" value="{{ old('subtotal') }}" class="form-control @error('subtotal') is-invalid @enderror" placeholder="Otomatis atau Isi Manual">
                            @error('subtotal')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-primary me-3">SAVE</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>

                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
