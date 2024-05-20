<?php

  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
  header("Access-Control-Allow-Headers: Content-type");

  include_once "Database.php";
  include_once "Cancion.php";

  $database = new Database();
  $db = $database->getConection();

  $cancion = new Cancion($db);
  $request = json_decode(file_get_contents("php://input"));

  switch ($_SERVER["REQUEST_METHOD"]) {
      case "GET":
          $id = $_GET['id'] ?? null;

          if ($id) {
              $cancion->id = $id;
              $stmt = $cancion->getOne();
              $row = $stmt->fetch(PDO::FETCH_ASSOC);

              if ($row) {
                  $cancion_arr = Array(
                      "id" => $row["id"],
                      "titulo" => $row["titulo"],
                      "artista" => $row["artista"],
                      "genero" => $row["genero"]
                  );

                  echo json_encode($cancion_arr);
              } else {
                  echo json_encode(array("message => La canción indicada no existe"), JSON_UNESCAPED_UNICODE);
              }
          } else {
              $stmt = $cancion->getAll();
              $num = $stmt->rowCount();

              if ($num > 0) {
                  $canciones_arr = array();

                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                      extract($row);
                      $cancion_item = array(
                          "id" => $row["id"],
                          "titulo" => $row["titulo"],
                          "artista" => $row["artista"],
                          "genero" => $row["genero"]
                      );

                      array_push($canciones_arr, $cancion_item);
                  }

                  echo json_encode($canciones_arr);
              } else {
                  echo json_encode(array("message" => "No se han encotnrado canciones"), JSON_UNESCAPED_UNICODE);
              }
          }
          break;

      case "POST":
          $cancion->titulo = $request->titulo;
          $cancion->artista = $request->artista;
          $cancion->genero = $request->genero;

          if ($cancion->create()) {
              echo json_encode(array("message" => "La canción se ha creado correctamente"), JSON_UNESCAPED_UNICODE);
          } else {
              echo json_encode(array("message" => "La canción no se ha podido crear."), JSON_UNESCAPED_UNICODE);
          }

          break;

      case "PUT":
          if (!isset($request->id)) {
              echo json_encode(array("message" => "Se debe indicar un ID para modificar la canción."), JSON_UNESCAPED_UNICODE);
              exit(0);
          }

          $cancion->id = $request->id;
          $cancion->titulo = $request->titulo;
          $cancion->artista = $request->artista;
          $cancion->genero = $request->genero;

          if ($cancion->update()) {
              echo json_encode(array("message" => "La canción se ha actualizado correctamente"), JSON_UNESCAPED_UNICODE);
          } else {
              echo json_encode(array("message" => "La canción no se ha podido actualiza."), JSON_UNESCAPED_UNICODE);
          }

          break;
      case "DELETE":
          if (!isset($request->id)) {
              echo json_encode(array("message" => "Se debe indicar un ID para modificar la canción."), JSON_UNESCAPED_UNICODE);
              exit(0);
          }

          $cancion->id = $request->id;

          if ($cancion->delete()) {
              echo json_encode(array("message" => "La canción se ha eliminado correctamente"), JSON_UNESCAPED_UNICODE);
          } else {
              echo json_encode(array("message" => "La canción no se ha podido eliminar."), JSON_UNESCAPED_UNICODE);
          }

          break;
      default:
          http_response_code(405);
          echo json_encode(array("message" => "Método no permitido."), JSON_UNESCAPED_UNICODE);

          break;
  }