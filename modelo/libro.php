<?php
    /**
     * Esta clase modela un libro para ser usado en la biblioteca.
     */
    class Libro
    {
        private $nombre;
        private $autor;
        private $paginas;
        private $genero;
        private $portadaBlanda;
        private $rutaImagen;

        public function __construct($nombre, $autor, $paginas, $genero, $portadaBlanda, $rutaImagen)
        {
            $this->nombre = $nombre;
            $this->autor = $autor;
            $this->paginas = $paginas;
            $this->genero = $genero;
            $this->portadaBlanda = $portadaBlanda;
            $this->rutaImagen = $rutaImagen;
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

        public function getImagen()
        {
            return $this->rutaImagen;
        }

    }

?>