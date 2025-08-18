<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Sale Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <h4 class="mb-4">Edit Sale Item</h4>

                    <form action="{{ route('sale_items.update', $saleItem->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Sale ID</label>
                            <input type="number" class="form-control" name="sale_id" value="{{ $saleItem->sale_id }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Product</label>
                            <select class="form-control" name="product_id" required>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}" {{ $saleItem->product_id == $product->id ? 'selected' : '' }}>
                                        {{ $product->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Quantity</label>
                            <input type="number" class="form-control" name="quantity" value="{{ $saleItem->quantity }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="number" step="0.01" class="form-control" name="price" value="{{ $saleItem->price }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Subtotal</label>
                            <input type="number" step="0.01" class="form-control" name="subtotal" value="{{ $saleItem->subtotal }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">UPDATE</button>
                        <a href="{{ route('sale_items.index') }}" class="btn btn-secondary">KEMBALI</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
