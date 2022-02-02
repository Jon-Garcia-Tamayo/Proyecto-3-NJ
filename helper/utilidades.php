<?php
    class Utilidades
    {
        public static function verificarLista($generos, $valorMenu)
        {
            foreach ($generos as $genero) {
                if($genero == $valorMenu){
                    echo ' selected = "selected"';
                }
            }
        }

        public static function verificarBotones($valor, $valorBoton)
        {
            if($valor == $valorBoton){
                echo 'checked = "checked"';
            }
     
        }
    }
?>