<?php
    include "helper/IDatabase.php";

    class DataBase implements IDatabase
    {
        private $conexion;

        public function __construct()
        {
            $this->conexion = $this->conectar();
        }

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
                return $db;
            } catch (PDOException $e) { 
                echo "<p>Error: " . $e->getMessage() . "</p>\n";
                exit();

                header('Location: vistas/error.php?error=ERROR');
                exit();
            }
        }

        public function desconectar()
        {
            $this->conexion = null;
        }

        public function ejecutarSql($sql)
        {
            $resultado = $this->conexion->prepare($sql);
            return $resultado->execute();
        }

        public function ejecutarSqlActualizacion($sql, $args)
        {

        }
        
    }
?>
