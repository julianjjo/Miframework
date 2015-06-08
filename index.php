<?php
  // index.php
  error_reporting(E_ERROR | E_PARSE | E_COMPILE_ERROR);
  ini_set("display_errors", 1);
  // cambiar el tiempo de duracion de variables y cookies en php
  ini_set("session.cookie_lifetime","16400");
  ini_set("session.gc_maxlifetime","16400");
  // define la variable local del ambiente en que se encuentra solo se puede prod y test
  define('_ambiente_','prod');
  // llama el archivo nucleo de la aplicacion
  require_once __DIR__.'/core/kernel.php';
  // recibe la dirrecion a la cual se hace la peticion
  $url = $_SERVER['REQUEST_URI'];

  $peticion = New peticion($url);
  $enrutador = New enrutador($peticion);
  $controladorbase = New controladorbase($enrutador);
  $seguridad = New seguridad($controladorbase);
  // $funcion = $controladorbase->get_nombre_funcion();
  $funcion = $seguridad->get_nombre_funcion_segura();
  $controlador = New controlador($seguridad);
  if (empty($peticion->peticion_get())) {
    $controlador->$funcion();
  }
  else{
    $controlador->$funcion($peticion->peticion_get());
  }
  if ($funcion == "_estaticos") {
    $controlador->$funcion(__DIR__.$url);
  }
