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
            <form class="form flex flex__columns" action="form2.php" method="POST">
                <div class="form__control">
                    <label>Indica el código postal de la zona donde vives:
                        <input name="codigo_postal" type="text" value="" />
                    </label>
                </div>
                <BR>
                <div class="form__control" >
                    <label for="sexo">Selecciona tu sexo:</label>
                    <select id="sexo" name="sexo">
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                        <option value="O">Otro</option>
                        <option value="N" selected>Prefiero no decirlo</option>
                    </select>
                </div>
                <BR>
                <div class="form__control">
                    <label for="curso">Curso:</label>
                    <select id="curso" name="curso">
                        <option value="1ESO" selected>1º ESO</option>
                        <option value="2ESO">2º ESO</option>
                        <option value="3ESO">3º ESO</option>
                    </select>

                </div>
                <BR>
                <div class="form__control">
                    Indica que rama de 4º de la ESO que te gustaría coger:<BR><BR>

                    <input type="radio" name="rama" value="BCH"> Enseñanzas orientadas hacia Bachillerato.<BR>
                    <input type="radio" name="rama" value="FP"> Enseñanzas orientadas hacia Formación Profesional.<BR>
                    <BR>
                    <input type="submit" name="enviar" value="Siguiente"><BR><BR><BR>
                </div>
            </form>
        </main>

    </body>
</html>


