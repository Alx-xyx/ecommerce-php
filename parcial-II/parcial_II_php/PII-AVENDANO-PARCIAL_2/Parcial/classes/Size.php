<?php
    /**
     * Clase Size
     * 
     * Esta encargada de manejar los "Sizes" de mis productos.
     * Al ser una entidad diferente a productos (pero que forma parte de ella)
     * el administrador tiene la libertad de aplicar el ABM de esta entidad
     * 
     * Permite hacer un get total, insert, getById, edit y delete
     */
    class Size{
        private $size_id;
        private $size_name;
        
        public function getIdSize(){
            return $this -> size_id;
        }

        public function getSize(){
            return $this -> size_name;
        }

        /**
         * Trae todos los tamaños que conforman la tabla de "size"
         * 
         * @return array ya que son mas de 1 size
         */

        //* Funcion para obtener todas las colecciones
        public function todosTamaños():array{
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM size";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $lista = $PDOStatement->fetchAll();

        return $lista;
        }

            //! Funcion para obtener marcas por ID
    public static function getSizeById(int $id): ?Size
    {
        $conexion = (new Conexion()) -> getConexion();
        $query = "SELECT * FROM size WHERE size_id = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(["id" => $id]);
        $lista = $PDOStatement->fetch();

        return !empty($lista) ? $lista : null;
    }
    }
?>