<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Sale Items</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div>
                <h3 class="text-center my-4">Data Sale Items</h3>
                <hr>
            </div>
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <a href="{{ route('sale_items.create') }}" class="btn btn-md btn-success mb-3">TAMBAH SALE ITEM</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>SALE ID</th>
                                <th>PRODUK</th>
                                <th>JUMLAH</th>
                                <th>HARGA</th>
                                <th>SUBTOTAL</th>
                                <th style="width: 20%">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($saleItems as $item)
                                <tr class="text-center">
                                    <td>{{ $item->sale_id }}</td>
                                    <td>{{ $item->product?->name ?? '-' }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ "Rp " . number_format($item->price,2,',','.') }}</td>
                                    <td>{{ "Rp " . number_format($item->subtotal,2,',','.') }}</td>
                                    <td>
                                        <form onsubmit="return confirm('Apakah Anda Yakin?');" action="{{ route('sale_items.destroy', $item->id) }}" method="POST">
                                            <a href="{{ route('sale_items.show', $item->id) }}" class="btn btn-sm btn-dark">LIHAT</a>
                                            <a href="{{ route('sale_items.edit', $item->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Belum ada data sale items.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{-- Pagination --}}
                    <div class="d-flex justify-content-center">
                        {{ $saleItems->links() }}
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
