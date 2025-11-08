<?php
// Configuración de la base de datos
$servername = "db";
$username = "usuario";
$password = "usuario";
$dbname = "libreria";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consultar todos los libros
$sql = "SELECT * FROM libros";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Librería - Consultar Libros</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light text-dark">

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary bg-gradient shadow">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="index.php">📚 Mi Librería</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
          <li class="nav-item"><a class="nav-link" href="registro.php">Registrar Libro</a></li>
          <li class="nav-item"><a class="nav-link active" href="consulta.php">Consultar Libros</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container my-5">
    <h2 class="fw-bold text-primary mb-4">Catálogo de Libros</h2>

    <div class="row row-cols-1 row-cols-md-3 g-4">
      <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
          <div class="col">
            <div class="card h-100 shadow-sm border-0 rounded-4">
              <img src="data:image/jpeg;base64,<?= base64_encode($row['imagen_portada']); ?>" class="card-img-top rounded-top-4" alt="Portada del Libro">
              <div class="card-body">
                <h5 class="card-title text-primary"><?= htmlspecialchars($row['titulo']); ?></h5>
                <p class="card-text text-muted">Autor: <?= htmlspecialchars($row['autor']); ?></p>
              </div>
              <div class="card-footer bg-body-tertiary border-0">
                <small class="text-muted">Publicado: <?= htmlspecialchars($row['fecha_publicacion']); ?></small>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <div class="col">
          <div class="alert alert-info">No hay libros registrados aún.</div>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <footer class="text-center text-muted py-3 mt-5 bg-body-tertiary border-top">
    2025 Mi Librería — Practica PHP, MySQL y Bootstrap
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php $conn->close(); ?>