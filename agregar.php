<?php
include 'conexion.php';

$title = $_POST['title'];
$description = $_POST['description'];
$url = $_POST['url'];
$thumbnail = $_POST['thumbnail'];

$query = "INSERT INTO media (title, description, url, thumbnail) VALUES ('$title', '$description', '$url', '$thumbnail')";

if ($conn->query($query) === TRUE) {
    echo "Contenido agregado con éxito.";
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}

$conn->close();
?>
