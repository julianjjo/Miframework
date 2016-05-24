<?php

  class RutasTest extends PHPUnit_Framework_TestCase
  {
    public function testGetRutaPorNombreInicio()
    {
      $rutas = New rutas();
      $respuesta = $rutas->getRutas();
      $this->assertEquals("/caracterizacion_usuarios/",$respuesta, "deberia responder /");
    }
    public function testGetRutaPorNombreLogin()
    {
      $rutas = New rutas();
      $respuesta = $rutas->get_ruta_por_nombre("login");
      $this->assertEquals("/caracterizacion_usuarios/login",$respuesta, "deberia responder /");
    }

  }

?>
