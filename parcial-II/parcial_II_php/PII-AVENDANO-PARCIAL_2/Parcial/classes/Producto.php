<?php 
    /**
     * Clase Producto
     * 
     * La clase mas importante del sitio. Se encarga de manejar cada uno de los productos
     * de manera central, ya que contiene la manera en que se obtiene los datos y como se
     * manejan en distintos entornos
     * 
     * Permite hacer un get total, getByID, renderizar cada card al momento de visualizar
     * cada producto, insert, delete y edit.
     */
    //! Mi clase producto con todas las propiedades que podria llegar a usar

    class Producto {
        private $product_id;
        private $name;
        private $brand; 
        private $collection;
        private $size;
        private $type;
        private $descripcion;
        private $img;
        private $brand_id;
        private $size_id;

        //? De aca para abajo, creacion de funciones que interactuan con el JSON
        
        public function getIdProducto() {
            return $this -> product_id;
        }

        public function getMarca() {
            return $this -> brand;
        }

        public function getIdMarca(){
            return $this -> brand_id;
        }

        public function getName() {
            return $this -> name;
        }

        public function getDescripcion() {
            return $this -> descripcion;
        }

        public function getCollection(){
            return $this -> collection;
        }

        public function getSize(){
            return $this -> size;
        }

        public function getIdSize(){
            return $this -> size_id;
        }

        public function getType(){
            return $this -> type;
        }

        public function getImg(){
            return $this -> img;
        }
        
        /**
         * Renderiza cada card en el include de usuario "includes/productCard.php"
         * 
         * @return Void Ya que no retorna nada mas que HTML para ser mostrado
         */
        //* Funcion para renderizar mis cards de productos
        public function cardRender(){
            echo '<div class="card" style="width: 18rem; display: inline-block; margin: 10px;">';
                    echo '<img src="assets/products/' . $this->img . '" class="card-img-top" alt="' . $this->name . '">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $this->name . '</h5>';
                    echo '<p class="card-text">';
                    if (isset($this->collection)) {
                        echo '<strong>Colección:</strong> ' . $this->collection . '<br>';
                    }
                    foreach($this as $propiedad => $valor){
                        if(!in_array($propiedad, ['name', 'img', 'descripcion', 'product_id', 'collection', 'type', 'size', 'brand_id', 'size_id'])){ // No repetimos nombre ni imagen
                            echo '<strong>' . ucfirst($propiedad) . ':</strong> ';
                            if (is_array($valor)) {
                                echo implode(', ', $valor);
                            } else {
                                echo $valor;
                            }
                            echo '<br>';
                        }
                    }
                    echo '</p>';
                    echo '<a href="index.php?sec=product&id=' . urlencode($this->product_id) . '" class="btn btn-primary">Ver más</a>';
                    echo '</div>'; 
                    echo '</div>'; 
        }

        /**
         * Funcion que retorna todos los productos encontrados en la BBDD
         * 
         * @return array ya que retorna la totalidad de productos encontrados
         * en la tabla "productos"
         */
        //* Funcion para traer todos los productos
        public function todosProductos(): array {
            $conexion = (new Conexion())->getConexion();

            $query = "SELECT 
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
                    GROUP BY p.product_id";

            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
            $PDOStatement->execute();

            return $PDOStatement->fetchAll();
        }

        /**
         * Retorna un producto especifico mediante la busqueda de su ID
         * 
         * @param int $id -> Es el ID del producto al que se hace referencia
         * @return Producto|null -> Retorna un objeto "Producto" en caso de existir tal,
         * en caso de que no, retornara null si no encuentra el ID
         */
        //* Funcion para traer un producto mediante ID
        public static function getProductById(int $id) : ?Producto {
            $conexion = (new Conexion())->getConexion();
            $query = " SELECT 
                        p.product_id, 
                        p.name, 
                        p.descripcion, 
                        p.img, 
                        m.marca_name AS marca,
                        prs.size_id
                    FROM productos p
                    INNER JOIN marca m ON p.brand_id = m.marca_id
                    LEFT JOIN product_r_size prs ON p.product_id = prs.product_id
                    WHERE p.product_id = :id";
            $PDOStatement = $conexion -> prepare($query);
            $PDOStatement -> setFetchMode(PDO::FETCH_CLASS, self::class);
            $PDOStatement -> execute(["id" => $id]);
            $lista = $PDOStatement -> fetch();
            return !empty($lista) ? $lista : null;
        }

        /**
         * Inserta en la tabla "productos" un nuevo producto mediante el uso de vistas y actions
         * 
         * @param string $name -> Nombre del nuevo producto
         * @param string $brand -> Nombre de la marca del nuevo producto
         * @param string $collection -> Nombre de la coleccion del nuevo producto
         * @param array $size -> Tamaño/s recibido/s del nuevo producto
         * @param array $type -> Tipo/s recibido/s del nuevo producto
         * @param string $descripcion -> Descripcion del nuevo producto
         * @param string $img -> Imagen del nuevo producto
         */
        //* Funcion para insertar un nuevo producto en mi BBDD
        public static function insert( string $name, string $brand, string $collection, array $size, array $type, string $descripcion, string $img){
            var_dump($descripcion);
            var_dump($img);
            $conexion = (new Conexion())->getConexion();
            $query = 
            //* Cuando hago el insert, los valores dentro de los parentesis deben de corresponder a la nomenclatura de las columnas
            "INSERT INTO productos (`name`, `brand_id`, `collection_id`, `descripcion`, `img`)
            VALUES (:name, :brand, :collection, :descripcion, :img)";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute([
                'name' => $name,
                'brand' => $brand,
                'collection' => $collection,
                'descripcion' => $descripcion,
                'img' => $img
            ]);

            $product_id = $conexion -> lastInsertId();
            if (!$product_id) {
                throw new Exception('No se ha podido obtener el Id del nuevo producto');
            }
            
            if (is_array($size)) {
                foreach($size as $idSize){
                    $PDOStatement = $conexion -> prepare(
                        "INSERT INTO product_r_size (product_id, size_id) 
                        VALUES (:product_id, :size_id)");
                        $result = $PDOStatement -> execute([
                            'product_id' => $product_id,
                            'size_id' => $idSize
                        ]);
                }
            }

            if (is_array($type)) {
                foreach($type as $idType){
                    $PDOStatement = $conexion -> prepare(
                        "INSERT INTO product_r_type (product_id, type_id) 
                        VALUES (:product_id, :type_id)");
                        $result = $PDOStatement -> execute([
                            'product_id' => $product_id,
                            'type_id' => $idType
                        ]);
                }
            }
        }

        /**
         * Borra de la tabla productos, product_r_size y product_r_type un producto y su id de las tablas pivots
         * 
         * @param int $id -> Id al cual se referencia al momento de querer borrar el producto
         * @return array en caso de lograr borrar el producto, retorna true, caso contrario false
         */
        //* Funcion para borrar productos (sumado a sus variantes en las pivots)
        public static function deleteProduct(int $id): bool{
            //? Las transacciones en SQL son secuencias que se tratan como
            //? una sola unidad de trabajo que permiten varias acciones.
            //? Actuan bajo las propiedades ACID (Atomic, Coherent, Isolated, Durable)

            //* Me conecto como siempre
            $conexion = (new Conexion()) -> getConexion();
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //^ Empiezo con un trycatch sumado a la transaccion
            if ($id <= 0) {
                throw new Exception(`ID invalido: $id`);
            }
            try {
                var_dump($id);
                $conexion -> beginTransaction();

                //^ Tengo mis 3 variables las cuales son parecidas al resto del codigo
                $query = "DELETE FROM product_r_size WHERE product_id = :id";
                $PDOStatement = $conexion -> prepare($query);
                $borradoprs = $PDOStatement -> execute(['id' => $id]);
                if (!$borradoprs) {
                    throw new Exception('Error al borrar en product_r_size');
                }

                $query = "DELETE FROM product_r_type WHERE product_id = :id";
                $PDOStatement = $conexion -> prepare($query);
                $borradoprt = $PDOStatement -> execute(['id' => $id]);
                if (!$borradoprt) {
                    throw new Exception('Error al borrar en product_r_type');
                }

                $query = "DELETE FROM productos WHERE product_id = :id";
                $PDOStatement = $conexion -> prepare($query);
                $borradoproducto = $PDOStatement -> execute(['id' => $id]);
                if (!$borradoproducto) {
                    throw new Exception('Error al borrar en producto');
                }

                //^ Confirmo si esta todo ok con el commit
                $conexion -> commit();
                return true;

            } catch (Exception $e) {
                //! En caso de que algo salga mal, revierto las acciones con rollback
                $conexion -> rollBack();
                throw new Exception('Error al borrar un producto:' . $e -> getMessage());
            };
        }

        /**
         * Permite la edicion general de datos de un producto.
         * 
         * @param mixed $product_id -> Id del producto a editar
         * @param mixed $name -> Nombre del producto a editar
         * @param mixed $brand -> Marca del producto a editar
         * @param mixed $descripcion -> Descripcion del producto a editar
         * @param mixed $collection -> Coleccion del producto a editar
         * @param mixed $size -> Tamaño del producto a editar
         * @param mixed $type -> Tipo del producto a editar
         * @param mixed $img -> Imagen del producto a editar
         * @return void Ya que solo cambia los datos en la base de datos.
         * El retorno se le cede a otra funcion.
         */
        //* Funcion para editar productos
        public function editProduct($product_id, $name, $brand, $descripcion, $collection, $size, $type, $img){
        $conexion = (new Conexion())->getConexion();
        $query = 
            "UPDATE productos
            SET 
            product_id = :product_id,
            name = :name,
            brand = :brand,
            descripcion = :descripcion,
            collection = :collection,
            size = :size,
            type = :type,
            img = :img
            WHERE
            product_id = :id
        ";
        $PDOStatement = $conexion -> prepare($query);
        $PDOStatement -> execute([
            "product_id" => $product_id,
            "name" => $name,
            "brand" => $brand,
            "descripcion" => $descripcion,
            "collection" => $collection,
            "size" => $size,
            "type" => $type,
            "img" => $img,
        ]);
        }

        public function editMin($nombre, $id_producto, $id_marca, $foto, $descripcion){
            $conexion = (new Conexion())->getConexion();
            $query = "UPDATE productos 
                SET name = :nombre, brand_id = :id_marca, img = :foto, descripcion = :descripcion
                WHERE product_id = :id";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute([
            "nombre" => $nombre,
            "id_marca" => $id_marca,
            "foto" => $foto,
            "id" => $id_producto,
            'descripcion' => $descripcion
            ]);
        }

        public function editMinSize(int $product_id, int $size_id){
            $conexion = (new Conexion())->getConexion();

            // Eliminar relaciones previas
            $deleteQuery = "DELETE FROM product_r_size WHERE product_id = :product_id";
            $PDOStatement = $conexion->prepare($deleteQuery);
            $PDOStatement->execute(['product_id' => $product_id]);

            // Insertar nueva relación
            $insertQuery = "INSERT INTO product_r_size (product_id, size_id) VALUES (:product_id, :size_id)";
            $PDOStatement = $conexion->prepare($insertQuery);
            $PDOStatement->execute([
                'product_id' => $product_id,
                'size_id' => $size_id
            ]);
        }
    }
?>
