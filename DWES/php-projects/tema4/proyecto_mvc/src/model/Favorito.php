<?php

  namespace DWES04\model;

  use \DWES04\DB;

  class Favorito {

      public static function nuevoFavorito(Usuario $u, Producto $p) {
          $sql = "INSERT INTO favoritos (producto_id, usuario_id) VALUES (:producto_id, :usuario_id)";
          $opresult = DB::doSQL($sql, ['producto_id' => $p->getId(), 'usuario_id' => $u->getId()]);
          return $opresult;
      }

      /**
       * Obtiene la lista de productos favoritos de un usuario.
       */
      public static function obtenerFavoritos(Usuario $u) {
          $sql = "SELECT producto_id FROM favoritos WHERE usuario_id=:usuario_id";
          $res = DB::doSQL($sql, ['usuario_id' => $u->getId()]);
          $ret = [];
          if (is_array($res)) {
              foreach ($res as $producto) {
                  $p = Producto::rescatar($producto['producto_id']);
                  if ($p instanceof Producto) {
                      $ret[] = $p;
                  }
              }
          }
          return $ret;
      }

      public static function borrarFavorito(Usuario $u, int|Producto $product_id) {
          if ($product_id instanceof Producto)
              $product_id = $product_id->getId();
          $sql = "DELETE FROM favoritos WHERE usuario_id=:usuario_id AND producto_id=:producto_id";
          return DB::doSQL($sql, ['usuario_id' => $u->getId(), 'producto_id' => $product_id]);
      }
  }
