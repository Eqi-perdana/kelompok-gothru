<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Purchase</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: #f5f5f5">

    <div class="container mt-5 mb-5">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white px-3 py-2 rounded shadow-sm">
                <li class="breadcrumb-item"><a href="{{ route('purchases.index') }}">Purchases</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail #{{ $purchase->id }}</li>
            </ol>
        </nav>

        <div class="row">
            <!-- Info Purchase -->
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded mb-3">
                    <div class="card-header bg-primary text-white">
                        <h4>Detail Purchase #{{ $purchase->id }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <strong>Supplier:</strong> {{ $purchase->supplier->name ?? 'N/A' }}
                            </div>
                            <div class="col-md-6">
                                <strong>User:</strong> {{ $purchase->user->name ?? 'N/A' }}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <strong>Tanggal Purchase:</strong> {{ \Carbon\Carbon::parse($purchase->purchase_date)->format('d-m-Y') }}
                            </div>
                            <div class="col-md-6">
                                <strong>Total Amount:</strong> {{ "Rp " . number_format($purchase->total_amount,2,',','.') }}
                            </div>
                        </div>
                        <div class="mt-3">
                            <a href="{{ route('purchases.index') }}" class="btn btn-secondary">Kembali</a>
                            <a href="{{ route('purchases.edit', $purchase->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('purchases.destroy', $purchase->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
