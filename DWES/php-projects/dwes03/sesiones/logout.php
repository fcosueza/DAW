<?php

  // Comprobamos si hay una sessión iniciada y la destruimos en caso afirmativo.
  if (isset($_SESSION['id'])) {
      session_unset();
      session_destroy();
  }

  // Redirigimos a la página login.
  header('Location: login.php');
  exit();
