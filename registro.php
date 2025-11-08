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

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $autor = $_POST["autor"];
    $fecha_publicacion = $_POST["fecha_publicacion"];

    // Procesar imagen
    if (isset($_FILES["imagen_portada"]) && $_FILES["imagen_portada"]["error"] == 0) {
        $imagen = file_get_contents($_FILES["imagen_portada"]["tmp_name"]);

        // Insertar en la base de datos
        $stmt = $conn->prepare("INSERT INTO libros (autor, titulo, fecha_publicacion, imagen_portada) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $autor, $titulo, $fecha_publicacion, $imagen);
        $stmt->send_long_data(3, $imagen);

        if ($stmt->execute()) {
            $mensaje = '<div class="alert alert-success mt-3">Libro registrado correctamente.</div>';
        } else {
            $mensaje = '<div class="alert alert-danger mt-3">Error al registrar el libro: ' . $stmt->error . '</div>';
        }

        $stmt->close();
    } else {
        $mensaje = '<div class="alert alert-warning mt-3">Por favor, sube una imagen válida.</div>';
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Librería - Registrar Libro</title>
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
          <li class="nav-item"><a class="nav-link active" href="registro.php">Registrar Libro</a></li>
          <li class="nav-item"><a class="nav-link" href="consulta.php">Consultar Libros</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-lg-7">
        <div class="card shadow-lg border-0 rounded-4">
          <div class="card-body p-4">
            <h2 class="fw-bold mb-4 text-primary">Registrar un Nuevo Libro</h2>
            <form method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <label class="form-label fw-semibold">Título del Libro</label>
                <input type="text" name="titulo" class="form-control" required>
              </div>
              <div class="mb-3">
                <label class="form-label fw-semibold">Autor</label>
                <input type="text" name="autor" class="form-control" required>
              </div>
              <div class="mb-3">
                <label class="form-label fw-semibold">Fecha de Publicación</label>
                <input type="date" name="fecha_publicacion" class="form-control" required>
              </div>
              <div class="mb-3">
                <label class="form-label fw-semibold">Imagen de Portada</label>
                <input type="file" name="imagen_portada" class="form-control" accept="image/*" required>
              </div>
              <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary btn-lg shadow-sm">Guardar Libro</button>
              </div>
            </form>
            <?= $mensaje ?>
          </div>
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