<?php

  $rutas = array (
  "inicio" => array ( "path" => "/", "rol" => "anonimo" ),
  "login" => array ( "path" => "/login", "rol" => "anonimo" ),
  "logout" => array ( "path" => "/logout", "rol" => "anonimo" ),
  "registro" => array ( "path" => "/usuario/registro", "rol" => "usuario" ),
  "admin_panel" => array ( "path" => "/admin", "rol" => "admin" ),
  "admin_dependencias" => array ( "path" => "/admin/dependencias", "rol" => "admin" ),
  "crear_dependencia" => array ( "path" => "/admin/dependencia/crear", "rol" => "admin" ),
  "editar_dependencia" => array ( "path" => "/admin/dependencia/editar", "rol" => "admin" ),
  "admin_usuarios" => array ( "path" => "/admin/usuarios", "rol" => "admin" ),
  "crear_usuario" => array ( "path" => "/admin/usuario/crear", "rol" => "admin" ),
  "editar_usuario" => array ( "path" => "/admin/editar/usuario", "rol" => "admin" ),
  "desactivar_usuario" => array ( "path" => "/admin/desactivar/usuario", "rol" => "admin" ),
  "cambiar_contrasena" => array ( "path" => "/admin/cambiar/password/usuario", "rol" => "admin" ),
  "buscar_ciudadano" => array ( "path" => "/usuario", "rol" => "usuario" ),
  "municipios" => array ( "path" => "/usuario/municipios", "rol" => "anonimo" ),
  "editar_ciudadano" => array ( "path" => "/usuario/editar", "rol" => "usuario" ),
  "administrar_canales_de_comunicacion" => array ( "path" => "/admin/canales_comunicacion", "rol" => "admin" ),
  "editar_canal_comunicacion" => array ( "path" => "/admin/canal_comunicacion/editar", "rol" => "admin" ),
  "crear_canal_comunicacion" => array ( "path" => "/admin/canal_comunicacion/crear", "rol" => "admin" ),
  "administrar_educacion" => array ( "path" => "/admin/educacion", "rol" => "admin" ),
  "crear_educacion" => array ( "path" => "/admin/educacion/crear", "rol" => "admin" ),
  "editar_educacion" => array ( "path" => "/admin/educacion/editar", "rol" => "admin" ),
  "ciudadano_asunto" => array ( "path" => "/usuario/ciudadano_asunto", "rol" => "usuario" ),
  "admin_estado_civil" => array ( "path" => "/admin/estados_civiles", "rol" => "admin" ),
  "crear_estado_civil" => array ( "path" => "/admin/estado_civil/crear", "rol" => "admin" ),
  "editar_estado_civil" => array ( "path" => "/admin/estado_civil/editar", "rol" => "admin" ),
  "admin_estrato" => array ( "path" => "/admin/estratos", "rol" => "admin" ),
  "crear_estrato" => array ( "path" => "/admin/estrato/crear", "rol" => "admin" ),
  "editar_estrato" => array ( "path" => "/admin/estrato/editar", "rol" => "admin" ),
  "admin_frecuencia" => array ( "path" => "/admin/frecuencias", "rol" => "admin" ),
  "editar_frecuencia" => array ( "path" => "/admin/frecuencia/editar", "rol" => "admin" ),
  "crear_frecuencia" => array ( "path" => "/admin/frecuencia/crear", "rol" => "admin" ),
  "admin_ocupacion" => array ( "path" => "/admin/ocupaciones", "rol" => "admin" ),
  "crear_ocupacion" => array ( "path" => "/admin/ocupacion/crear", "rol" => "admin" ),
  "editar_ocupacion" => array ( "path" => "/admin/ocupacion/editar", "rol" => "admin" ),
  "registro_externo" => array ( "path" => "/usuarioexterno/registro", "rol" => "anonimo" ),
  "ciudadano_asunto_externo" => array ( "path" => "/usuarioexterno/dependencia_ciudadano", "rol" => "anonimo" ),
  "buscar_ciudadano_externo" => array ( "path" => "/usuarioexterno", "rol" => "anonimo" ),
  "editar_ciudadano_externo" => array ( "path" => "/usuarioexterno/editar", "rol" => "anonimo" ),
  "mensaje_flash" => array ( "path" => "/mensaje", "rol" => "anonimo" ),
  "reportes" => array ( "path" => "/admin/reportes", "rol" => "admin" ),
  "admin_reportes" => array ( "path" => "/admin/panel_reportes", "rol" => "admin" ),
  "generar_reporte" => array ( "path" => "/admin/generar/reporte", "rol" => "admin" ),
  "reporte_por_dependencia_o_fecha" => array ( "path" => "/admin/reportes_dependencia_fecha", "rol" => "admin" ),
  "generar_reporte_por_dependencia_o_fecha" => array ( "path" => "/admin/generar/reporte_dependencia_fecha", "rol" => "admin" ),
  "generar_pdf_dependencia_fecha" => array ( "path" => "/admin/generar_pdf/dependencia_fecha_pdf", "rol" => "admin" ),
  "generar_excel_dependencia_fecha" => array ( "path" => "/admin/generar_excel/dependencia_fecha_excel", "rol" => "admin" ),
  "admin_asuntos" => array ( "path" => "/admin/asuntos", "rol" => "admin" ),
  "editar_asunto" => array ( "path" => "/admin/crear/asunto", "rol" => "admin" ),
  "crear_asunto" => array ( "path" => "/admin/editar/asunto", "rol" => "admin" ),
  "asuntos_dependencia" => array ( "path" => "/usuario/dependencia/asuntos", "rol" => "anonimo" )
);


  //   public function get_ruta_por_nombre($nombre)
  //   {
  //     $rutas =  $this->rutas;
  //     foreach ($rutas as $clave => $valor){
  //       if($clave==$nombre){
  //         $this->nombre_ruta = $clave;
  //         foreach ($valor as $clave1 => $valor1){
  //           if($clave1=="path"){
  //             return "/caracterizacion_usuarios".$valor1;
  //           }
  //         }
  //       }
  //     }
  //   }


?>
