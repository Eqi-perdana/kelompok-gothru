<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3>{{ $supplier->name }}</h3>
                        <hr/>
                        <p><strong>Kontak:</strong> {{ $supplier->contact }}</p>
                        <p><strong>Alamat:</strong></p>
                        <p>{{ $supplier->address }}</p>
                        <hr/>
                        <a href="{{ route('suppliers.index') }}" class="btn btn-md btn-secondary">KEMBALI</a>
                        <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-md btn-primary">EDIT</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
