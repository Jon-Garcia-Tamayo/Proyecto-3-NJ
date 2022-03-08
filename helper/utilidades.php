<?php
    class Utilidades
    {
        public static function verificarLista($generos, $valorMenu)
        {
            if(isset($generos)){
                foreach ($generos as $genero) {
                    if(trim($genero) == $valorMenu){
                        return ' selected';
                    }
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