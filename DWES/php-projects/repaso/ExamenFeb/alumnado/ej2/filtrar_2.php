<?php
  /*
    DNI:
    NOMBRE y APELLIDOS:
   */

  require_once "connect_db.php";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

      if (isset($_POST["marca"]) && is_string($_POST["marca"])) {
          $marca = filter_input(INPUT_POST, "marca", FILTER_SANITIZE_SPECIAL_CHARS);
      }

      if (isset($_POST["modelo"]) && is_string($_POST["modelo"])) {
          $modelo = filter_input(INPUT_POST, "modelo", FILTER_SANITIZE_SPECIAL_CHARS);
      }

      if (isset($_POST["memoria_ram"]) && is_numeric($_POST["memoria_ram"])) {
          $ram = filter_input(INPUT_POST, "memoria_ram");
      }

      if (isset($marca) && isset($modelo) && isset($ram)) {
          $conn = dbConnect();

          $query = "Select * from smartphones where marca = :marca and modelo = :modelo and memoria_ram = :memoria";
          $stmt = $conn->prepare($query);

          $stmt->bindParam(":marca", $marca);
          $stmt->bindParam(":modelo", $modelo);
          $stmt->bindParam(":memoria", $ram);

          if ($stmt->execute()) {
              $result = $stmt->fetchAll();
          } else {
              echo "Los datos introducidos no son correctos.";
          }
      }
  }
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

        <?php if (!isset($result) || count($result) == 0): ?>
              <h1>No hay smartphones con los datos indicados</h1>

          <?php else: ?>
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
                      <?php foreach ($result as $smartphone):
                          ?>
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
        <?php endif; ?>

        <footer><p>Examen de febrero - Desarrollo Web en Entorno Servidor a distancia - 2023-2024.</p></footer>

    </body>
</html>
