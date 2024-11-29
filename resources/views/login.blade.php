<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ad/Madrid_Barajas_H.svg/2048px-Madrid_Barajas_H.svg.png">

    <title> ClinikApp | Login </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section>
            <form action="check" method="POST">

              @csrf

              <h1 class="text-center"><i class="fa fa-hospital-o"></i> Clinik App</h1>
              <br>

              <div class="form-group">
                <input type="text" name="email" class="form-control" value="{{ old('email') }}" placeholder="Correo" required />
              </div>
              @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror

              <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Contraseña"  required/>
              </div>
              @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror

              <div class="form-group text-center">
                <button type="submit" class="btn btn-default submit">Iniciar Sesión</button>
                <a class="reset_pass" href="#">¿Olvido su Contraseña?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator text-center">
                <p class="change_link">¿Nuevo en ClinikApp?
                  <a href="#signup" class="to_register"> Crear Cuenta </a>
                </p>
              <div>

              <div class="clearfix"></div>
              <br/>

              <div>
                <p class="text-center">ClinkApp ©2024 Todos los Derechos Reservados.</p>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section>
            <form action="{{ url('register') }}" method="POST">

              @csrf

              <h1 class="text-center"><i class="fa fa-hospital-o"></i> Crear Cuenta</h1>
              <br>
              <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Usuario" required/>
              </div>
              <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Correo" required/>
              </div>
              <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Contraseña" required/>
              </div>
              <div class="form-group text-center">
                <button type="submit" class="btn btn-default submit">Crear Cuenta</button>
              </div>
              
              <div class="clearfix"></div>

              <div class="separator text-center">
                <p class="change_link">¿Ya tienes Cuenta?
                  <a href="#signin" class="to_register"> Iniciar Sesión </a>
                </p>

                <div class="clearfix"></div>
                <br/>

                <div>
                  <p class="text-center">ClinkApp ©2024 Todos los Derechos Reservados.</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
