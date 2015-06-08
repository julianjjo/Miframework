<?php
  require_once __DIR__."/../core/kernel.php";

  class SeguridadTest extends PHPUnit_Framework_TestCase
  {
    private $seguridad;

    public function setUp()
    {
      $peticion = New peticion("/caracterizacion_usuarios/admin");
      $enrutador = New enrutador($peticion);
      $controladorbase = New controladorbase($enrutador);
      $this->seguridad = New seguridad($controladorbase);
    }

    public function test_get_session_cedula()
    {
      $this->seguridad->set_session_cedula("12345");
      $respuesta = $this->seguridad->get_session_cedula();
      $this->assertEquals("12345", $respuesta, "deberia responder 12345");
    }

    public function test_get_session_rol()
    {
      $this->seguridad->set_session_rol("admin");
      $respuesta = $this->seguridad->get_session_rol();
      $this->assertEquals("admin", $respuesta, "deberia responder admin");
    }

    public function test_set_session_cedula()
    {
      $this->seguridad->set_session_cedula("123");
      $respuesta = $this->seguridad->get_session_cedula();
      $this->assertEquals("123", $respuesta, "deberia responder 123");
    }

    public function test_set_session_rol()
    {
      $this->seguridad->set_session_rol("usuario");
      $respuesta = $this->seguridad->get_session_rol();
      $this->assertEquals("usuario", $respuesta, "deberia responder usuario");
    }

    public function test_get_nombre_funcion_segura_admin()
    {
      $this->seguridad->set_session_cedula("12345");
      $this->seguridad->set_session_rol("admin");
      $respuesta = $this->seguridad->get_nombre_funcion_segura();
      $this->assertEquals("admin_panel_accion", $respuesta, "deberia responder admin_panel_accion");
    }

    public function test_get_nombre_funcion_segura_anonimo()
    {
      $peticion = New peticion("/caracterizacion_usuarios/");
      $enrutador = New enrutador($peticion);
      $controladorbase = New controladorbase($enrutador);
      $this->seguridad = New seguridad($controladorbase);
      $this->seguridad->set_session_cedula("");
      $this->seguridad->set_session_rol("anonimo");
      $respuesta = $this->seguridad->get_nombre_funcion_segura();
      $this->assertEquals("inicio_accion", $respuesta, "deberia responder inicio_accion");
    }

    public function test_get_nombre_funcion_segura_usuario()
    {
      $peticion = New peticion("/caracterizacion_usuarios/usuario/registro");
      $enrutador = New enrutador($peticion);
      $controladorbase = New controladorbase($enrutador);
      $this->seguridad = New seguridad($controladorbase);
      $this->seguridad->set_session_cedula("12345");
      $this->seguridad->set_session_rol("usuario");
      $respuesta = $this->seguridad->get_nombre_funcion_segura();
      $this->assertEquals("registro_accion", $respuesta, "deberia responder registro_accion");
    }

    public function test_get_nombre_funcion_segura_usuario_pagina_inicio()
    {
      $peticion = New peticion("/caracterizacion_usuarios/");
      $enrutador = New enrutador($peticion);
      $controladorbase = New controladorbase($enrutador);
      $this->seguridad = New seguridad($controladorbase);
      $this->seguridad->set_session_cedula("12345");
      $this->seguridad->set_session_rol("usuario");
      $respuesta = $this->seguridad->get_nombre_funcion_segura();
      $this->assertEquals("/caracterizacion_usuarios/usuario", $respuesta, "deberia responder /caracterizacion_usuarios/usuario");
    }

    public function test_get_nombre_funcion_segura_admin_pagina_inicio()
    {
      $peticion = New peticion("/caracterizacion_usuarios/");
      $enrutador = New enrutador($peticion);
      $controladorbase = New controladorbase($enrutador);
      $this->seguridad = New seguridad($controladorbase);
      $this->seguridad->set_session_cedula("12345");
      $this->seguridad->set_session_rol("admin");
      $respuesta = $this->seguridad->get_nombre_funcion_segura();
      $this->assertEquals("/caracterizacion_usuarios/admin", $respuesta, "deberia responder /caracterizacion_usuarios/admin");
    }

    public function test_get_nombre_funcion_segura_logout()
    {
      $peticion = New peticion("/caracterizacion_usuarios/logout");
      $enrutador = New enrutador($peticion);
      $controladorbase = New controladorbase($enrutador);
      $this->seguridad = New seguridad($controladorbase);
      $this->seguridad->set_session_cedula("");
      $this->seguridad->set_session_rol("");
      $respuesta = $this->seguridad->get_nombre_funcion_segura();
      $this->assertEquals("logout_accion", $respuesta, "deberia responder registro_accion");
    }

    public function test_get_nombre_funcion_sin_permisos()
    {
      $peticion = New peticion("/caracterizacion_usuarios/admin");
      $enrutador = New enrutador($peticion);
      $controladorbase = New controladorbase($enrutador);
      $this->seguridad = New seguridad($controladorbase);
      $this->seguridad->set_session_cedula("");
      $this->seguridad->set_session_rol("usuario");
      $respuesta = $this->seguridad->get_nombre_funcion_segura();
      $this->assertEquals("error_no_tiene_permisos_accion", $respuesta, "deberia responder registro_accion");
    }

    public function test_get_nombre_funcion_ruta_no_encontrada()
    {
      $peticion = New peticion("/caracterizacion_usuarios/local");
      $enrutador = New enrutador($peticion);
      $controladorbase = New controladorbase($enrutador);
      $this->seguridad = New seguridad($controladorbase);
      $this->seguridad->set_session_cedula("12345");
      $this->seguridad->set_session_rol("admin");
      $respuesta = $this->seguridad->get_nombre_funcion_segura();
      $this->assertEquals('error_pagina_no_encontrada_accion', $respuesta, "deberia responder registro_accion");
    }
  }
