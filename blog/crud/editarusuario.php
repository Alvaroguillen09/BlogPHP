<?php
    require_once "../modelo/Usuario.php";
    require_once "../modelo/conexion.php";
    require_once "../modelo/repositoriousuarios.php";
    require_once "../plantillas/cabecera.php";
    require_once "../plantillas/pie.php";
    
    $cabecera=new Cabecera("Editar usuario");    
    $pie=new Pie("");   
    
    $conexion=new Conexion();
    $repositorioUsuario=new RepositorioUsuarios($conexion->getConexion());

    if(isset($_POST["email"])){        
        $usuario=new Usuario();
        $usuario->id=$_GET["id"];
        $usuario->nombre=$_POST["nombre"];
        $usuario->email=$_POST["email"];
        $usuario->categoria=$_POST["categoria"];
        $usuario->password=$_POST["password"];
        
        $repositorioUsuario->editarUsuario($usuario);
        
        header("Status: 301 Moved Permanently");
        header("Location: crudusuarios.php");
        exit;
    }

    if(isset($_GET["id"])){        
        $id=$_GET["id"];
        $usuario=$repositorioUsuario->getUsuario($id);
        $id=$usuario->id;
        $nombre=$usuario->nombre;
        $email=$usuario->email;
        $categoria=$usuario->categoria;
        $password=$usuario->password;
    }

    $cabecera->mostrarConMenuCRUD();
    echo "<h1>Editar usuario</h1>";

    echo '<form action="" method="POST">';
    echo '<div class="form-group">';
    echo '<label for="id">Id</label>';
    echo "<input type='text' value='$id' class='form-control' id='id' name='id' disabled>";
    echo '</div>';
    echo '<div class="form-group">';
    echo '<label for="nombre">Título</label>';
    echo "<input type='text' value='$nombre' class='form-control' id='nombre' name='nombre' placeholder='Escribe el nombre'>";
    echo '</div>';
    echo '<div class="form-group">';
    echo '<label for="email">Correo electrónico</label>';
    echo "<input type='email' value='$email' class='form-control' id='email' name='email' placeholder='Escribe el email'>";
    echo '</div>';
   
    echo '<div class="form-group">';
    echo '<label for="categoria">Categoria</label>';
    echo '<select name="categoria" id="categoria" class="form-control">';
    if($categoria=="administrador"){
        echo '<option value="administrador" selected>Administrador</option>';
        echo '<option value="Plebeyo">Plebeyo</option>';
    }else{
        echo '<option value="administrador">Administrador</option>';
        echo '<option value="Plebeyo" selected>Plebeyo</option>';
    }
    echo "</select>";
    echo '</div>';
    echo '<div class="form-group">';
    echo '<label for="password">Contraseña</label>';
    echo "<input type='text' value='$password' class='form-control' id='password' name='password' placeholder='Escribe la contraseña'>";
    echo '</div>';
    
    echo '<button type="submit" class="btn btn-primary form-control">Enviar</button>';
    echo '</form>';

    echo "<br><a href='crudusuarios.php' class='btn btn-primary'>Volver</a>";

    $pie->mostrar();    
?>