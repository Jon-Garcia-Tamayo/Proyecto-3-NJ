<?php
    /**
     * Esta clase modela un libro para ser usado en la biblioteca.
     */
    class Libro
    {
        public function __construct($nombre, $autor, $paginas, $genero, $portadaBlanda)
        {
            $this->$nombre = $nombre;
            $this->$autor = $autor;
            $this->$paginas = $paginas;
            $this->$genero = $genero;
            $this->$portadaBlanda = $portadaBlanda;
        }

        public function getNombre()
        {
            return $this->nombre;
        }

        public function getAutor()
        {
            return $this->autor;
        }

        public function getPaginas()
        {
            return $this->paginas;
        }

        public function getGenero()
        {
            return $this->genero;
        }

        public function esPortadaBlanda()
        {
            return $this->portadaBlanda;
        }

    }

?>