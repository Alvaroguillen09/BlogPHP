<?php
class Entrada {
        
        public $id;
        public $titulo;
        public $fecha;
        public $contenido;
        public $imagen;

        //Métodos
        public function __construct(){            
        }    

        public function setPropiedades($id, $titulo, $contenido, $fecha, $imagen){
            $this->id = $id;
            $this->titulo = $titulo;
            $this->contenido = $contenido;
            $this->fecha=$fecha;
            $this->imagen=$imagen;
        }    

        public function mostrar(){
            /*
            echo "<h1>" . $this->titulo . "</h1>";
            echo "<img src='img/" . $this->imagen . "' class='img-fluid'>";
            echo "<h5>" . $this->fecha . "</h5>";
            echo "<p>" . $this->contenido . "</p>";
            */

        echo "<link rel='stylesheet' href='style.css'>";
        echo '<div class="containerr">';
        echo '<div class="front side">';
        echo '<div class="content">';
        echo "<h1>" . $this->titulo . "</h1>";
        echo "<p>" . $this->contenido . "<br>" . $this->fecha . "</p>";
        echo '</div>';
        echo "<img src='img/" . $this->imagen . "' class='img-fluid'  height='200'>";
        echo "<br>";
        echo "<a href='index.php'>Volver</a>";
        echo '</div>';
        echo '<div class="back side">';
        echo '<div class="content">';
        echo '<h1>Contacto</h1>';
        echo '<form>';
        echo '<label>Nombre :</label>';
        echo '<input type="text" placeholder="Álvaro Guillén">';
        echo '<label>E-mail :</label>';
        echo '<input type="text" placeholder="Example@mail.com">';
        echo '<label>Mensaje :</label>';
        echo '<textarea placeholder="Escribe aquí un mensaje"></textarea>';
        echo '<input type="submit" value="Hecho">';
        echo "<a href='index.php'>Volver</a>";
        echo '</form>';
        echo '</div>';
        echo '</div>';
        echo '</div>';


            
        }

        public function mostrarMini(){
            $id=$this->id;
            echo "<h2><a href='detalle.php?id=$id'>" . $this->titulo . "</a></h2>";  
            echo "<td><img src='img/" . $this->imagen . "'style='height:200px' class='img-fluid'></td>";          
            echo "<p>" . substr($this->contenido, 0, 50) . "</p>";
        }

        public function mostrarCrud(){
            echo "<td>" . $this->id . "</td>";
            echo "<td>" . $this->titulo . "</td>";            
            echo "<td>" . substr($this->contenido, 0, 20) . "</td>";
            echo "<td>" . $this->fecha . "</td>";
            echo "<td><img src='../img/" . $this->imagen . "'style='height:80px' class='img-fluid'></td>";
        }

    }
?>