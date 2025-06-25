<?php

    require_once 'Conexion.php';
    require_once 'Producto.php';

class CatalogoProductos {
    private $productos = [];

    public function obtenerTodosLosProductos(): array {
        $conexion = (new Conexion())->getConexion();
        $query = 
            "SELECT 
                p.product_id,
                p.name,
                m.marca_name AS brand,
                p.img,
                c.collection_name AS collection,
                p.descripcion,
                GROUP_CONCAT(DISTINCT t.type_name ORDER BY t.type_name SEPARATOR ', ') AS tipos,
                GROUP_CONCAT(DISTINCT s.size_name ORDER BY s.size_name SEPARATOR ', ') AS tamanios
            FROM productos p
            LEFT JOIN marca m ON p.brand_id = m.marca_id
            LEFT JOIN collection c ON p.collection_id = c.collection_id
            LEFT JOIN product_r_type prt ON p.product_id = prt.product_id
            LEFT JOIN type t ON prt.type_id = t.type_id
            LEFT JOIN product_r_size prs ON p.product_id = prs.product_id
            LEFT JOIN size s ON prs.size_id = s.size_id
            GROUP BY p.product_id";
        
        $stmt = $conexion->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Producto');
        $stmt->execute();

        $result = $stmt->fetchAll();

        return $result;
    }

    public function obtenerProductosPorCategoria(string $categoria): array {
        $conexion = (new Conexion())->getConexion();
        // Aquí la tabla productos no tiene la columna 'collection', sino que es 'collection_id'
        // Y debes hacer JOIN para obtener el nombre de la colección y luego filtrar por ese nombre.
        $query = 
            "SELECT 
                p.product_id,
                p.name,
                m.marca_name AS brand,
                p.img,
                c.collection_name AS collection,
                p.descripcion,
                GROUP_CONCAT(DISTINCT t.type_name ORDER BY t.type_name SEPARATOR ', ') AS tipos,
                GROUP_CONCAT(DISTINCT s.size_name ORDER BY s.size_name SEPARATOR ', ') AS tamanios
            FROM productos p
            LEFT JOIN marca m ON p.brand_id = m.marca_id
            LEFT JOIN collection c ON p.collection_id = c.collection_id
            LEFT JOIN product_r_type prt ON p.product_id = prt.product_id
            LEFT JOIN type t ON prt.type_id = t.type_id
            LEFT JOIN product_r_size prs ON p.product_id = prs.product_id
            LEFT JOIN size s ON prs.size_id = s.size_id
            WHERE c.collection_name = :categoria
            GROUP BY p.product_id";

        $stmt = $conexion->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Producto');
        $stmt->execute(['categoria' => $categoria]);

        return $stmt->fetchAll();
    }
}
?>