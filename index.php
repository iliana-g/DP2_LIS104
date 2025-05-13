<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="styles.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <section class="container">
    <h1>Formulario de Registro</h1>

    <form id="form-registro">
  <div class="mb-3">
    <label for="nombre" class="form-label">Nombre Completo </label>
    <input type="text" class="form-control" id="nombre" aria-describedby="nombre">
  </div>
  <div class="mb-3">
    <label for="correo" class="form-label">Email </label>
    <input type="email" class="form-control" id="correo" aria-describedby="correo">
    <div id="emailHelp" class="form-text">ejemplo@dominio.com</div>
  </div>
<div class="mb-3">
    <label for="fechanacimiento" class="form-label">Fecha de Nacimiento</label>
    <input type="date" class="form-control" id="fechanacimiento">
  </div>
<div class="mb-3">
    <label for="contrasena" class="form-label">Contraseña</label>
    <input type="password" class="form-control" id="contrasena">
  </div>

  <button type="submit" class="btn btn-primary" id="btnregistrar">Registrar</button> <!--evita que form se envíe por defecto-->
  </section>
  <section>

  </section>
</form>

<script src="js/script_registro.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>