<?php
session_start();
    require_once "../modelo/Usuario.php";
    require_once "../modelo/conexion.php";
    require_once "../modelo/repositoriousuarios.php";
    require_once "../plantillas/cabecera.php";
    require_once "../plantillas/pie.php";

        if(isset($_SESSION["usuario"])){
            $usuario=unserialize($_SESSION["usuario"]);
            if($usuario->categoria!="Administrador"){
                header("status: 301 Moved Permanently");
                header("location: /blog/index.php");
                exit;
            }
    }

    //Creo el objeto Conexion y lo conecto a la BD
    $conexion=new Conexion();
    //Creo el objeto con el que voy a guardar/leer/borrar datos de la tabla de Entradas
    $repositorioUsuarios=new RepositorioUsuarios($conexion->getConexion());
    //Creo una cabecera y un pie de página
    $cabecera=new Cabecera("CRUD de entradas");
    $pie=new Pie("");   
    

    $cabecera->mostrarConMenuCRUD();
    echo "<h1>CRUD Usuarios</h1>";
    echo "<a href='altasusuarios.php' class='btn btn-primary'>Nuev usuario</a>";
    echo "<table class='table'><thead>";
    echo "<th>id</th><th>Nombre</th><th>Email</th><th>Categoria</th><th>Password</th><th>Acciones</th>";
    echo "</thead>";
    echo "<tbody>";
    //Ahora leo las entradas de la BBDD y las muestro
    $listaUsuarios=$repositorioUsuarios->listarTodosLosUsuarios();
    for($i=0; $i<count($listaUsuarios); $i++){
        $id=$listaUsuarios[$i]->id;
        echo "<tr>";
        $listaUsuarios[$i]->mostrarCrud();        
        echo "<td><a href='editarusuario.php?id=$id'>Editar</a>";
        echo "<br><form action='borrarusuario.php?id=$id' method='POST' onsubmit='return confirm(\"Seguro?\")'><input type='submit' value='Borrar'></form></td>";        
        echo "</tr>";
    }
    echo "</tbody>";    
    $pie->mostrar();    



?>