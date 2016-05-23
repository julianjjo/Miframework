<?php
  namespace Miframework;

  /**
   *
   */
  class Controladorbase
  {
    public function mensajeFlash($mensaje,$tipo,$ruta)
    {
      $_SESSION["Mensaje"] = $mensaje;
      $_SESSION["Tipo"] = $tipo;
      if (_ambiente_==='prod') {
        header("Location: ".$this->rutas->get_ruta_por_nombre("mensaje_flash")."?ruta=".$ruta);
      }
      return $_SESSION["Mensaje"];
    }

    public function eliminarMensaje()
    {
      unset($_SESSION["Mensaje"]);
      unset($_SESSION["Tipo"]);
    }
  }

?>
