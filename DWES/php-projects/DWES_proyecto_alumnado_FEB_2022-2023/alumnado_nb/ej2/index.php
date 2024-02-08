<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml' lang='es'>
  <head>
    <meta charset='utf-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=2.0' />
    <style>body{max-width:210mm;margin:0 auto;padding:0 1em;font-family:'Segoe UI','Open Sans',sans-serif}a{text-decoration:none;color:blue}h1{text-align:center;margin-top:0}nav,footer{text-align:center}</style>
    <title>Películas</title>
  </head>

  <body>
    <h1>Películas</h1>

    <nav>Inicio | <a href='editar_1.php'>Editar</a></nav>

    <h2>Inicio</h2>

    <?php

    require_once('connect_db.php');
    
    if (!isset($dbh) || !($dbh instanceof PDO) || !($dbh instanceof mysqli)) 
      echo "No existe \$dbh o no contiene una instancia de PDO";
    else
    {
    
    $sql = 'SELECT * FROM peliculas';

    $sth = $dbh->prepare($sql);

    $sth->execute();
    $resultados = $sth->fetchAll();

    $num_filas = count($resultados);

    for ($i = 0; $i < $num_filas; $i++) { ?>

	<p>Película con ID <?= $resultados[$i]['id'] ?>:</p>
	
	<ul>
	  <li>Título: <?= $resultados[$i]['titulo'] ?>.</li>
	  <li>Fecha de estreno: <?= $resultados[$i]['fecha_estreno'] ?>.</li>
	  <li>Duración: <?= $resultados[$i]['duracion'] ?> minutos.</li>
	  <li>Género: <?= $resultados[$i]['genero'] ?>.</li>
	  <li>Director: <?= $resultados[$i]['director'] ?>.</li>
	</ul>

    <?php } 
    
    } //End if
    ?>

    <footer><p>Examen de febrero - Desarrollo Web en Entorno Servidor a distancia - 2022-2023.</p></footer>

  </body>
</html>
