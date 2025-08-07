<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Penjualan - SantriKoding.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3 class="mb-3">Detail Penjualan</h3>
                        <table class="table">
                            <tr>
                                <th>User</th>
                                <td>{{ $sale->user->name }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Penjualan</th>
                                <td>{{ \Carbon\Carbon::parse($sale->sale_date)->translatedFormat('d F Y') }}</td>
                            </tr>
                            <tr>
                                <th>Total Penjualan</th>
                                <td>Rp {{ number_format($sale->total_amount, 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Metode Pembayaran</th>
                                <td>{{ ucfirst($sale->payment_method) }}</td>
                            </tr>
                            <tr>
                                <th>Waktu Input</th>
                                <td>{{ $sale->created_at->diffForHumans() }}</td>
                            </tr>
                        </table>
                        <a href="{{ route('sales.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
