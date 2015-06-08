<?php
  require_once __DIR__."/../core/kernel.php";

  echo  __DIR__."/../core/kernel.php";

  class ControladorbaseTest extends PHPUnit_Framework_TestCase
  {
    public function test_mensaje_flash()
    {
      $controladorbase = New controladorbase();
      $respuesta = $controladorbase->mensaje_flash("El usuario ha sido guardado correctamente","success","inicio");
      $this->assertEquals("El usuario ha sido guardado correctamente",$respuesta, "la funcion deveria retornar true");
    }
  }

?>
