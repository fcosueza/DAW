<?php

  session_start();

  /*
   * Comprobamos si hay una session iniciada para el usuario y en tal caso
   * la eliminamos y redirigimos a la página de login.
   */

  if (isset($_SESSION['id'])) {
      session_unset();
      header('Location: login.php');
  }

