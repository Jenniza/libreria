<?php
require_once "vendor/autoload.php";
class Musica {
    private $_id;
    private $id_articulo;
    private $nombre;
    private $autor;
    private $importe;
    private $cantidad;

    public function __construct($_id, $id_articulo, $nombre, $autor, $importe, $cantidad)
    {
        $this->_id= $_id;
        $this->id_articulo = $id_articulo;
        $this->nombre = $nombre;
        $this->autor = $autor;
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
    
    
    
     public static function buscaMusica($nombre)
    {
        $conexion=new MongoDB\Client("mongodb://localhost:27017");
        $bd=$conexion->shop;
        $tabla=$bd->musica;
        $consulta=array("nombre"=>$nombre);
        $rs=$tabla->findOne($consulta);
        $mus=new Musica($rs["_id"],$rs["id_articulo"], $rs["nombre"], $rs["autor"], $rs["importe"], $rs["cantidad"]);
        return $mus;
    }
    
     public static function buscaMusicaId($id)
    {
        $conexion=new MongoDB\Client("mongodb://localhost:27017");
        $bd=$conexion->shop;
        $tabla=$bd->musica;
        $consulta=array("id_articulo"=>$id);
        $rs=$tabla->findOne($consulta);
        $mus=new Musica($rs["_id"],$rs["id_articulo"], $rs["nombre"], $rs["autor"], $rs["importe"], $rs["cantidad"]);
        return $mus;
    }
    
     public static function crea($_id, $id_articulo, $nombre, $autor, $importe, $cantidad)
    {
        $mus = self::buscaMusica($nombreUsuario);
        if ($mus) {
            return false;
        }
        $mus = new Musica($_id, $id_articulo, $nombre, $autor, $tipo, $importe, $cantidad);
        return self::guarda($mus);
    }
    
   public static function guarda($mus)
    {
        return self::inserta($mus);
    }
    
   private static function inserta($mus)
    {
        $con=new MongoDB\Client("mongodb://localhost:27017");
        $bd=$conexion->shop;
        $tabla=$bd->musica;
        $obj =array("_id"=>$mus->getId(),"id_articulo"=>$mus->getIdar(),"nombre"=>$mus->getNombre(),"autor"=>$mus->getAutor(),"importe"=>$mus->getImporte,"cantidad"=>$mus->getCantidad());
        $res=$tabla->insertOne($obj);
    }
    
}
?>
