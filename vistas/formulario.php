<?php
    include "cabecera.php";
    include "helper/input.php";
?>

        <div class="formulario">
            <h2 class="center-items">Manejador de libros</h2>
            <div class="separador">
                <div>
                    <form method="post" action="index.php">
                        <h3 class="center-items">Crear/Filtrar</h3>

                        <label id="nombreLibro">Nombre Libro</label><br>
                        <input type="text" name="nombreLibro" value="<?php echo Input::get('nombreLibro') ?>" required /><br />

                        <label id="autor">Autor</label><br>
                        <input type="text" name="autor" value="<?php echo Input::get('autor') ?>" required /><br />

                        <label id="paginas">Nº Páginas</label><br>
                        <input type="text" name="paginas" value="<?php echo Input::get('paginas') ?>" /><br />

                        <label class="generos">Genero</label><br />
                        <select name="generos[]" multiple="multiple">
                            <option value="accion" selected="selected">Accion</option>
                            <option value="aventura">Aventura</option>
                            <option value="fantasia">Fantasia</option>
                            <option value="policiaco">Policiaco</option>
                            <option value="paranormal">Paranormal</option>
                        </select><br /><br />
                        
                        <div class='portada'>
                            <label class="portada">Portada</label><br />
                            <input type="radio" name="portadaTipo" value="portadaBlanda" />Blanda
                            <input type="radio" name="portadaTipo" value="portadaDura" />Dura
                        </div>

                        <input class="button" type="submit" name="crear" value="Crear" />
                        <input class="button" type="submit" name="filtrar" value="Filtrar" />
                    </form>
                </div>
                <div>
                    <form method="post" action="index.php">
                        <h3 class="center-items">Borrar</h3>
                        <label id="nombreLibro">Nombre Libro</label><br>
                        <input type="text" name="nombreLibro" required /><br />
                        <label id="autor">Autor</label><br>
                        <input type="text" name="autor" required /><br />
                        <input class="button" type="submit" name="borrar" value="Borrar" />
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php
        if (isset($resultado)) {
            echo "<div class=\"resultado center-items\"/>";
            echo $resultado;  
            echo "</div>";
        }
    ?>

<?php
    include "pie.php";
?>