<?php
    require_once "modelo/entrada.php";
    require_once "modelo/conexion.php";
    require_once "modelo/repositorioentradas.php";
    require_once "plantillas/cabecera.php";
    require_once "plantillas/pie.php";

    $conexion=new Conexion();
    $repositorioEntradas=new RepositorioEntradas($conexion->getConexion());

    $cabecera=new Cabecera("Detalle artículo"); //Aún no muestro el titulo, después pongo el de la entrada
    $pie=new Pie("");     

    //Ahora recupero la entrada de la BBDD y las muestro
    if(isset($_GET["id"])){
        $id=$_GET["id"];
        $entrada=$repositorioEntradas->getEntrada($id);
        /*
        $cabecera->titulo=$entrada->titulo;
        $cabecera->mostrarConMenu();   
        */
        $entrada->mostrar();
    }else{
        $cabecera->mostrarConMenu();
        echo "No ha seleccionado entrada";
    }
    
    $pie->mostrar();
?>