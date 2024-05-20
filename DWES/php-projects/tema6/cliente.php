<?php

  require "vendor/autoload.php";

  use GuzzleHttp\Client;

$cliente = new Client(["base_uri" => 'http://localhost/tema6/Api_canciones.php']);

// Obtener todas las canciones

  $response = $cliente->request("GET", "");

  echo "Obtener todas las canciones:<br /><br />";
  echo $response->getBody();
  echo "<br />---------------------<br /><br />";

  // Obtener una cancion

  $cancionID = 1;
  $response = $cliente->request("GET", "", ["query" => ["id" => $cancionID]]);

  echo "Obtener la canción con ID:<br /><br />";
  echo $response->getBody();
  echo "<br />---------------------<br /><br />";

  // Crear una Canción

  $response = $cliente->request("POST", "", ["json" => [
          "titulo" => "Show must go on",
          "artista" => "Queen",
          "genero" => "Pop Rock"
  ]]);

  echo "Añadir una cancion:<br /><br />";
  echo $response->getBody();
  echo "<br />---------------------<br /><br />";

