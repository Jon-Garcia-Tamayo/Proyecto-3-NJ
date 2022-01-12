<?php
    class Input
    {
        public static function siEnviado()
        {

        }

        public static function get($dato)
        {
            if(isset($_POST[$dato])){
                $campo = $_POST[$dato];
                $campos = Input::filtrarDato($campo);
            } else {
                $campo = "";
            }
            return $campo;
        }

        public static function filtrarDato($datos)
        {

            return $datos;
        }
    }

?>