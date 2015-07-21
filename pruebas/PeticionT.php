<?php
  require __DIR__ . '/../../vendor/autoload.php';

  class PeticionTest extends PHPUnit_Framework_TestCase
  {
    private $url;

    public function setUp()
    {
      $this->url = "/caracterizacion_usuarios/usuario/registro";
    }

    public function test_ruta_no_encontrada()
    {
      $url = "/caracterizacion_usuarios/admin/usuario?id=1";
      $peticion = New peticion($url);
      $respuesta = $peticion->buscar_ruta();
      $this->assertFalse($respuesta, "esta ruta no deberia encontrarla");
    }

    public function test_ruta_encontrada()
    {
      $peticion = New peticion($this->url);
      $respuesta = $peticion->buscar_ruta();
      $this->assertTrue($respuesta, "esta ruta deberia encontrarla");
    }

    public function test_get_rol_anonimo()
    {
      $url = "/caracterizacion_usuarios/";
      $peticion = New peticion($url);
      $respuesta = $peticion->getRol();
      $this->assertEquals("anonimo", $respuesta, "deberia tener rol anonimo");
    }

    public function test_get_rol_usuario()
    {
      $url = "/caracterizacion_usuarios/usuario/registro";
      $peticion = New peticion($url);
      $respuesta = $peticion->getRol();
      $this->assertEquals("usuario", $respuesta, "deberia tener rol usuario");
    }

    public function test_get_rol_admin()
    {
      $url = "/caracterizacion_usuarios/admin";
      $peticion = New peticion($url);
      $respuesta = $peticion->getRol();
      $this->assertEquals("admin", $respuesta, "deberia tener rol admin");
    }

    public function test_peticion_get_1()
    {
      $url = "/caracterizacion_usuarios/admin/usuario?id=1&funciona=si";
      $peticion = New peticion($url);
      $respuesta = $peticion->peticion_get();
      $get = array(
          "id" => "1",
          "funciona" => "si",
      );
      $this->assertEquals($get, $respuesta, "deberia responder un arreglo con la peticion get id=1 funciona=si");
    }

    public function test_peticion_get_2()
    {
      $url = "/caracterizacion_usuarios/admin/usuario?id=2&funciona=no";
      $peticion = New peticion($url);
      $respuesta = $peticion->peticion_get();
      $get = array(
          "id" => "2",
          "funciona" => "no",
      );
      $this->assertEquals($get, $respuesta, "deberia responder un arreglo con la peticion get id=2 funciona=no");
    }

    public function test_peticion_get_3()
    {
      $url = "/caracterizacion_usuarios/admin/usuario?funciona=si";
      $peticion = New peticion($url);
      $respuesta = $peticion->peticion_get();
      $get = array(
          "funciona" => "si",
      );
      $this->assertEquals($get, $respuesta, "deberia responder un arreglo con la peticion get funciona=si");
    }

    public function test_peticion_get_sin_datos()
    {
      $url = "/caracterizacion_usuarios/admin/usuario";
      $peticion = New peticion($url);
      $respuesta = $peticion->peticion_get();
      $get = array();
      $this->assertEquals($get, $respuesta, "deberia responder un arreglo vacio");
    }
  }
?>
