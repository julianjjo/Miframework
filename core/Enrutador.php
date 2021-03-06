<?php
  namespace Miframework;

  trait Enrutador
  {
    private $ruta_encontrada;
    private $nombre_ruta;
    private $rol;
    private $url;

    function __construct()
    {
      $this->ruta_encontrada = false;
      $this->rol = "anonimo";
      $this->funcion_controlador = "null";
    }

    public function buscarRuta()
    {
      $url = $this->getUrl();
      $rutas = new Ruta();
      foreach ($rutas->getRutas() as $clave => $valor){
        foreach ($valor as $clave1 => $valor1){
          if($clave1==="path"&&$valor1===$url){
            $this->nombre_ruta = $clave;
            $this->ruta_encontrada = true;
          }
          elseif($clave1==="rol"&&$this->ruta_encontrada===true){
            $this->rol=$valor1;
            break;
          }
        }
        if($this->ruta_encontrada===true){
          break;
        }
      }
      return $this->ruta_encontrada;
    }

    public function getRol()
    {
      $this->buscarRuta();
      return $this->rol;
    }

    public function getRutaEncontrada()
    {
      return $this->ruta_encontrada;
    }

    protected function getNombreRuta(){
      $this->buscarRuta();
      return $this->nombre_ruta;
    }

    abstract function getUrl();
  }
?>
