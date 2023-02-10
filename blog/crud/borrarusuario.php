<?php
    require_once "../modelo/Usuario.php";
    require_once "../modelo/conexion.php";   
    require_once "../modelo/repositoriousuarios.php";

              
    $conexion=new Conexion();
    $repositorioUsuarios=new RepositorioUsuarios($conexion->getConexion());
    if (isset($_GET['id'])) { 
    $usuario=new Usuario();
    $usuario->id=$_GET["id"];
    $repositorioUsuarios->borrarUsuario($usuario); 
    header("Status: 301 Moved Permanently");
    header("Location: crudusuarios.php");     
    }
    
?>