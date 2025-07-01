<?php
/**
 * Clase Conexion
 * 
 * Esta clase esta dedicada a conectar mi sitio con mi base de datos
 * Mediante constantes privadas, puedo setear de manera sencilla una
 * conexion de manera estable y, aunque redundante, constante.
 * 
 * Permite la conexion con mi BBDD
 */
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

    /**
     * Crea un __construct el cual se ejecuta de manera automatica cuando se
     * crea una instancia de la clase Conexion, o sea, cuando se intenta conectar
     * con mi BBDD. Si falla, se muestra un error.
     */
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
    
    /**
     * Devuelve la conexion PDO a la BBDD
     * 
     * @return PDO El cual es el Objeto de conexion a la base de datos
     */
    //! Creo una funcion para establecer una conexion con mi BBDD.
    public function getConexion() :PDO {
        return $this -> db; 
    }
}
?>