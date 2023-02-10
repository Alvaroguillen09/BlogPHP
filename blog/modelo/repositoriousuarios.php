<?php
    class RepositorioUsuarios {
        public $conexion;

        public function __construct($conexion){
            $this->conexion=$conexion;
            
            $consulta="CREATE TABLE IF NOT EXISTS usuarios (
                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                nombre VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL UNIQUE,
                categoria VARCHAR(255) NOT NULL,
                password VARCHAR(255) NOT NULL
            );";
            $conexion->query($consulta);
        }

        public function listarTodosLosUsuarios(){
            $usuarios=[];
            $consulta="SELECT * FROM usuarios";
            $resultado=$this->conexion->query($consulta);    
            while($elemento=$resultado->fetch_object()){            
                $aux=new Usuario();
                $aux->setPropiedades($elemento->id, $elemento->nombre, $elemento->email, $elemento->categoria, $elemento->password);
                $usuarios[]=$aux;
            }

            return $usuarios;
        }

        public function getUsuario($id){            
            $consulta="SELECT * FROM usuarios where id=$id";
            $resultado=$this->conexion->query($consulta);    
            if($elemento=$resultado->fetch_object()){            
                $aux=new Usuario();
                $aux->setPropiedades($elemento->id, $elemento->nombre, $elemento->email, $elemento->categoria, $elemento->password);
            }
            return $aux;
        }

        public function existeUsuario($Paramemail, $Parampassword){
            $sentencia = $this->conexion->prepare("SELECT * FROM usuarios WHERE email=? AND password=?");            
            $sentencia->bind_param('ss', $email, $password);

            $email = $Paramemail;
            $password = $Parampassword;
            $sentencia->execute();
            $resultado=$sentencia->get_result();
            if($elemento=$resultado->fetch_object()){
                $usuario=new Usuario();                
                $usuario->setPropiedades($elemento->id, $elemento->nombre, $elemento->email, $elemento->categoria, $elemento->password);
                $aux=$usuario;
            }else{
                $aux=false;
            }
            return $aux;
        }

        public function insertarUsuario($usuario){
            $sentencia = $this->conexion->prepare("INSERT INTO usuarios (nombre, email, categoria, password) VALUES (?, ?, ?, ?)");            
            $sentencia->bind_param('ssss', $nombre, $email, $categoria, $password);

            $nombre = $usuario->nombre;
            $email = $usuario->email;
            $categoria = $usuario->categoria;
            $password = $usuario->password;

            // insertar una fila            
            $sentencia->execute();
        }

        public function editarUsuario($usuario){
            $sentencia=$this->conexion->prepare("UPDATE usuarios SET nombre=?, email=?, categoria=?, password=? WHERE id=?");

            $sentencia->bind_param('ssssi', $nombre, $email, $categoria, $password, $id);

            $nombre = $usuario->nombre;
            $email = $usuario->email;
            $categoria = $usuario->categoria;
            $password = $usuario->imagen;
            $id=$usuario->id;

            $sentencia->execute();
        }
        public function borrarUsuario($usuario){
            $sentencia=$this->conexion->prepare("DELETE FROM usuarios WHERE id=?");
            $sentencia->bind_param('i', $id);
            $id=$usuario->id;

            $sentencia->execute();
        }

    }   
?>