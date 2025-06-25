<?php
    //! CRUD para las marcas

    // Primero creo la clase
    class Marca{

        // Variables privadas
        private $id_marca;
        private $marca;

        // Funciones basicas
        public function getIdMarca() {
            return $this -> id_marca;
        }

        public function Marca() {
            return $this -> marca;
        }

        //? Creo una function para obtener todas las marcas de mi BBDD

        public function todas_marcas(){
            //* Me conecto a mi BBDD para obtener los datos que necesito
            $conexion = (new Conexion()) -> getConexion();

            //! Creo la query o consulta para esta funcion en especifico
            $query = "SELECT * FROM marcas";

            //! Preparo mi PDO para ser mandado y que haga la consulta correspondiente
            $PDOStatement = $conexion -> prepare($query);

            //! Aca usa el self::class para autoreferenciarse y buscar en la clase que lleva su nombre
            $PDOStatement -> setFetchMode(PDO::FETCH_CLASS, self::class);
            $PDOStatement -> execute();

            //! Al tener la lista pertinente de los datos que se hayan podido obtener, hago un fetchAll para traerlos
            $lista = $PDOStatement -> fetchAll();

            //! Hago un return de la lista para poder usarlo
            return $lista;
        }

        //* Hago que para esta function solo pueda usar la marca como un dato del tipo string 
        public static function insert(string $marca){
            $conexion = (new Conexion()) -> getConexion();

            $query = "INSERT INTO marcas(`marca`) VALUES (:marca)";

            $PDOStatement = $conexion -> prepare($query);

            $PDOStatement->execute([
                'marca' => $marca
            ]);
        }

        //? Creo una function para obtener marcas mediante ID.

        //* Especifico que necesito usar el $id como un dato del tipo INT
        public static function get_marca_id(int $id): ?Marca {
            $conexion = (new Conexion()) -> getConexion();

            $query = "SELECT * FROM marcas WHERE id_marca = :id";

            $PDOStatement = $conexion -> prepare($query);

            $PDOStatement-> setFetchMode(PDO::FETCH_CLASS, self::class);

            $PDOStatement-> execute(["id" => $id]);

            $lista = $PDOStatement -> fetch();

            //? Validacion para mi variable lista. En caso de que NO este vacia, me devolvera la lista, y en caso de que SI este vacia va a devolverme un NULL 

            return !empty($lista) ? $lista : null;
        }
    }
?>