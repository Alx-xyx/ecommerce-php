<?php
    class Tipo{

        private $type_id;
        private $type_name;

        public function getIdType(){
            return $this -> type_id;
        }

        public function getType(){
            return $this -> type_name;
        }

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