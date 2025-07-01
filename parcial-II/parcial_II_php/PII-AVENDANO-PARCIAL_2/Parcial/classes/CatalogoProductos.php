<?php

    require_once 'Conexion.php';
    require_once 'Producto.php';

    /**
     * Clase CatalogoProductos
     * 
     * Se encarga de traer mis productos de la base de datos y mostrarlos en el sitio,
     * indiferentemente del usuario que lo requiera
     * 
     * Permite traer todos los productos, filtrarlos por categoria y traer por ID
     */
class CatalogoProductos {
    private $productos = [];

    /**
     * Permite traer todos los productos de la tabla "productos"
     * 
     * @return array ya que son varios productos
     */
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
                GROUP_CONCAT(DISTINCT s.size_name ORDER BY s.size_name SEPARATOR ', ') AS tamaños
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

    /**
     * Permite filtrar los productos por categoria y traerlos ya filtrados
     * 
     * @param string $categoria -> Se provee la categoria por la cual se quiere filtrar
     * @return array ya que pueden ser varios productos con la misma categoria
     */
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
                GROUP_CONCAT(DISTINCT t.type_name ORDER BY t.type_name SEPARATOR ', ') AS type,
                GROUP_CONCAT(DISTINCT s.size_name ORDER BY s.size_name SEPARATOR ', ') AS size
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

    /**
     * Obtiene productos mediante un id provisto
     * 
     * @param int $id -> Se provee un id para referenciar y buscar
     * @return Producto|null -> Si se obtiene el producto se devuelve el objeto,
     * caso contrario se devolvera un null
     */
    public function getProductoPorId(int $id): ?Producto{
        $conexion = (new Conexion())->getConexion();

        $query = "
            SELECT
                p.product_id, 
                p.name, 
                m.marca_name AS brand, 
                c.collection_name AS collection, 
                GROUP_CONCAT(DISTINCT s.size_name ORDER BY s.size_name SEPARATOR ', ') AS size, 
                GROUP_CONCAT(DISTINCT t.type_name ORDER BY t.type_name SEPARATOR ', ') AS type, 
                p.descripcion, 
                p.img
            FROM productos p 
            LEFT JOIN marca m ON p.brand_id = m.marca_id 
            LEFT JOIN collection c ON p.collection_id = c.collection_id 
            LEFT JOIN product_r_size prs ON p.product_id = prs.product_id 
            LEFT JOIN size s ON prs.size_id = s.size_id 
            LEFT JOIN product_r_type prt ON p.product_id = prt.product_id 
            LEFT JOIN type t ON prt.type_id = t.type_id 
            WHERE p.product_id = :id 
            GROUP BY p.product_id
            LIMIT 1
        ";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->bindParam(':id', $id, PDO::PARAM_INT);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, Producto::class);
        $PDOStatement->execute();

        $producto = $PDOStatement->fetch();

        return $producto ?: null;
    }
}
?>