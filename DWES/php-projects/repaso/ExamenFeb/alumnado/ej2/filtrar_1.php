<?php
  /*
    DNI:
    NOMBRE y APELLIDOS:
   */
?>
<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml' lang='es'>
    <head>
        <meta charset='utf-8' />
        <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=2.0' />
        <style>body{
                max-width:210mm;
                margin:0 auto;
                padding:0 1em;
                font-family:'Segoe UI','Open Sans',sans-serif
            }
            a{
                text-decoration:none;
                color:blue
            }
            h1{
                text-align:center;
                margin-top:0
            }
            nav,footer{
                text-align:center
            }</style>
        <title>Smartphones</title>
    </head>

    <body>
        <h1>Smartphones</h1>

        <nav><a href='index.php'>Inicio</a> | <a href='ver.php'>Ver</a> | Filtrar</nav>

        <h2>Filtrar</h2>

        <form method="POST" action="./filtrar_2.php" name="filtrar">
            <div>
                <label>Marca:</label>
                <input type="text" name="marca" required />
            </div>
            <div>
                <label>Modelo:</label>
                <input type="text" name="modelo" required />
            </div>
            <div>
                <label>Memoria Ram:</label>
                <input type="number" name="memoria_ram" required />
            </div>
            <button type="submit">Enviar</button>
        </form>

        <footer><p>Examen de febrero - Desarrollo Web en Entorno Servidor a distancia - 2023-2024.</p></footer>

    </body>
</html>
