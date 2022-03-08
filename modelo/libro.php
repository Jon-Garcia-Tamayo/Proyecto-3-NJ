<?php
    /**
     * Esta clase modela un libro para ser usado en la biblioteca.
     */
    class Libro
    {
        private $nombre;
        private $autor;
        private $paginas;
        private $generos;
        private $portadaBlanda;
        private $rutaImagen;

        public function __construct($nombre, $autor, $paginas, $generos, $portadaBlanda, $rutaImagen)
        {
            $this->nombre = $nombre;
            $this->autor = $autor;
            $this->paginas = $paginas;
            $this->generos = $generos;
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

        public function getGeneros()
        {	
            return $this->generos;
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