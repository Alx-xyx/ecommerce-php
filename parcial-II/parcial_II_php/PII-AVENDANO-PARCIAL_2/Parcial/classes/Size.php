<?php
    class Size{
        private $size_id;
        private $size_name;
        
        public function getIdSize(){
            return $this -> size_id;
        }

        public function getSize(){
            return $this -> size_name;
        }

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
    }
?>