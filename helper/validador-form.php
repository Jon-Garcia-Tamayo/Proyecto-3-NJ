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