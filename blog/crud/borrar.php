<?php
    require_once "../modelo/entrada.php";
    require_once "../modelo/conexion.php";   
    require_once "../modelo/repositorioentradas.php";

              
    $conexion=new Conexion();
    $repositorioEntradas=new RepositorioEntradas($conexion->getConexion());
    if (isset($_GET['id'])) { 
    $entrada=new Entrada();
    $entrada->id=$_GET["id"];
    $repositorioEntradas->borrarEntrada($entrada); 
    header("Status: 301 Moved Permanently");
    header("Location: crud.php");     
    }
    
?>