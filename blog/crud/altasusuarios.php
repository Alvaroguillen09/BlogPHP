<?php
    require_once "../modelo/Usuario.php";
    require_once "../modelo/conexion.php";
    require_once "../modelo/repositoriousuarios.php";
    require_once "../plantillas/cabecera.php";
    require_once "../plantillas/pie.php";
    
    $cabecera=new Cabecera("Alta de usuarios");
    $pie=new Pie("");   
    
    if(isset($_POST["email"])){

        $conexion=new Conexion();
        $repositorioUsuarios=new RepositorioUsuarios($conexion->getConexion());
        $usuario=new Usuario();
        $usuario->nombre=$_POST["nombre"];
        $usuario->email=$_POST["email"];
        $usuario->categoria=$_POST["categoria"];
        $usuario->password=$_POST["password"];
        $repositorioUsuarios->insertarUsuario($usuario);
        echo "<p class='alert alert-success'>Registro del usuario -" . $usuario->email . "- añadido</p>";
    }

    $cabecera->mostrarConMenuCRUD();
    echo "<h1>Altas usuarios</h1>";
?>
    <form action="" method="POST">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escribe un nombre">            
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Escribe un email">
        </div>
        <div class="form-group">
            <label for="categoria">Categoria</label>
            <select class="form-control" id="categoria" name="categoria">
                <option value="Administrador">Administrador</option>
                <option value="Plebeyo" selected>Plebeyo</option>
            </select>
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="text" class="form-control" id="password" name="password" placeholder="Escribe una password">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

<?php
    $pie->mostrar();    
?>