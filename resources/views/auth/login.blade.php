<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Iniciar sesión</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="card shadow-sm">
          <div class="card-body">
            <h4 class="card-title mb-3 text-center">Iniciar sesión</h4>

            @if(session('status'))
              <div class="alert alert-info">{{ session('status') }}</div>
            @endif

            @if($errors->any())
              <div class="alert alert-danger">
                <ul class="mb-0">
                  @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form method="POST" action="{{ route('login.attempt') }}">
              @csrf

              <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                       class="form-control @error('email') is-invalid @enderror" required autofocus>
                @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input id="password" type="password" name="password"
                       class="form-control @error('password') is-invalid @enderror" required>
                @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3 form-check">
                <input type="checkbox" name="remember" id="remember" class="form-check-input"
                       {{ old('remember') ? 'checked' : '' }}>
                <label for="remember" class="form-check-label">Recordarme</label>
              </div>

              <div class="d-grid">
                <button type="submit" class="btn btn-primary">Entrar</button>
              </div>
            </form>

            <div class="mt-3 text-center">
              <a href="{{ url('/') }}">Volver al inicio</a>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>