<?php
    /**
     * Esta clase modela una biblioteca encargada de guardar todos
     * los libros de nuestra aplicacion web.
     */
    class Biblioteca 
    {
        public function __construct()
        {
            $this->libros = new Array();
        }

        public function insertarLibro($libro)
        {
            array_push($this->libros, $libro); 
        }
    }
?>