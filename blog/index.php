<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Site</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body>
<?php
require_once "modelo/entrada.php";
require_once "modelo/conexion.php";
require_once "modelo/repositorioentradas.php";
require_once "plantillas/cabecera.php";
require_once "plantillas/pie.php";

$cabecera=new Cabecera("Página principal");
$pie=new Pie("");   

$cabecera->mostrarConMenu();
        $conexion=new mysqli("localhost", "root", "");
        if($conexion->connect_errno){
            echo "No se ha podido establecer conexion con el servidor de base de datos.<br>";
            die("Error;" . $conexion->connect_error);
        }else{
            $conexion->select_db("blog");
            $conexion->set_charset("utf8");
            $consulta=$conexion->query('SELECT * FROM entradas');    
            while($productos=$consulta->fetch_object()){  
                $id=$productos->id;
                $contenido=$productos->contenido;
                $titulo=$productos->titulo;
                $fecha=$productos->fecha;
                $imagen=$productos->imagen;
                
               echo" <div class='blog-card alt'>";
               echo"<div class='meta'>";
               echo"<div class='photo'style='background-image: url(img/" . $imagen . ")'></div>";
               echo"</div>";
               echo"<div class='description'>";
               echo"<h1>$titulo</h1>";
               echo"<h2>$fecha</h2>";
               echo"<p>" . substr($contenido,0,150) ."...". "</p>";
               echo"<p class='read-more'>";
               echo"<a href='detalle.php?id=$id'>Read More</a>";
               echo"</p>";
               echo"</div>";
               echo"</div>";
            }
        }
        ?>
</body>
</html>
