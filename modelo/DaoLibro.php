<?php
    include "modelo/Database.php";

    /**
     * Esta clase modela el DAO de un libro de la biblioteca
     */
    class DaoLibro 
    {
        private $db;

        public function __construct() 
        {
            $this->db = new DataBase();
        }

        /**
         * Inserta un libro en la base de datos dado un objeto libro.
         * @param $libro - El libro que se quiera meter.
         * @return $resultado - Si la sentencia a sido satisfactoria.
         */
        public function insertarLibro($libro) 
        {
            $this->db->conectar();

            $consulta = "INSERT INTO libro VALUES (\""
                                . $libro->getNombre() . "\", \"" 
                                . $libro->getAutor() . "\", "
                                . $libro->getPaginas() . ", \""
                                . $libro->getGeneros() . "\", \""
                                . $libro->esPortadaBlanda() . "\", \""
                                . $libro->getImagen() . "\");";

            $resultado = $this->db->ejecutarSqlActualizacion($consulta, "INSERT");
			
            $this->db->desconectar();

            return $resultado;
        }

        /**
         * Te dice si existe el libro en la base de datos.
         * @param $nombre - Nombre del libro.
         * @param $autor - El autor del libro.
         * @return $resultado - Si la sentencia a sido satisfactoria.
         */
        public function existeLibro($nombre, $autor)
        {
            $this->db->conectar();
            $consulta = "SELECT * FROM libro WHERE nombre = '$nombre' AND autor = '$autor';";
			
            $resultado = $this->db->ejecutarSql($consulta);
            
			$datos = "";
			
			foreach ($resultado as $columna) {
				foreach ($columna as $dato) {
					$datos .= $dato;
				}
			}
			
            $this->db->desconectar();

            return strlen($datos) > 0;
        }

    }
?>