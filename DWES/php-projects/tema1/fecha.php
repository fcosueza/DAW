<?php

  /*
   * Función que devuelve la fecha actual en castellano.
   */

  function fecha($dia, $mes, $ano) {
      $fecha = mktime(0, 0, $dia, $mes, $ano);

      $diaSemana = date("N", $fecha);

      $textoDia = "";
      $textoMes = "";

      // Primero traducimos el día de la semana

      switch ($diaSemana) {
          case 1:
              $textoDia = "Lunes";
              break;
          case 2:
              $textoDia = "Martes";
              break;
          case 3:
              $textoDia = "Miercoles";
              break;
          case 4:
              $textoDia = "Jueves";
              break;
          case 5:
              $textoDia = "Viernes";
              break;
          case 6:
              $textoDia = "Sabado";
              break;
          default:
              $textoDia = "Domingo";
      }

      // A continuación traducimos el mes del año

      switch ($mes) {
          case 1:
              $textoMes = "Enero";
              break;
          case 2:
              $textoMes = "Febrero";
              break;
          case 3:
              $textoMes = "Marzo";
              break;
          case 4:
              $textoMes = "Abril";
              break;
          case 5:
              $textoMes = "Mayo";
              break;
          case 6:
              $textoMes = "Junio";
              break;
          case 7:
              $textoMes = "Julio";
              break;
          case 8:
              $textoMes = "Agosto";
              break;
          case 9:
              $textoMes = "Septiembre";
              break;
          case 10:
              $textoMes = "Octubre";
              break;
          case 11:
              $textoMes = "Noviembre";
              break;
          default:
              $textoMes = "Diciembre";
      }

      // Devolvemos la cadena resultante

      return $textoDia . ", " . $dia . " de " . $textoMes . " de " . $ano;
  }
