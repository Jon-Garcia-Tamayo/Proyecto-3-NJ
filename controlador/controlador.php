<?php
    include "helper/validador-form.php";


    /**
     * Esta clase modela el controlador encargado de manejar la vista 
     * y el modelo.
     */
    class Controlador 
    {
        /**
         * Si el formulario esta relleno muestra el resultado, sino
         * muestra el formulario a rellenar.
         */
        public function run()
        {
            // Entrada a la pagina por primera vez
            if (!isset($_POST["nombreLibro"])) {
                $this->mostrarFormulario("validar", null, null);
                exit();
            }

            if(isset($_POST["nombreLibro"])) {
                $this->validar();
                exit();
            }
        }

        /**
         * Muestra el formulario con un resultado a pasar.
         * 
         * @param string resultado - resultado a mostrar.
         * */
        private function mostrarFormulario($accion, $validador, $resultado)
        {
            include 'vistas/formulario.php';
        }

        /**
         * Crea y devuelve un array con reglas de validacion.
         * 
         * @return array
         * */
        public function crearReglasDeValidacion()
        {
            $reglasDeValidacion = array(
                "nombreLibro" => array("required" => true),
                "autor" => array("required" => true),
                "paginas" => array("required" => true, "type" => "integer"),
                "portadaTipo" => array("required" => true)
            );
            return $reglasDeValidacion;
        }

        /**
         * Valida los datos recogidos del formulario
         * 
         * */
        public function validar() 
        {
            $validador = new ValidadorForm();
            $reglasValidacion = $this->crearReglasDeValidacion();

            $resultado = $this->generarResultado();

            $validador->validar($_POST, $reglasValidacion);
            if ($validador->esValido()) {
                $this->mostrarFormulario("continuar", $validador, $resultado);
                exit();
            }

            $this->mostrarFormulario("validar", $validador, null);
            exit();
        }

        /**
         * Genera el resultado de los datos enviados debajo del formulario
         * 
         * @return resultado a imprimir
         * */
        public function generarResultado(){
            $resultado = "";
            foreach ($_POST as $campo => $valorCampo) {
                if($valorCampo != "Crear"){
                    if (is_array($valorCampo)) {
                        $resultado .= "Generos: <br/>";
                        foreach ($valorCampo as $generos) {
                            $resultado .=  " • " . $generos . "<br>";
                        }
                    } else {
                        $resultado .= $campo . ": " . strip_tags(trim($valorCampo)) . "<br/>";
                    }
                }                
            }
            return $resultado;
        }

    }
?>