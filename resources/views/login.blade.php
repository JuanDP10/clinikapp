<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ad/Madrid_Barajas_H.svg/2048px-Madrid_Barajas_H.svg.png">

  <title>ClinickApp | Login</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Arial', sans-serif;
    }
    .card {
      border-radius: 15px;
    }
    .btn-custom {
      background-color: #007bff;
      color: white;
    }
    .btn-custom:hover {
      background-color: #0056b3;
    }
    .form-control:focus {
      box-shadow: none;
      border-color: #007bff;
    }
  </style>
</head>
<body>
<div class="container d-flex justify-content-center align-items-center vh-100">
  <div class="card shadow-lg p-4" style="max-width: 500px; width: 100%;">
    <div class="text-center">
      <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ad/Madrid_Barajas_H.svg/2048px-Madrid_Barajas_H.svg.png" alt="Logo" style="width: 60px;">
      <h4 class="mt-3">ClinickApp</h4>
      <p class="text-muted">Bienvenido a la mejor experiencia médica</p>
    </div>
    <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab">Iniciar Sesión</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button" role="tab">Crear Cuenta</button>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <!-- Formulario de Login -->
      <div class="tab-pane fade show active" id="login" role="tabpanel">
        <form action="check" method="POST">
          @csrf
          <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fa fa-envelope"></i></span>
              <input type="email" id="email" name="email" class="form-control" placeholder="Correo" value="{{ old('email') }}" required>
            </div>
            @error('email')
            <div class="text-danger small">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fa fa-lock"></i></span>
              <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required>
            </div>
            @error('password')
            <div class="text-danger small">{{ $message }}</div>
            @enderror
          </div>
          <div class="d-flex justify-content-between mb-3">
            <div class="form-check">
              <input type="checkbox" id="remember" name="remember" class="form-check-input">
              <label for="remember" class="form-check-label small">Recuérdame</label>
            </div>
            <a href="#" class="text-decoration-none small">¿Olvidaste tu contraseña?</a>
          </div>
          <button type="submit" class="btn btn-custom w-100">Iniciar Sesión</button>
        </form>
      </div>
      <!-- Formulario de Registro -->
      <div class="tab-pane fade" id="register" role="tabpanel">
        <form action="{{ url('register') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Nombre *</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Usuario" required>
          </div>
          <div class="mb-3">
            <label for="email-register" class="form-label">Correo Electrónico *</label>
            <input type="email" id="email-register" name="email" class="form-control" placeholder="Correo" required>
          </div>
          <div class="mb-3">
            <label for="password-register" class="form-label">Contraseña *</label>
            <input type="password" id="password-register" name="password" class="form-control" placeholder="Contraseña" required>
          </div>
          <button type="submit" class="btn btn-custom w-100">Crear Cuenta</button>
        </form>
      </div>
    </div>
    <div class="text-center mt-3">
      <p class="small">ClinickApp ©2024 Todos los Derechos Reservados.</p>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
