<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=webllume', 'root', '');
    echo "Conexión exitosa a la base de datos.";
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>