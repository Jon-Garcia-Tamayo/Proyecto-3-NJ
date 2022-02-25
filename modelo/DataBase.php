<?php
    include "helper/IDatabase.php";

    /**
     * Esta clase modela una base de datos para realizar una conexion.
     */
    class DataBase implements IDatabase
    {
        private $conexion;

        public function __construct()
        {
            
        }
        /**
         * Este metodo realiza una conexion con la base de datos de MySQL
         * Y establece la propiedad $conexion a un objeto PDO
         */
        public function conectar()
        {
            $DB_SERVER = "localhost";
            $DB_NAME = "bdbiblioteca";
            $DB_USER = "root";
            $DB_PASS = "";

            $db;

            try{
                $db = new PDO("mysql:host=" . $DB_SERVER . ";dbname=" . $DB_NAME, $DB_USER, $DB_PASS);
                $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
                $db->exec("set names utf8mb4");
                $this->conexion = $db;
            } catch (PDOException $e) { 
                echo "<p>Error: " . $e->getMessage() . "</p>\n";
                exit();

                header('Location: vistas/error.php?error=ERROR');
                exit();
            }
        }

        /**
         * Establece la propiedad de conexion a null para desconectar la base de datos
         */
        public function desconectar()
        {
            $this->conexion = null;
        }

        /**
         * Dada una sentencia de SQL se ejecuta en la base de datos manejando errores
         * @return $resultado - Devuelve true o false dependiendo de si la sentencia se ha 
         * ejecutado correctamente o no.
         * @param $sql - Sentencia SQL a ejecutar.
         */
        public function ejecutarSql($sql)
        {
            $resultado;
            try {
                $resultado = $this->conexion->query($sql);
            } catch (PDOException $e) {
                return "Se ha producido un error al ejecutar la sentencia SQL";
            }
            return $resultado;
        }

        /**
         * Dada una sentencia de SQL y una clausula se ejecuta en la base de datos manejando errores
         * @return $resultado - Mensaje correspondiente a imprimir.
         * @param $sql - Sentencia SQL a ejecutar.
         * @param $args - Clausula a evaluar.
         */
        public function ejecutarSqlActualizacion($sql, $args)
        {
            try {
                $resultado = $this->conexion->prepare($sql);
                $resultado->execute();
            } catch (PDOException $e) {
                return $e->getMessage();
            }
            
        }
        
    }
?>
