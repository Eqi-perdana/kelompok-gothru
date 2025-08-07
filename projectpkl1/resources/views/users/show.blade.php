<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show User - SantriKoding.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3 class="mb-3">Detail User</h3>
                        <hr/>
                        <p><strong>Nama:</strong> {{ $user->name }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>Role:</strong> 
                            <span class="badge {{ $user->role == 'admin' ? 'bg-primary' : 'bg-success' }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </p>
                        <p><strong>Dibuat pada:</strong> {{ $user->created_at->format('d M Y H:i') }}</p>
                        <p><strong>Diupdate pada:</strong> {{ $user->updated_at->format('d M Y H:i') }}</p>
                        <a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary mt-3">Kembali ke Daftar User</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
