<?php
/**
 * Clase Tipo
 * 
 * Esta encargada de manejar los "Types" de mis productos.
 * Al ser una entidad diferente a productos (pero que forma parte de ella),
 * el administrador tiene la libertad de aplicar el ABM en esta entidad.
 * 
 * Permite hacer un get total, insert, getById, edit y delete.
 */
    class Tipo{
        private $type_id;
        private $type_name;

        public function getIdType(){
            return $this -> type_id;
        }

        public function getType(){
            return $this -> type_name;
        }

        /**
         * Trae todos los tipos que conforman la tabla de "type"
         * 
         * @return array ya que son mas de 1 type
         */

        //! Funcion para traer todos los tipos
        public function todosTipos():array{
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM type";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $lista = $PDOStatement->fetchAll();

        return $lista;
        }

        //! Funcion para insertar nuevos tipos
        //! Funcion para traer tipos por ID
        //! Funcion para editar tipos
        //! Funcion para borrar tipos
        

    }


?>