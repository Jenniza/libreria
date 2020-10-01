<?php
//require_once './config/Conectar.php';
class Pelicula {
    private $id_articulo;
    private $nombre;
    private $director;
    private $año;
    private $tipo;
    private $importe;
    private $cantidad;
    private $imagen;


    public function __construct($id_articulo, $nombre, $director, $año, $tipo, $importe, $cantidad, $imagen)
    {
        $this->id_articulo = $id_articulo;
        $this->nombre = $nombre;
        $this->director = $director;
        $this->año = $año;
        $this->tipo = $tipo;
        $this->importe = $importe;
        $this->cantidad = $cantidad;
        $this->imagen = $imagen;
    }

    public function getid_articulo() {
        return $this->id_articulo;
    }

    public function setid_articulo($id_articulo) {
        $this->id_articulo = $id_articulo;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

	   public function getDirector() {
        return $this->director;
    }

    public function setDirector($director) {
        $this->director = $director;
    }

    public function getAnio() {
        return $this->año;
    }

    public function setAnio($año) {
        $this->año = $año;
    }
     public function getImporte() {
        return  $this->importe;
    }

    public function setImporte($importe) {
        $this->importe =$importe;
    }
      public function getCantidad() {
        return  $this->cantidad;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }
    
      public function getIma() {
        return $this->imagen;
    }

    public function setIma($ima) {
        $this->imagen = $ima;
    }
    
    public static function buscaPeliID($id)
    {
        $app = Conectar::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM peliculas P WHERE P.id_articulo = '%s'", $conn->real_escape_string($id));
        $rs = $conn->query($query);
        $result = false;
        if ($rs) {
            if ( $rs->num_rows == 1) {
                $fila = $rs->fetch_assoc();
                $peli = new Pelicula($fila['id_articulo'], $fila['nombre'], $fila['director'], $fila['año'], $fila['tipo'], $fila['importe'], $fila['cantidad'], $fila['imagen']);
                $result = $peli;
            }
            $rs->free();
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $result;
    }
    
     public static function buscaPelinom($nombre)
    {
        $app = Conectar::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM peliculas P WHERE P.nombre = '%s'", $conn->real_escape_string($nombre));
        $rs = $conn->query($query);
        $result = false;
        if ($rs) {
            if ( $rs->num_rows == 1) {
                $fila = $rs->fetch_assoc();
                $peli = new Pelicula($fila['id_articulo'], $fila['nombre'], $fila['director'], $fila['año'], $fila['tipo'], $fila['importe'], $fila['cantidad'], $fila['imagen']);
                $result = $peli;
            }
            $rs->free();
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $result;
    }
    
     public static function crea($id_articulo, $nombre, $director, $año, $tipo, $importe, $cantidad)
    {
        $peli = self::buscaUsuario($nombre);
        if ($peli) {
            return false;
        }
        $peli = new Pelicula($id_articulo, $nombre, $director, $año, $tipo, $importe, $cantidad,$imagen);
        return self::guarda($peli);
    }
    
   public static function guarda($peli)
    {
        return self::inserta($peli);
    }
    public static function actualiza($peli)
    {
        $app = Conectar::getSingleton();
        $conn = $app->conexionBd();
        $query=sprintf("UPDATE peliculas SET nombre='%s', director='%s', año='%s', tipo='%s', importe='%s', cantidad='%s' WHERE id_articulo = '%s'"
            , $conn->real_escape_string($peli->nombre)
            , $conn->real_escape_string($peli->director)
            , $conn->real_escape_string($peli->año)
            , $conn->real_escape_string($peli->tipo)
            , $conn->real_escape_string($peli->importe)
            , $conn->real_escape_string($peli->cantidad)
            , $conn->real_escape_string($peli->imagen)
            , $peli->id_articulo);
        if ( $conn->query($query) ) {
            $peli->id = $conn->insert_id;
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
        }
        return $peli;
    }
    
    private static function inserta($peli)
    {
        $app = Conectar::getSingleton();
        $conn = $app->conexionBd();
        $query=sprintf("INSERT INTO peliculas(id_articulo, nombre, director, año, tipo, importe, cantidad) VALUES('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')"
            , $conn->real_escape_string($peli->id_articulo)
            , $conn->real_escape_string($peli->nombre)
            , $conn->real_escape_string($peli->director)
            , $conn->real_escape_string($peli->año)
            , $conn->real_escape_string($peli->tipo)
            , $conn->real_escape_string($peli->importe)
            , $conn->real_escape_string($peli->cantidad)
            , $conn->real_escape_string($peli->imagen));
        if ( $conn->query($query) ) {
            $peli->id = $conn->insert_id;
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $peli;
    }
    
}
?>
