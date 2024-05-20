<?php

  class Cancion {

      private PDO $conn;
      private string $table = "canciones";
      public int $id;
      public string $titulo;
      public string $artista;
      public string $genero;

      public function __construct($db) {
          $this->conn = $db;
      }

      // Obtener todas las canciones
      public function getAll(): PDOStatement {
          $query = "Select * from " . $this->table;
          $stmt = $this->conn->prepare($query);
          $stmt->execute();

          return $stmt;
      }

      // Obtener una canción con el ID actual
      public function getOne(): PDOStatement {
          $query = "Select * from " . $this->table . " Where id = ?";
          $stmt = $this->conn->prepare($query);
          $stmt->bindParam(1, $this->id);
          $stmt->execute();

          return $stmt;
      }

      // Añadir canción
      public function create(): bool {
          $query = "INSERT INTO " . $this->table . " SET titulo = :titulo, artista = :artista, genero = :genero";
          $stmt = $this->conn->prepare($query);

          $this->titulo = htmlspecialchars(strip_tags($this->titulo));
          $this->artista = htmlspecialchars(strip_tags($this->artista));
          $this->genero = htmlspecialchars(strip_tags($this->genero));

          $stmt->bindParam(":titulo", $this->titulo);
          $stmt->bindParam(":artista", $this->artista);
          $stmt->bindParam(":genero", $this->genero);

          if ($stmt->execute()) return true;

          return false;
      }

      // Actualizar canción
      public function update(): bool {
          $query = "UPDATE " . $this->table . " SET titulo = :titulo, artista = :artista, genero = :genero WHERE id = :id";
          $stmt = $this->conn->prepare($query);

          $this->titulo = htmlspecialchars(strip_tags($this->titulo));
          $this->artista = htmlspecialchars(strip_tags($this->artista));
          $this->genero = htmlspecialchars(strip_tags($this->genero));
          $this->id = htmlspecialchars(strip_tags($this->id));

          $stmt->bindParam(":titulo", $this->titulo);
          $stmt->bindParam(":artista", $this->artista);
          $stmt->bindParam(":genero", $this->genero);
          $stmt->bindParam(":id", $this->id);

          if ($stmt->execute()) return true;

          return false;
      }

      // Eliminar canción
      public function delete() {
          $query = "DELETE FROM " . $this->table . " WHERE id = ?";
          $stmt = $this->conn->prepare($query);

          $this->id = htmlspecialchars(strip_tags($this->id));

          $stmt->bindParam(1, $this->id);

          if ($stmt->execute()) return true;

          return false;
      }
  }
