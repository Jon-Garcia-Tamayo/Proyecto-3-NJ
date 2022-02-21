<?php
    include "helper/IDatabase.php";

    class DataBase implements IDatabase
    {
        private $conexion;

        public function __construct()
        {
			
        }

        public function conectar()
        {
            $DB_SERVER = "localhost";
            $DB_NAME = "bibliotecanj";
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

        public function desconectar()
        {
            $this->conexion = null;
        }

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

        public function ejecutarSqlActualizacion($sql, $args)
        {
			try {
				$resultado = $this->conexion->prepare($sql);
				if ($resultado->execute()) {
					return "Se ha realizado la operacion $args correctamente";
				} else {
					return "Se ha producido un error al ejecutar la sentencia SQL";
				}
			} catch (PDOException $e) {
				return $e->getMessage();
			}
			
        }
        
    }
?>
