<?php

  use GuzzleHttp\Client;
  use GuzzleHttp\Psr7\Utils;
  use GuzzleHttp\RequestOptions;

  function enviarArchivoAVerificar($nombrearchivo, $tipoMime) {
      $cliente = new GuzzleHttp\Client(["http_errors" => false]);

      // Realizamos la consulta incluyendo todas las opciones necesarias
      $response = $cliente->request('POST', "https://www.virustotal.com/api/v3/files", [
          "headers" => [
              "accept" => "application/json",
              "x-apikey" => VIRUS_TOTAL_API_KEY
          ],
          "multipart" => [
              [
                  "name" => "file",
                  "filename" => $nombrearchivo,
                  'contents' => Utils::tryFopen($nombrearchivo, "r"), // Path hacía el archivo
                  'headers' => [
                      'Content-Type' => $tipoMime
                  ]
              ]
          ]
      ]);

      // Dependiendo del estado, devolveremos un elemento u otro del array de respuesta
      $statusCode = $response->getStatusCode();
      $key = $statusCode == 200 ? "data" : "error";

      // Devolvemos una array asociativo con el código de estado y los datos decodificados
      return [
          "status" => $statusCode,
          "data" => json_decode($response->getBody()->getContents(), true)[$key]
      ];
  }

  function obtenerEstadoVerificacion($hash256) {
      $cliente = new \GuzzleHttp\Client();

      $response = $cliente->request('GET', 'https://www.virustotal.com/api/v3/files/' . $hash256, [
          'headers' => [
              'accept' => 'application/json',
              "x-apikey" => VIRUS_TOTAL_API_KEY
          ],
          'verify' => false
      ]);

      return json_decode($response->getBody()->getContents(), true)["data"]["attributes"];
  }
