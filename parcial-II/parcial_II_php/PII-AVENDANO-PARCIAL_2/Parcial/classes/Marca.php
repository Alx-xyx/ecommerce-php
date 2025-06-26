<?php

class Marca{
    private $marca_id;
    private $marca_name;

    public function getIdMarca(){
        return $this -> marca_id;
    }

    public function getMarca(){
        return $this -> marca_name;
    }

    //! Funcion para obtener todas las marcas
    public function todasMarcas():array{
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM marca";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $lista = $PDOStatement->fetchAll();

        return $lista;

    }

    //! Funcion para insertar nuevas marcas
    public static function insert(string $marca){
        $conexion = (new Conexion())->getConexion();
        $query = "INSERT INTO marca (`marca`) VALUES (:marca)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'marca' => $marca
        ]);
    }

    //! Funcion para obtener marcas por ID
    public static function getMarcaById(int $id): ?Marca
    {
        $conexion = (new Conexion()) -> getConexion();
        $query = "SELECT * FROM marcas WHERE marca_id = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(["id" => $id]);
        $lista = $PDOStatement->fetch();

        return !empty($lista) ? $lista : null;
    }

    //! Funcion para editar marcas

    //! Funcion para borrar marcas

}

?>