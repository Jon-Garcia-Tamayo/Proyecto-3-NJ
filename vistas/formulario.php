<?php
    include "cabecera.php";
    include "helper/Input.php";
    include "helper/Utilidades.php";
?>
    <?php
        if(Input::siEnviado()){
            $errores = $validador->getErrores();
            if(!empty($errores)){
                echo "<div class='errores'>";
                foreach ($errores as $campo => $mensajeError) {
                    echo "<p>$mensajeError</p>\n";
                }
                echo "</div>";
            }
        }
    ?>

        <div class="formulario">
            <h2 class="center-items">Manejador de libros</h2>
            <div class="separador">
                <div>
                    <form method="post" action="index.php">
                        <h3 class="center-items">Crear/Filtrar</h3>

                        <label id="nombreLibro">Nombre Libro</label><br>
                        <input type="text" name="nombreLibro" value="<?php echo Input::get('nombreLibro') ?>" /><br />

                        <label id="autor">Autor</label><br>
                        <input type="text" name="autor" value="<?php echo Input::get('autor') ?>" /><br />

                        <label id="paginas">Nº Páginas</label><br>
                        <input type="text" name="paginas" value="<?php echo Input::get('paginas') ?>" /><br />

                        <label class="generos">Genero</label><br />
                        <select name="generos[]" multiple="multiple">
                            <?php
                                $generos = array("Accion", "Aventura", "Fantasía", "Policiaco", "Paranormal");
                                foreach ($generos as $g) {
                                    echo "<option value='" . $g . "'";
                                    if(isset($_POST["generos"])) {
                                        echo Utilidades::verificarLista(Input::get("generos"), $g);
                                    }
                                    echo ">$g</option>\n";
                                }
                            ?>
                        </select><br/><br/>

                        <div class='portada'>
                            <label class="portada">Portada</label><br /> 
                            <input type="radio" name="portadaTipo" value="portadaBlanda" <?php Utilidades::verificarBotones(Input::get("portadaTipo"), "portadaBlanda");?>/>Blanda
                            <input type="radio" name="portadaTipo" value="portadaDura" <?php Utilidades::verificarBotones(Input::get("portadaTipo"), "portadaDura");?> />Dura
                        </div>

                        <input type="file" name="imagenLibro" accept=".pdf,.jpg,.png" required><br/>

                        <input class="button" type="submit" name="crear" value="Crear"/>
                        <input class="button" type="submit" name="filtrar" value="Filtrar"/>
                    </form>
                </div>
                <div>
                    <form method="post" action="index.php">
                        <h3 class="center-items">Borrar</h3>
                        <label id="nombreLibro">Nombre Libro</label><br>
                        <input type="text" name="nombreLibro"/><br />
                        <label id="autor">Autor</label><br>
                        <input type="text" name="autor"/><br />
                        <input class="button" type="submit" name="borrar" value="Borrar" />
                    </form>
                </div>
            </div>
        </div>

        <?php
             echo "<div class=\"resultado center-items\"/>";
             echo $resultado; 
             echo "</div>";
        ?>

    </main>

<?php
    include "pie.php";
?>