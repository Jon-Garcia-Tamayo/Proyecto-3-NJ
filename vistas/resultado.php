<?php
    include "vistas/cabecera.php";
?>

<main>
    <div class="portada center-items">
        <h1>Biblioteca de Naiara & Jon</h1>
        <p>
            Organiza tus libros favoritos con la biblioteca automática
            ¿Guardarás parodias o libros oficiales?
        </p>
        <button>Empezar</button>
    </div>
    <hr id="libros">
    <div class="libros center-items">
        <p>La biblioteca esta vacia</p>
    </div>
    <hr id="formularioIr">
    <div class="formulario">
        <h2 class="center-items">Manejador de libros</h2>
        <div class="separador">
            <div>
                <form>
                    <h3 class="center-items">Crear/Filtrar</h3>
                    <label id="nombreLibro">Nombre Libro</label><br>
                    <input type="text" name="nombreLibro" required /><br />
                    <label id="autor">Autor</label><br>
                    <input type="text" name="autor" required /><br />
                    <label id="paginas">Nº Páginas</label><br>
                    <input type="text" name="paginas" /><br />
                    <label id="genero">Genero</label><br>
                    <input type="text" name="genero" /><br />
                    <label class="comen">Portada</label><br />
                    <div class='portada'>
                        <input type="radio" name="portadaTipo" value="portadaBlanda" />Blanda
                        <input type="radio" name="portadaTipo" value="portadaDura" />Dura
                    </div>
                    <button>Crear</button>
                    <button>Filtrar</button>
                </form>
            </div>
            <div>
                <form>
                    <h3 class="center-items">Borrar</h3>
                    <label id="nombreLibro">Nombre Libro</label><br>
                    <input type="text" name="nombreLibro" required /><br />
                    <label id="autor">Autor</label><br>
                    <input type="text" name="autor" required /><br />
                    <button>Borrar</button>
                </form>
            </div>
        </div>
    </div>
</main>

<?php
    include "vistas/pie.php";
?>