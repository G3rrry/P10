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
            <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
            <li class="nav-item"><a class="nav-link active" href="registro.php">Registrar Libro</a></li>
            <li class="nav-item"><a class="nav-link" href="consulta.php">Consultar Libros</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Contenido Principal -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Registrar un Nuevo Libro</h2>
                <p>Completa el formulario para agregar un libro a la base de datos.</p>

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título del Libro</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" required>
                    </div>
                    <div class="mb-3">
                        <label for="autor" class="form-label">Autor</label>
                        <input type="text" class="form-control" id="autor" name="autor" required>
                    </div>
                    <div class="mb-3">
                        <label for="fecha_publicacion" class="form-label">Fecha de Publicación</label>
                        <input type="date" class="form-control" id="fecha_publicacion" name="fecha_publicacion" required>
                    </div>
                    <div class="mb-3">
                        <label for="imagen_portada" class="form-label">Imagen de Portada</label>
                        <input class="form-control" type="file" id="imagen_portada" name="imagen_portada" accept="image/*" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Libro</button>
                </form>

                <!-- Mensaje -->
                <?= $mensaje ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
