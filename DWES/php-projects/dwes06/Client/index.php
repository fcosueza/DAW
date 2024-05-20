<?php

  require "vendor/autoload.php";

  $client = new GuzzleHttp\Client();

  $response = $client->request('GET', 'https://api.github.com/repos/guzzle/guzzle');

  $json = $response->getBody()->getContents();

  $payload = json_decode($json, true);

  echo 'Código de estado HTTP: ' . $response->getStatusCode();
  echo '<br />';
  echo 'Datos recibidos: ' . print_r($payload, true);
