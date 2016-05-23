<?php
  /**
   *
   */
  class seguridad extends controladorbase
  {
    private $controladorbase;
    private $cedula;
    private $rol;
    private $modelo;
    private $ingreso;
    private $nombre_funcion_segura;

    function __construct($controladorbase)
    {
      $this->controladorbase = $controladorbase;
      if (_ambiente_==='prod') {
        session_start();
        $this->modelo = New modelo();
      }
      $this->rutas = New rutas();
      $this->get_session();
      $this->nombre_funcion_segura = "error_pagina_no_encontrada_accion";
    }

    public function get_session_cedula()
    {
      if (_ambiente_==='prod') {
        $this->get_session();
      }
      return $this->cedula;
    }

    public function get_session_rol()
    {
      if (_ambiente_==='prod') {
        $this->get_session();
      }
      if($this->rol === ""){
         $this->rol = "anonimo";
      }
      return $this->rol;
    }

    private function set_session()
    {
      if (_ambiente_==='prod') {
        $_SESSION["cedula"]=$this->cedula;
        $_SESSION["rol"]=$this->rol;
      }
    }

    private function get_session()
    {
      if (_ambiente_==='prod') {
        $this->cedula = $_SESSION["cedula"];
        $this->rol = $_SESSION["rol"];
      }
    }

    public function set_session_cedula($cedula){
      $this->cedula = $cedula;
      $this->set_session();
    }

    public function set_session_rol($rol){
      $this->rol = $rol;
      $this->set_session();
    }

    public function firewall_usuario()
    {
      $ingreso = $this->validarsession();
      $rol_session = $this->get_session_rol();
      $rol = $this->controladorbase->get_enrutador()->get_rol();
      $ruta_encontrada = $this->controladorbase->get_enrutador()->get_ruta_encontrada();
      $uri = $this->controladorbase->get_enrutador()->getUrl();

      if($rol_session === $rol && $rol_session === "anonimo" && $ingreso === false && $ruta_encontrada === true){
        $this->nombre_funcion_segura = $this->controladorbase->get_nombre_funcion();
      }
      elseif($rol_session === $rol && $ingreso === true && $ruta_encontrada === true){
        $this->nombre_funcion_segura = $this->controladorbase->get_nombre_funcion();
      }
      elseif($rol_session === "usuario" && $ruta_encontrada === true && $uri === "/"){
        if (_ambiente_==='test') {
          $this->nombre_funcion_segura = $this->rutas->get_ruta_por_nombre("buscar_ciudadano");
        }
        else{
          header('Location: '.$this->rutas->get_ruta_por_nombre("buscar_ciudadano"));
        }
      }
      elseif($rol_session === "admin" && $ruta_encontrada === true && $uri === "/"){
        if (_ambiente_==='test') {
          $this->nombre_funcion_segura = $this->rutas->get_ruta_por_nombre("admin_panel");
        }
        else{
          header('Location: '.$this->rutas->get_ruta_por_nombre("admin_panel"));
        }
      }
      elseif($ruta_encontrada === true && $uri === "/logout"){
        $this->logout();
        if (_ambiente_==='test') {
          $this->nombre_funcion_segura = $this->rutas->get_ruta_por_nombre("inicio");
        }
        else{
          header('Location: '.$this->rutas->get_ruta_por_nombre("inicio"));
        }
      }
      elseif ($ruta_encontrada === true && $rol === "anonimo") {
        $this->nombre_funcion_segura = $this->controladorbase->get_nombre_funcion();
      }

      elseif($ruta_encontrada === true){
        if (_ambiente_==='test') {
          $this->nombre_funcion_segura = "error_no_tiene_permisos_accion";
        }
        else{
          if ($rol_session != $rol && $rol_session != "anonimo") {
            $this->nombre_funcion_segura = "error_no_tiene_permisos_accion";
          }
          else{
            header('Location: '.$this->rutas->get_ruta_por_nombre("inicio"));
          }
        }
      }
      elseif($ruta_encontrada === false){

        $this->nombre_funcion_segura = "error_pagina_no_encontrada_accion";
      }
    }

    public function get_nombre_funcion_segura()
    {
      $this->firewall_usuario();
      return $this->nombre_funcion_segura;
    }

    public function validarsession(){
      if (_ambiente_==='test') {
        if ($this->cedula!='') {
          $cedula = "12345";
          if ($this->cedula===$cedula) {
            return true;
          }
          return false;
        }
        return false;
      }
      else{
        if ($this->cedula!='') {
          $usuario = $this->modelo->buscar_usuario_por_cedula($this->cedula);
          if ($this->cedula===$usuario['cedula']) {
            return true;
          }
          return false;
        }
        return false;
      }
    }

    public function logout()
    {
      session_unset();
      session_destroy();
    }
  }
