<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="author" content="Francisco Sueza Rodríguez" />
        <meta name="description" content="Formulario para la creación de un nuevo taller" />

        <link rel="stylesheet" href="style/style.css">

        <title>API de la Asociación Respira</title>

    </head>
    <body>
        <h1>Formulario de Creación del Taller</h1>

        <form class="form" method="POST" action="/crearTaller.php">
            <div>
                <label>Nombre del taller:</label>
                <input type="text" name="nombre">
            </div>
            <div>
                <label>Descripción del taller:</label>
                <input type="text" name="descripcion">
            </div>
            <div>
                <label>Dia de la Semana (L, M, X, J, V):</label>
                <input type="text" name="dia_semana">
            </div>
            <div>
                <label>Hora de Inicio (Formato: HH:mm)::</label>
                <input type="text" name="hora_inicio">
            </div>
            <div>
                <label>Hora de Finalización (Formato: HH:mm):</label>
                <input type="text" name="hora_fin">
            </div>
            <div>
                <label>Cupo Máximo (min: 5 max:30):</label>
                <input type="text" name="cupo_maximo">
            </div>
            <div>
                <label>Id de la Ubicación:</label>
                <input type="text" name="ubicacion_id">
            </div>

            <button type="submit">Enviar</button>
        </form>

    </body>
</html>

