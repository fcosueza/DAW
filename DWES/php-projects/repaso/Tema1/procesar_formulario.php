<?php

  $suscripcionesPosibles = ["noticias", "eventos", "lanzamientos"];
  $pais = ["es", "mx", "ar", "co"];

  $datos = array();

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (isset($_POST["nombre"]) && is_string($_POST["nombre"]) && !empty(trim($_POST["nombre"]))) {
          $datos["nombre"] = $_POST["nombre"];
      } else {
          print "Error: El nombre no puede estar vacío.";
      }

      if (isset($_POST["email"]) && is_string($_POST["email"]) && !empty(trim($_POST["email"]))) {
          $datos["email"] = $_POST["email"];
      } else {
          print "Error: El email no puede estar vacío.";
      }

      if (isset($_POST["mensaje"]) && is_string($_POST["email"]) && !empty(trim($_POST["mensaje"]))) {
          $datos["mensaje"] = $_POST["mensaje"];
      } else {
          print "Error: El mensaje no puede estar vacío.";
      }

      if (isset($_POST["suscripcion"])) {
          $suscripciones = array();

          foreach ($_POST["suscripcion"] as $suscripcion) {
              if (in_array($suscripcion, $suscripcionesPosibles))
                      $suscripciones[] = $suscripcion;
          }

          $datos["suscripciones"] = implode(", ", $suscripciones);
      } else {
          $datos["suscripciones"] = "No se han seleccionado suscripciones";
      }

      if (isset($_POST["pais"]) && !empty($_POST["pais"])) {
          $datos["pais"] = $_POST["pais"];
      } else {
          print "Error: El pais no puede estar vacío";
      }
  }

  print_r($datos);

