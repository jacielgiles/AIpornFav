<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librería</title>
    <link rel="stylesheet" href="styles.css"> <!-- Referencia al archivo CSS -->
</head>
<body>
    <!-- Encabezado -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <!-- Logo de la librería, puedes agregar aquí el logo -->
            </div>
        </div>
    </section>

    <!-- Contenido principal (Formulario y Galería) -->
    <div class="container-form">
       

        <!-- Botón para redirigir a la página de búsqueda -->
        <button onclick="window.location.href='buscar.php'" class="botonbrillante">Buscar</button>

        <!-- Galería de contenido -->
        <div id="galeria">
            <?php
            include 'conexion.php';

            // Consulta para obtener los registros de la base de datos
            $query = "SELECT * FROM media ORDER BY created_at DESC";
            $result = $conn->query($query);

            // Mostrar los resultados
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='tarjeta'>";
                    echo "<img src='" . $row['thumbnail'] . "' alt='" . $row['title'] . "'>";
                    echo "<h3>" . $row['title'] . "</h3>";
                    echo "<p>" . $row['description'] . "</p>";
                    echo "<a href='" . $row['url'] . "' target='_blank' class='botonbrillante'><span>Ver Video</span></a>";
                    echo "</div>";
                }
            } else {
                echo "<p>No hay contenido disponible.</p>";
            }
            ?>
        </div>

         <!-- Título de "Añade contenido" -->
         <h2>Añade contenido</h2>

<!-- Formulario para agregar contenido -->
<form action="agregar.php" method="post">
    <input type="text" name="title" placeholder="Título" required>
    <textarea name="description" placeholder="Descripción"></textarea>
    <input type="url" name="url" placeholder="URL del video" required>
    <input type="url" name="thumbnail" placeholder="URL de la portada" required>
    <button type="submit">Subir</button>
</form>
    </div>
</body>
</html>
