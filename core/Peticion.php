<?php
  namespace Miframework;

  /**
   *
   */
  class Peticion
  {
    use Enrutador;

    function __construct($url)
    {
      $this->peticion = $url;
      $this->ruta_encontrada = false;
    }

    function getUrl()
    {
      $url = explode('?', $this->peticion);
      $uri = $url[0];
      $uri = str_replace("caracterizacion_usuarios/", "", $uri);
      return $uri;
    }



    public function peticion_get()
    {
      $url = explode('?', $this->peticion);
      if(!empty($url[1])){
        $get = $url[1];
      }
      else{
        return array();
      }
      $get_array =  explode('&', $get);
      $petcion_get_arreglo = array();
      foreach ($get_array as $valor) {
        $variables_peticion = explode('=', $valor);
        $petcion_get_arreglo[$variables_peticion[0]] = $variables_peticion[1];
      }
      return $petcion_get_arreglo;
    }
  }

?>
