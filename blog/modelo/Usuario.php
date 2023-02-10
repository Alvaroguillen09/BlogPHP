<?php
class Usuario {
        
        public $id;
        public $nombre;
        public $email;
        public $categoria;
        public $password;

        //Métodos
        public function __construct(){            
        }    

        public function setPropiedades($id, $nombre, $email, $categoria, $password){
            $this->id = $id;
            $this->nombre = $nombre;
            $this->email = $email;
            $this->categoria=$categoria;
            $this->password=$password;
        }    

        public function mostrar(){
            echo "<p>" . $this->nombre . "</p>";
            echo "<p>" . $this->id . "</p>";
            echo "<p>" . $this->categoria . "</p>";
            echo "<p>" . $this->email . "</p>";
            echo "<p>" . $this->password . "</p>";
        }

        public function mostrarMini(){
            $id=$this->id;
            echo "<h2><a href='detalleusuario.php?id=$id'>" . $this->nombre . "</a></h2>";  
            echo "<p>" . substr($this->email, 0, 50) . "</p>";
        }

        public function mostrarCrud(){
            echo "<td>" . $this->id . "</td>";
            echo "<td>" . $this->nombre . "</td>";            
            echo "<td>" . $this->email . "</td>";
            echo "<td>" . $this->categoria . "</td>";
            echo "<td>" . $this->password . "</td>";
        }

    }
?>