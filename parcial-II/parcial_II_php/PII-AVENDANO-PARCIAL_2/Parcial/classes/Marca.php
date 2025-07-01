<?php
/**
 * Clase Marca
 * 
 * Esta encargada de manejar los "Brands" de mis productos.
 * Al ser una entidad diferente a productos (pero que forma parte de ella),
 * el administrador tiene la libertad de aplicarl el ABM en esta entidad.
 * 
 * Permite hacer un get total, insert, getById, edit y delete
 */
class Marca{
    private $marca_id;
    private $marca_name;

    public function getIdMarca(){
        return $this -> marca_id;
    }

    public function getMarca(){
        return $this -> marca_name;
    }
    
    /**
     * Trae todas las marcas que conforman la tabla "marca"
     * @return array ya que son varias
     */

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

    /**
     * Inserta una nueva marca dentro de la tabla "marca"
     * @param string $marca -> Se necesita saber que marca se debe insertar
     */
    //! Funcion para insertar nuevas marcas
    public static function insert(string $marca){
        $conexion = (new Conexion())->getConexion();
        $query = "INSERT INTO marca (`marca`) VALUES (:marca)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'marca' => $marca
        ]);
    }

    /**
     * Obtiene una marca mediante el ID provisto
     * @param int $id -> El ID a que se hace referencia para buscar
     * @return Marca|null -> Si encuentra una marca con el ID lo devolvera,
     * caso contrario devolvera un null
     */
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