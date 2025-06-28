<?php 
    //! Mi clase producto con todas las propiedades que podria llegar a usar

    class Producto {
        // public $id;
        // public $name;
        // public $brand;
        // public $size;
        // public $type;
        // public $img;
        // public $categoria;
        // public $desc;

        private $product_id;
        private $name;
        private $brand; 
        private $collection;
        private $size;
        private $type;
        private $descripcion;
        private $img;

    
        //? De aca para abajo, creacion de funciones que interactuan con el JSON
        
        public function getIdProducto() {
            return $this -> product_id;
        }

        public function getMarca() {
            return $this -> brand;
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

        public function getType(){
            return $this -> type;
        }

        public function getImg(){
            return $this -> img;
        }

        //* Funcion para renderizar mis cards de productos
        public function cardRender(){
            echo '<div class="card" style="width: 18rem; display: inline-block; margin: 10px;">';
                    echo '<img src="' . $this->img . '" class="card-img-top" alt="' . $this->name . '">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $this->name . '</h5>';
                    echo '<p class="card-text">';
                    if (isset($this->collection)) {
                        echo '<strong>Colección:</strong> ' . $this->collection . '<br>';
                    }
                    foreach($this as $propiedad => $valor){
                        if(!in_array($propiedad, ['name', 'img', 'descripcion', 'product_id', 'collection', 'type', 'size'])){ // No repetimos nombre ni imagen
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

        //* Funcion para insertar un nuevo producto en mi BBDD
        public static function insert( string $name, string $brand, string $collection, array $size, array $type, string $descripcion, string $img){
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
    }
?>
