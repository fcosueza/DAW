<header>
    <?php
      // Si hay datos sobre la sesión, los mostramos
      if (isset($_SESSION['id'])) {
          print '<p>' . $_SESSION['nombre'] . " " . $_SESSION['apellidos'] . '(roles:' . $_SESSION['roles'] . ')' . '<a href="logout.php">Salir</a>';
      } else {
          print "Cabeccera Standard";
      }
    ?>
</header>