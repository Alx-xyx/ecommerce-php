<?php
//! Clase para crear mi conexion hacia la base de datos

class Conexion {
    //! Creamos nuestras constantes privadas las cuales referencian todas las variables para conformar un DSN y a su vez la BBDD.

    private const DB_SERVER = "localhost";
    private const DB_USER = "root";
    private const DB_PSWD = "";
    private const DB_NAME = "kanso";
    private const DB_CHARSET = "utf8mb4";

    private const DB_DSN = "mysql:host=" . self::DB_SERVER . ";dbname=" . self::DB_NAME . ";charset=" . self::DB_CHARSET;

    //! Creo el PDO
    private PDO $db;

    public function __construct()
    {
        try {
            //! Referencio mis variables para el nuevo objeto.
            $this -> db = new PDO(self::DB_DSN, self::DB_USER, self::DB_PSWD);
        } catch (Exception $e) 
        {
            die('Error al conectar con MySQL.' . $e -> getMessage());
        }
    }
    
    //! Creo una funcion para establecer una conexion con mi BBDD.
    public function getConexion() :PDO {
        return $this -> db; 
    }
}
?>