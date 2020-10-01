<?php
class Usuario {
    private $id_correo;
	  private $password;
    private $name;
    private $admin;


    public function __construct($id_correo, $name, $password, $admin)
    {
        $this->id_correo= $id_correo;
        $this->name = $name;
        $this->password = $password;
        $this->admin = $admin;
    }

    public function isAdmin() {
        return $this->admin;
    }

    public function setAdmin($admin) {
        $this->admin = $admin;
    }

    public function getIdCorreo() {
        return $this->idCorreo;
    }

    public function setIdCorreo($idCorreo) {
        $this->id_correo = $idCorreo;
    }

	   public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = SHA1($password);
    }

    public function getNombre() {
        return $this->name;
    }

    public function setNombre($name) {
        $this->name = $name;
    }
    
     public static function buscaUsuario($nombreUsuario)
    {
        $app = Conectar::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM usuarios U WHERE U.id_correo = '%s'", $conn->real_escape_string($nombreUsuario));
        $rs = $conn->query($query);
        $result = false;
        if ($rs) {
            if ( $rs->num_rows == 1) {
                $fila = $rs->fetch_assoc();
                $user = new Usuario($fila['id_correo'], $fila['name'], $fila['password'], $fila['admin']);
                $result = $user;
            }
            $rs->free();
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $result;
    }
    public function compruebaPassword($password)
    {
        if($password==$this->password)
            return true;
        return false;
    }
    
     public static function crea($nombreUsuario, $nombre, $password, $rol)
    {
        $user = self::buscaUsuario($nombreUsuario);
        if ($user) {
            return false;
        }
        $user = new Usuario($nombreUsuario, $nombre, $password, $rol);
        return self::guarda($user);
    }
    
   public static function guarda($usuario)
    {
        return self::inserta($usuario);
    }
    
    private static function inserta($usuario)
    {
        $app = Conectar::getSingleton();
        $conn = $app->conexionBd();
        $query=sprintf("INSERT INTO Usuarios(id_correo, name, password, admin) VALUES('%s', '%s', '%s', '%s')"
            , $conn->real_escape_string($usuario->id_correo)
            , $conn->real_escape_string($usuario->name)
            , $conn->real_escape_string($usuario->password)
            , $conn->real_escape_string($usuario->admin));
        if ( $conn->query($query) ) {
            $usuario->id = $conn->insert_id;
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $usuario;
    }
    
}
?>
