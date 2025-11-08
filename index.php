<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librería - Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Barra de Navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Mi Librería</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link active" href="index.php">Inicio</a></li>
            <li class="nav-item"><a class="nav-link" href="registro.php">Registrar Libro</a></li>
            <li class="nav-item"><a class="nav-link" href="consulta.php">Consultar Libros</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Contenido Principal -->
    <div class="container mt-5">
        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Bienvenido al Sistema de Librería</h1>
                <p class="col-md-8 fs-4">
                    Este es un mini-sistema para practicar PHP, MySQL y Docker.
                </p>
                <hr class="my-4">
                <p>Puedes registrar nuevos libros o consultar los que ya existen.</p>
                <a class="btn btn-primary btn-lg" href="registro.php">Registrar un nuevo libro</a>
                <a class="btn btn-secondary btn-lg" href="consulta.php">Ver catálogo</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
