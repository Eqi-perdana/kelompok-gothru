<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Sale Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <h4 class="mb-4">Detail Sale Item</h4>

                    <table class="table">
                        <tr>
                            <th>Sale ID</th>
                            <td>{{ $saleItem->sale_id }}</td>
                        </tr>
                        <tr>
                            <th>Product</th>
                            <td>{{ $saleItem->product?->title ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Quantity</th>
                            <td>{{ $saleItem->quantity }}</td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td>{{ "Rp " . number_format($saleItem->price,2,',','.') }}</td>
                        </tr>
                        <tr>
                            <th>Subtotal</th>
                            <td>{{ "Rp " . number_format($saleItem->subtotal,2,',','.') }}</td>
                        </tr>
                    </table>

                    <a href="{{ route('sale_items.index') }}" class="btn btn-secondary">KEMBALI</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
