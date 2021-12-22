<?php
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