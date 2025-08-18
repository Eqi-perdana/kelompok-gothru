<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histori Harga Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div>
                <h3 class="text-center my-4">Histori Harga Produk</h3>
                <hr>
            </div>
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <a href="{{ route('product_price_history.create') }}" class="btn btn-md btn-success mb-3">TAMBAH HISTORI HARGA</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>PRODUK</th>
                                <th>JENIS HARGA</th>
                                <th>HARGA</th>
                                <th>DIUBAH OLEH</th>
                                <th>ALASAN PERUBAHAN</th>
                                <th>TANGGAL DIUBAH</th>
                                <th style="width: 20%">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($histories as $history)
                                <tr class="text-center">
                                    <td>{{ $history->id }}</td>
                                    <td>{{ $history->product?->title ?? '-' }}</td>
                                    <td>{{ ucfirst($history->price_type) }}</td>
                                    <td>{{ "Rp " . number_format($history->price,2,',','.') }}</td>
                                    <td>{{ $history->changedBy?->name ?? '-' }}</td>
                                    <td>{{ $history->change_reason }}</td>
                                    <td>{{ $history->changed_at->format('d-m-Y H:i') }}</td>
                                    <td>
                                        <form onsubmit="return confirm('Apakah Anda Yakin?');" action="{{ route('product_price_history.destroy', $history->id) }}" method="POST">
                                            <a href="{{ route('product_price_history.show', $history->id) }}" class="btn btn-sm btn-dark">LIHAT</a>
                                            <a href="{{ route('product_price_history.edit', $history->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">Belum ada data histori harga.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{-- Pagination --}}
                    <div class="d-flex justify-content-center">
                        {{ $histories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
@if(session('success'))
    Swal.fire({
        icon: "success",
        title: "BERHASIL",
        text: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 2000
    });
@elseif(session('error'))
    Swal.fire({
        icon: "error",
        title: "GAGAL!",
        text: "{{ session('error') }}",
        showConfirmButton: false,
        timer: 2000
    });
@endif
</script>

</body>
</html>
