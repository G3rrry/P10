<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Librería - Inicio</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light text-dark">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary bg-gradient shadow">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="index.php">📚 Mi Librería</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active" href="index.php">Inicio</a></li>
          <li class="nav-item"><a class="nav-link" href="registro.php">Registrar Libro</a></li>
          <li class="nav-item"><a class="nav-link" href="consulta.php">Consultar Libros</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <div class="container my-5">
    <div class="p-5 mb-4 bg-secondary bg-gradient text-light rounded-4 shadow-lg">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Bienvenido a tu Librería</h1>
        <p class="col-md-8 fs-5">Gestiona y consulta tus libros fácilmente usando PHP y MySQL.</p>
        <hr class="border-light">
        <div class="mt-4">
          <a href="registro.php" class="btn btn-light btn-lg me-2 shadow-sm">Registrar Libro</a>
          <a href="consulta.php" class="btn btn-outline-light btn-lg shadow-sm">Ver Catálogo</a>
        </div>
      </div>
    </div>
  </div>

  <footer class="text-center text-muted py-3 mt-5 bg-body-tertiary border-top">
    2025 Mi Librería — Practica PHP, MySQL y Bootstrap
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
