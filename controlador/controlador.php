<?php
    class Controlador {

        public function run()
        {
            if (!isset($_POST['crear'])) {
                $this->mostrarFormulario();
            } else {
                $resultado = 'El nombre del libro es: ';
            
                $nombre = $_POST['nombreLibro'];
                $autor = $_POST['autor'];
                $numPaginas = $_POST['paginas'];
            
                $resultado .= $nombre . '<br /> El autor es: ' . $autor . '<br /> El Nº de paginas es: ' . $numPaginas
                . '<br />';
            
                if (isset($_POST['generos'])){
                    $generos = $_POST['generos'];
                    if(count($generos) <= 1){
                        $resultado .= 'El genero es: ' . $generos[0];
                    } else {
                        $resultado .= 'Los generos son: <br />';
                        foreach ($generos as $genero) {
                            $resultado .= '• ' . $genero . '<br />';
                        }
                    }
                }

                $resultado .= "<br />";
            
                if (isset($_POST['portadaTipo'])){
                    $portada = $_POST['portadaTipo'];
                    switch ($portada) {
                        case "portadaBlanda": 
                            $resultado .= "La portada es Blanda";
                            break;
            
                        case "portadaDura": 
                            $resultado .= "La portada es Dura";
                            break;
                    }
                }

                $this->mostrarResultado($resultado);
            }
            exit();
        }

        private function mostrarFormulario() 
        {
            include 'vistas/formulario.php';
        }

        private function mostrarResultado($resultado)
        {
            include 'vistas/resultado.php';
        }
    }
?>