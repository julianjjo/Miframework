<?php
  use Miframework\Ruta;

  class RutasTest extends PHPUnit_Framework_TestCase
  {
    public function testGetRutaPorNombreLogin()
    {
      $rutas = New Ruta();
      $respuesta = $rutas->getRutaPorNombre("login");
      $this->assertEquals("/login",$respuesta, "deberia responder /login");
    }

  }

?>
