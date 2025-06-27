<?php
    class Coleccion{
        private $collection_id;
        private $collection_name;
        
        public function getIdCollection(){
            return $this -> collection_id;
        }

        public function getCollection(){
            return $this -> collection_name;
        }

        //* Funcion para obtener todas las colecciones
        public function todasColecciones():array{
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM collection";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $lista = $PDOStatement->fetchAll();

        return $lista;
        }
    }
?>