<?php

//TODO:
//1.- Arranca sesiones
//2.- Comprueba si hay información del usuario en la sesión, si no, redirecciona a login.php
//3.- Comprueba si el tiempo de inactividad ha expirado, si es así, borra datos del usuario autenticado y redirecciona al login.php
//4.- Si el tiempo de inactividad no ha expirado, renueva el tiempo de inactividad (uso de time())
//IMPORTANTE: después de redireccionar con header("Location:...") no olvides hacer exit()