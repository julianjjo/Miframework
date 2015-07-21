<?php
  use Miframework\ControladorBase;

  class ControladorbaseTest extends PHPUnit_Framework_TestCase
  {
    public function test_mensaje_flash()
    {
      $controladorbase = New ControladorBase();
      $respuesta = $controladorbase->mensaje_flash("El usuario ha sido guardado correctamente","success","inicio");
      $this->assertEquals("El usuario ha sido guardado correctamente",$respuesta, "la funcion deveria retornar true");
    }
  }

?>
