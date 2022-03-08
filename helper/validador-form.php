<?php
    class ValidadorForm
    {
        private $errores;
        private $reglasValidacion;
        private $valido;

        public function __construct()
        {
            $this->errores = Array();
            $this->reglasValidacion = null;
            $this->valido = false;
        }

        public function validar($fuente, $reglasValidacion) 
        {
            foreach ($fuente as $nombreCampo => $valorCampo) {
                if ($nombreCampo != "crear" && $nombreCampo != "generos" && $nombreCampo != "imagenLibro") {
                    $arrayRegla = $reglasValidacion[$nombreCampo];
                    foreach ($arrayRegla as $regla => $valorRegla) {
                        $mensajeError;
                        switch ($regla) {
                            case "required":
                                if (($valorCampo == "") == $valorRegla) {
                                    $mensajeError = "ERROR: El campo " . $nombreCampo . " es requerido";
                                    $this->addError($nombreCampo, $mensajeError);
                                }
                                break;
    
                            case "type":
                                if(!($valorCampo == "")){
                                    if (is_numeric($valorCampo)) {
                                        $valorCampo = intval($valorCampo);
                                    } else {
                                        $mensajeError = "ERROR: El campo " . $nombreCampo . " debe ser numerico";
                                        $this->addError($nombreCampo, $mensajeError);
                                    }
                                }                                
                                
                                break;
                        }
                    }
                }
            }
            $this->valido = count($this->errores) == 0;
        }

        public function addError($nombreCampo, $error)
        {
            $this->errores[$nombreCampo] = $error;
        }

        public function esValido()
        {
            return $this->valido;
        }

        public function getErrores()
        {
            return $this->errores;
        }

        public function getMensajeError($campo)
        {
            return $campo;   
        }
    }
?>