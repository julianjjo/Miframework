<?php
  require_once __DIR__."/../core/kernel.php";

  class RutasTest extends PHPUnit_Framework_TestCase
  {
    public function test_get_ruta_por_nombre_inicio()
    {
      $rutas = New rutas();
      $respuesta = $rutas->get_ruta_por_nombre("inicio");
      $this->assertEquals("/caracterizacion_usuarios/",$respuesta, "deberia responder /");
    }
    public function test_get_ruta_por_nombre_login()
    {
      $rutas = New rutas();
      $respuesta = $rutas->get_ruta_por_nombre("login");
      $this->assertEquals("/caracterizacion_usuarios/login",$respuesta, "deberia responder /");
    }

  }

?>
