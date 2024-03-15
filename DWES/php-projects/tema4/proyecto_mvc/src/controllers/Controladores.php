<?php

  namespace DWES04\controllers;

  use DWES04\exceptions\AppException;
  use DWES04\model\Favorito;
  use DWES04\model\Producto;
  use DWES04\model\Usuario;
  use Smarty;

  class Controladores {

      public static function default(Smarty $s) {
          $l = Producto::listar();
          $s->assign('productos', $l);
          $s->display('default.tpl');
      }

      public static function autenticar($smarty) {
          $usuario = filter_input(INPUT_POST, 'username');
          $password = filter_input(INPUT_POST, 'password');
          if (!empty($usuario) && !empty($password)) {
              $u = Usuario::verificarUsuario($usuario, $password);
              if ($u instanceof Usuario)
                  $_SESSION['usuario'] = $u;
              else {
                  $notificaciones = ['El usuario o password indicado no es válido'];
                  $smarty->assign('notificaciones', $notificaciones);
              }
          } else {
              $notificaciones = ['No se han indicado el usuario o el password'];
              $smarty->assign('notificaciones', $notificaciones);
          }
          Controladores::default($smarty);
      }

      public static function addtofav(Smarty $smarty) {

          if (!isset($_SESSION['usuario'])) {
              throw AppException::restrictedArea();
          }

          $scenarios = [AppException::DB_CONSTRAINT_VIOLATION_IN_QUERY => 'Ese producto ya era favorito.',
              0 => 'No se ha podido crear el favorito. ',
              '1' => 'Se ha anotado el producto como favorito.',
              'producto_desconocido' => 'El producto no existe o se ha borrado en el transcurso de esta operación.',
              'producto_no_facilitado' => 'El producto no se ha enviado en la petición HTTP.'];

          $idproducto = filter_input(INPUT_POST, 'idprod', FILTER_VALIDATE_INT);
          if ($idproducto !== null && $idproducto !== false) {
              $p = Producto::rescatar($idproducto);
              if ($p instanceof Producto) {
                  try {
                      $r = Favorito::nuevoFavorito($_SESSION['usuario'], $p);
                  } catch (AppException $e) {
                      if ($e->getCode() === AppException::DB_CONSTRAINT_VIOLATION_IN_QUERY)
                          $r = AppException::DB_CONSTRAINT_VIOLATION_IN_QUERY;
                      else
                          throw $e;
                  }
                  $scenario = $scenarios[$r];
              } else
                  $scenario = $scenarios['producto_desconocido'];
          } else
              $scenario = $scenarios['producto_no_facilitado'];
          $smarty->assign('resultado', $scenario);
          $smarty->display('add_to_fav_result.tpl');
      }

      public static function listfavs(Smarty $smarty) {

          if (!isset($_SESSION['usuario'])) {
              throw AppException::restrictedArea();
          }

          $productos = Favorito::obtenerFavoritos($_SESSION['usuario']);

          $smarty->assign('productos', $productos);
          $smarty->display('lista_de_favoritos.tpl');
      }

      public static function removefromfav(Smarty $smarty) {
          if (!$_SESSION['usuario']) {
              throw AppException::restrictedArea();
          }

          $idproducto = filter_input(INPUT_POST, 'idprod', FILTER_VALIDATE_INT);

          switch (Favorito::borrarFavorito($_SESSION['usuario'], $idproducto)) {
              case 0: $scenario = "No se ha borrado el producto favorito porque no estaba marcado como tal.";
                  break;
              case 1: $scenario = "Se ha borrado el producto favorito de la lista.";
                  break;
          }
          $smarty->assign('resultado', $scenario);
          $smarty->display('remove_from_fav_result.tpl');
      }

      public static function logout() {
          unset($_SESSION['usuario']);
      }
  }
