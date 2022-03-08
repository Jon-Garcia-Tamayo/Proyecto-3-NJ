<?php
    include "helper/Validador-Form.php";
    include "modelo/DaoLibro.php";
    include "modelo/libro.php";


    /**
     * Esta clase modela el controlador encargado de manejar la vista 
     * y el modelo.
     */
    class Controlador 
    {
        private $daoLibro;

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
                $this->registrar($validador);
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
        private function generarResultado(){
            $resultado = "";
            foreach ($_POST as $campo => $valorCampo) {
                if($valorCampo != "Crear"){
                    if (is_array($valorCampo)) {
                        $resultado .= "Generos: <br/>";
                        foreach ($valorCampo as $generos) {
                            $resultado .=  " • " . $generos . "<br>";
                        }
                    } else {
                        $valorCampo = strip_tags(trim($valorCampo));
                        switch ($campo) {
                            case 'nombreLibro':
                                $resultado .= "El nombre del libro es " . $valorCampo . "<br/>";
                                break;

                            case 'autor':
                                $resultado .= "El nombre del autor es " . $valorCampo . "<br/>";
                                break;

                            case 'paginas':
                                $resultado .= "Tiene " . $valorCampo . " paginas <br/>";
                                break;

                            case 'portadaTipo':
                                $resultado .= "La portada es " . $valorCampo . "<br/>";
                                break;
                        }
                    }
                }                
            }
            return $resultado;
        }

        /**
         * Crea un objeto libro a partir de los datos recogidos del formulario a través
         * de $_POST[]
         * 
         * @return libro - Objeto libro creado.
         * */
        public function crearLibro() 
        {		        
            $generos = 0;
            $portadaTipo = "";
            $paginas = 0;

            if(!isset($_POST["generos"])){
                $generos = 0;
            } else {
                $generos = count($_POST["generos"]);
            }

            if(!isset($_POST["portadaTipo"])){
                $portadaTipo = "";
            } else {
                $portadaTipo = $_POST["portadaTipo"];
            }

            $libro = new Libro($_POST["nombreLibro"], $_POST["autor"], $_POST["paginas"], $generos, $portadaTipo, $_POST["imagenLibro"]);
            return $libro;
        }
		
        /** 
         * Registra un libro en la base de datos. En caso de que haya un libro existente, se muestra
         * un mensaje para indicarlo. El mismo caso ocurre si la inserción falla
         * 
         * @param validador - validador a utilizar
         * */
		public function registrar($validador) 
		{
			$this->daoLibro = new DaoLibro();
			
			$libro = $this->crearLibro();
			
			$nombre = $libro->getNombre();
			$autor = $libro->getAutor();    
			
			if (!($this->daoLibro->existeLibro($nombre, $autor))) {
				echo "<p>" . $this->daoLibro->insertarLibro($libro) ? "Se ha realizado la operacion INSERT correctamente" : "No se ha podido insertar el Libro" . "</p>";
			} else {
				echo "<p>Este libro ya existe</p>";
			}
		}

    }
?>