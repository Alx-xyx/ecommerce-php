<?php
    /**
     * Clase Coleccion
     * 
     * Esta encargada de manejar las "Collection" de mis productos
     * Al ser una entidad diferente a productos (pero que forma parte de ello),
     * el administrador tiene la libertad de aplicar el ABM en esta entidad.
     * 
     * Permite hacer un get total, insert, getById, edit y delete.
     */
    class Coleccion{
        private $collection_id;
        private $collection_name;
        
        public function getIdCollection(){
            return $this -> collection_id;
        }

        public function getCollection(){
            return $this -> collection_name;
        }

        /**
         * Permite traer todas las colecciones que se encuentren en la tabla collection
         * 
         * @return array ya que son varias
         */
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