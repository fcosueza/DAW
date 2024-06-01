<?php
  /*
    DNI:
    NOMBRE y APELLIDOS:
   */

  require_once "connect_db.php";

  $conn = dbConnect();

  $select = "Select * from smartphones";

  $result = $conn->query($select)->fetchAll();
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

        <nav><a href='index.php'>Inicio</a> | Ver | <a href='filtrar_1.php'>Filtrar</a></nav>

        <h2>Tabla Smartphones</h2>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>GB RAM</th>
                    <th>GB Almacenamiento</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $smartphone): ?>
                      <tr>
                          <td><?php echo $smartphone['id']; ?></td>
                          <td><?php echo $smartphone['marca']; ?></td>
                          <td><?php echo $smartphone['modelo']; ?></td>
                          <td><?php echo $smartphone['memoria_ram']; ?></td>
                          <td><?php echo $smartphone['almacenamiento']; ?></td>
                      </tr>
                  <?php endforeach; ?>
            </tbody>
        </table>



        <footer><p>Examen de febrero - Desarrollo Web en Entorno Servidor a distancia - 2023-2024.</p></footer>

    </body>
</html>
