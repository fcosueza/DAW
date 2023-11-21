<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Welcome to PHP Projects</title>
  </head>
  
  <body>
    <header>
      <h1>Welcome to PHP Projects Domain</h1>
      <p>Ahora vamos a mostrar alguna información relativa al servidor.</p>
      <ol>
          <li>GUION PHP: <?php echo $_SERVER['PHP_SELF'] ?></li>
          <li>IP: <?php echo $_SERVER['SERVER_ADDR'] ?></li>
          <li>NOMBRE: <?php echo $_SERVER['SERVER_NAME'] ?></li>
      </ol>
    </header>
  </body>   
</html>

