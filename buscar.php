<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar contenido</title>
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

    <!-- Contenido principal (Formulario de búsqueda y resultados) -->
    <div class="container-form">
        <!-- Título de la búsqueda -->
        <h2>Buscar contenido</h2>

        <!-- Formulario de búsqueda -->
        <form action="buscar.php" method="get">
            <input type="text" name="search" placeholder="Buscar por título o descripción" required>
            <button type="submit">Buscar</button>
        </form>

        <!-- Mostrar los resultados de búsqueda -->
        <div id="galeria">
            <?php
            include 'conexion.php';

            // Comprobar si hay un término de búsqueda
            if (isset($_GET['search'])) {
                $searchTerm = $_GET['search'];

                // Consultar la base de datos para encontrar coincidencias en el título o la descripción
                $query = "SELECT * FROM media WHERE title LIKE '%$searchTerm%' OR description LIKE '%$searchTerm%' ORDER BY created_at DESC";
                $result = $conn->query($query);

                // Verificar si hay resultados y mostrarlos
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
                    echo "<p>No se encontraron resultados para '$searchTerm'.</p>";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
