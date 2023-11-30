<!DOCTYPE html>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Francisco Javier Sueza Rodríguez" />
        <meta name="description" content="Formulario de Asociación Respira" />

        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
        <link rel="stylesheet" href="css/estilo.css" />

        <title>Asociación Respira: Formulario</title>
    </head>

    <body class="flex flex__columns">
        <main class="flex contenido">
            <form class="form flex flex__columns" action="save.php" method="POST">
                <div class="form__control">
                    Señala las asignaturas que te resulten más complicadas:<BR><BR>

                    <label><input type="checkbox" name="asgs[]" value="LCL"> Lengua Castellana y Literatura. </label><BR>
                    <label><input type="checkbox" name="asgs[]" value="M"> Matemáticas. </label><BR>
                    <label><input type="checkbox" name="asgs[]" value="BG"> Biología y Geología.</label><BR> <!-- Esta opción no deberá mostrarse si el usuario selecciono 2ESO -->
                    <label><input type="checkbox" name="asgs[]" value="GH"> Geografía e Historia. </label><BR>
                    <label><input type="checkbox" name="asgs[]" value="FQ"> Física y Química. </label><BR>
                    <label><input type="checkbox" name="asgs[]" value="I"> Inglés. </label><BR>
                </div>

                <br>
                <div class="form__control">
                    <label for="tiempolibre">Selecciona aquellas opciones a las que que dedicas tu tiempo libre (3 horas o más a la
                        semana):</label><BR>
                    <select id="tiempolibre" name="tiempolibre[]" multiple size="8">
                        <option value="deportes">Práctico deportes</option>
                        <option value="musica">Toco instrumentos musicales</option>
                        <option value="danza">Práctico danza</option>
                        <option value="art">Práctico actividades artísticas: teatro, pintura, etc.</option>
                        <option value="vjuegos">Juego a video juegos </option>
                        <option value="television">Veo la televisión</option>
                        <option value="dom">Realizo tareas domésticas: limpiar, cocinar, etc. </option>
                        <option value="lectura">Leo libros, cómics, revistas, etc. (sin contar los libros del instituto)</option>
                    </select><BR>
                </div>
                <small class="note">Nota: pulsa Ctrl+click para seleccionar más de una opción</small>
                <BR>
                <input type="submit" value="Terminar">
            </form>
        </main>

    </body>
</html>

