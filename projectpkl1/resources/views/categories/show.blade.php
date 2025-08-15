<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Kategori - www.example.com/categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3>{{ $category->name }}</h3>
                        <hr/>
                        <h5>Deskripsi:</h5>
                        <div>{!! $category->description !!}</div>
                        <hr/>
                        <p>Dibuat pada: {{ $category->created_at->format('d-m-Y H:i') }}</p>
                        <p>Diperbarui pada: {{ $category->updated_at->format('d-m-Y H:i') }}</p>
                        <a href="{{ route('categories.index') }}" class="btn btn-md btn-secondary mt-3">Kembali ke Daftar Kategori</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
