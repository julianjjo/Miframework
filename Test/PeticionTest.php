<?php
  use Miframework\Peticion;

  class PeticionTest extends PHPUnit_Framework_TestCase
  {
    private $url;

    public function setUp()
    {
      $this->url = "/caracterizacion_usuarios/usuario/registro";
    }

    public function testRutaNoEncontrada()
    {
      $url = "/caracterizacion_usuarios/admin/usuario?id=1";
      $peticion = New Peticion($url);
      $respuesta = $peticion->buscarRuta();
      $this->assertFalse($respuesta, "esta ruta no deberia encontrarla");
    }

    public function testRutaEncontrada()
    {
      $peticion = New Peticion($this->url);
      $respuesta = $peticion->buscarRuta();
      $this->assertTrue($respuesta, "esta ruta deberia encontrarla");
    }

    public function testGetRolAnonimo()
    {
      $url = "/caracterizacion_usuarios/";
      $peticion = New Peticion($url);
      $respuesta = $peticion->getRol();
      $this->assertEquals("anonimo", $respuesta, "deberia tener rol anonimo");
    }

    public function testGetRolUsuario()
    {
      $url = "/caracterizacion_usuarios/usuario/registro";
      $peticion = New Peticion($url);
      $respuesta = $peticion->getRol();
      $this->assertEquals("usuario", $respuesta, "deberia tener rol usuario");
    }

    public function testGetRolAdmin()
    {
      $url = "/caracterizacion_usuarios/admin";
      $peticion = New Peticion($url);
      $respuesta = $peticion->getRol();
      $this->assertEquals("admin", $respuesta, "deberia tener rol admin");
    }

    public function testPeticionGet1()
    {
      $url = "/caracterizacion_usuarios/admin/usuario?id=1&funciona=si";
      $peticion = New Peticion($url);
      $respuesta = $peticion->peticionGet();
      $get = array(
          "id" => "1",
          "funciona" => "si",
      );
      $this->assertEquals($get, $respuesta, "deberia responder un arreglo con la peticion get id=1 funciona=si");
    }

    public function testPeticionGet2()
    {
      $url = "/caracterizacion_usuarios/admin/usuario?id=2&funciona=no";
      $peticion = New Peticion($url);
      $respuesta = $peticion->peticionGet();
      $get = array(
          "id" => "2",
          "funciona" => "no",
      );
      $this->assertEquals($get, $respuesta, "deberia responder un arreglo con la peticion get id=2 funciona=no");
    }

    public function testPeticionGet3()
    {
      $url = "/caracterizacion_usuarios/admin/usuario?funciona=si";
      $peticion = New Peticion($url);
      $respuesta = $peticion->peticionGet();
      $get = array(
          "funciona" => "si",
      );
      $this->assertEquals($get, $respuesta, "deberia responder un arreglo con la peticion get funciona=si");
    }

    public function testPeticionGetSinDatos()
    {
      $url = "/caracterizacion_usuarios/admin/usuario";
      $peticion = New Peticion($url);
      $respuesta = $peticion->peticionGet();
      $get = array();
      $this->assertEquals($get, $respuesta, "deberia responder un arreglo vacio");
    }
  }
?>
