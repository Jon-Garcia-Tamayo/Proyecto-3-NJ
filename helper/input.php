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
            $campos;
            if(isset($_POST[$dato])){
                $campo = $_POST[$dato];
                $campos = Input::filtrarDato($_POST[$dato]);
            } else {
                $campo = "";
            }
            return isset($campos) ? $campos : $campo;
        }

        public static function filtrarDato($datos)
        {
            $resultado = array();
            if (!is_array($datos)) {
                $resultado = strip_tags(trim(htmlspecialchars($datos)));
            } else {
                foreach ($datos as $dato) {
                    $resultado[] = strip_tags(trim(htmlspecialchars($dato))) . " ";
                }
            }
            return $resultado;
        }
    }

?>