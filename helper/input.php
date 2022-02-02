<?php
    class Input
    {
        public static function siEnviado()
        {
            return !empty($_POST);
        }

        public static function get($dato)
        {
            $campo;
            if(isset($_POST[$dato])){
                $campo = $_POST[$dato];
                $campos = Input::filtrarDato($_POST[$dato]);
            } else {
                $campo = "";
            }
            return $campos;
        }

        public static function filtrarDato($datos)
        {
            if (!is_array($datos)) {
                $datos = strip_tags(trim($datos));
            }
            return $datos;
        }
    }

?>