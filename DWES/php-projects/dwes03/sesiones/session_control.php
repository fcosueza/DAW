<?php

  // Iniciamos la sesión
  session_start();

  // Comprobamos si el usuario ya esta loggeado y si se ha superado el tiempo de inactividad.
  if (isset($_SESSION['id'])) {
      if ((time() - $_SESSION['actividad']) < 120) {
          $_SESSION['actividad'] = [time()];
      } else {
          session_unset();
          session_destroy();

          header('Location: login.php');
          exit();
      }
  } else {
      header('Location: login.php');
      exit();
  }