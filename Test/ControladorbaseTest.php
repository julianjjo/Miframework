<?php
  use Miframework\ControladorBase;

  class ControladorbaseTest extends PHPUnit_Framework_TestCase
  {
    public function testMensajeFlash()
    {
      $controladorbase = New ControladorBase();
      $respuesta = $controladorbase->mensaje_flash("El usuario ha sido guardado correctamente","success","inicio");
      $this->assertEquals("El usuario ha sido guardado correctamente",$respuesta, "la funcion deveria retornar true");
    }
  }

?>
