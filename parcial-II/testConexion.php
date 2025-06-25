<//?php
require_once './parcial_II_php/PII-AVENDANO-PARCIAL_2/Parcial/classes/Conexion.php'; // Ajusta el path según donde esté el archivo

try {
    $conexion = new Conexion();
    $db = $conexion->getConexion();

    $stmt = $db->query('SELECT DATABASE()');
    $dbName = $stmt->fetchColumn();

    echo "Conectado a la base de datos: " . $dbName;
} catch (PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
}