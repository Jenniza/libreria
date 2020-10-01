<?php
require_once "vendor/autoload.php";
class Libro {
    private $_id;
    private $id_articulo;
    private $nombre;
    private $autor;
    private $tipo;
    private $importe;
    private $cantidad;

    public function __construct($_id, $id_articulo, $nombre, $autor, $tipo, $importe, $cantidad)
    {
        $this->_id= $_id;
        $this->id_articulo = $id_articulo;
        $this->nombre = $nombre;
        $this->autor = $autor;
        $this->tipo = $tipo;
        $this->importe = $importe;
        $this->cantidad = $cantidad;
        
    }

    public function getId() {
        return  $this->_id;
    }

    public function setId($_id) {
         $this->_id = $_id;
    }

     public function getIdar() {
        return  $this->id_articulo;
    }

    public function setIdar($id_articulo) {
         $this->id_articulo = $id_articulo;
    }

    public function getNombre() {
       return $this->nombre;
    }

    public function setNombre($nombre) {
       $this->nombre = $nombre;
    }
    
     public function getAutor() {
       return $this->autor;
    }

    public function setAutor($autor) {
       $this->autor = $autor;
    }
    
    public function getTipo() {
       return $this->tipo;
    }

    public function setTipo($tipo) {
      $this->tipo = $tipo;
    }
    
     public function getImporte() {
       return $this->importe;
    }

    public function setImporte($importe) {
        $this->importe = $importe;
        
    }
    
     public function getCantidad() {
       return $this->cantidad;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }
    
    
    
     public static function buscaLibro($nombre)
    {
        $conexion=new MongoDB\Client("mongodb://localhost:27017");
        $bd=$conexion->shop;
        $tabla=$bd->Libros;
        $consulta=array("nombre"=>$nombre);
        $rs=$tabla->findOne($consulta);
        $libro=new Libro($rs["_id"],$rs["id_articulo"], $rs["nombre"], $rs["autor"], $rs["tipo"], $rs["importe"], $rs["cantidad"]);
        return $libro;
    }
    
     public static function buscaLibroId($id)
    {
        $conexion=new MongoDB\Client("mongodb://localhost:27017");
        $bd=$conexion->shop;
        $tabla=$bd->Libros;
        $consulta=array("id_articulo"=>$id);
        $rs=$tabla->findOne($consulta);
        $libro=new Libro($rs["_id"],$rs["id_articulo"], $rs["nombre"], $rs["autor"], $rs["tipo"], $rs["importe"], $rs["cantidad"]);
        return $libro;
    }
    
     public static function crea($_id, $id_articulo, $nombre, $autor, $tipo, $importe, $cantidad)
    {
        $libro = self::buscaLibro($nombreUsuario);
        if ($libro) {
            return false;
        }
        $libro = new Libro($_id, $id_articulo, $nombre, $autor, $tipo, $importe, $cantidad);
        return self::guarda($libro);
    }
    
   public static function guarda($libro)
    {
        return self::inserta($libro);
    }
    
    private static function inserta($libro)
    {
        $con=new MongoDB\Client("mongodb://localhost:27017");
        $bd=$conexion->shop;
        $tabla=$bd->Libros;
        $obj =array("_id"=>$libro->getId(),"id_articulo"=>$libro->getIdar(),"nombre"=>$libro->getNombre(),"autor"=>$libro->getAutor(),"tipo"=>$libro->getTipo(),"importe"=>$libro->getImporte,"cantidad"=>$libro->getCantidad());
        $res=$tabla->insertOne($obj);
    }
    
}
?>
