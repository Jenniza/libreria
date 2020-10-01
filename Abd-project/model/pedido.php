<?php
class Pedido {
    private $id_pedido;
    private $id_correo;
    private $id_articulo;
    private $importe;
    private $cantidad;


    public function __construct($id_pedido, $id_correo, $id_articulo, $importe, $cantidad)
    {
        $this->id_pedido= $id_pedido;
        $this->id_correo= $id_correo;
        $this->id_articulo= $id_articulo;
        $this->importe = $importe;
        $this->cantidad = $cantidad;
    }

    public function getidPedido() {
        return $this->id_pedido;
    }

    public function setidPedido($id_pedido) {
       $this->id_pedido= $id_pedido;
    }

    public function getIdCorreo() {
        return $this->idCorreo;
    }

    public function setIdCorreo($idCorreo) {
        $this->id_correo = $idCorreo;
    }

	  public function getidArticulo() {
        return $this->id_articulo;
    }

    public function setidArticulo($id_articulo) {
       $this->id_articulo= $id_articulo;
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
    
     public static function buscaPedido($id_pedido)
    {
        $app = Conectar::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM usuario_pedidos U WHERE U.id_pedido = '%s'", $conn->real_escape_string($id_pedido));
        $rs = $conn->query($query);
        $result = false;
        if ($rs) {
            if ( $rs->num_rows == 1) {
                $fila = $rs->fetch_assoc();
                $pe = new Pedido($fila['id_pedido'], $fila['id_correo'], $fila['id_articulo'], $fila['importe'], $fila['cantidad']);
                $result = $pe;
            }
            $rs->free();
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $result;
    }
    
     public function buscaNumeroFilas(){
		$app = Conectar::getSingleton();
        $conn = $app->conexionBd();
        $sql="SELECT * FROM usuario_pedidos";  
         $consulta=$conn->query($sql); 
         $rcount=$consulta->num_rows;
        
        return $rcount;
    }
    public function buscaPedidoU($id_correo){
		$app = Conectar::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT u.id_pedido,u.id_correo, u.id_articulo,sum(u.importe)as importe,count(u.cantidad)as cantidad FROM usuario_pedidos u WHERE u.id_correo = '%s' group by u.id_articulo", $conn->real_escape_string($id_correo));
        $rs = $conn->query($query);
        $filas = array();
		 if ($rs) {
		    while ($fila = $rs->fetch_assoc()) {
			 $aux= new Pedido($fila['id_pedido'], $fila['id_correo'], $fila['id_articulo'], $fila['importe'], $fila['cantidad']);
            array_push($filas, $aux);
		}
             
         }
        return $filas;
    }
    
     public static function crea($id_pedido, $id_correo, $id_articulo, $importe, $cantidad)
    {
        $pe = self::buscaPedido($id_pedido);
        if ($pe) {
            return false;
        }
        $pe = new Pedido($id_pedido, $id_correo, $id_articulo, $importe, $cantidad);
        return self::guarda($pe);
    }
    
   public static function guarda($pe)
    {
        return self::inserta($pe);
    }
    
    private static function inserta($pe)
    {
        $app = Conectar::getSingleton();
        $conn = $app->conexionBd();
        $query=sprintf("INSERT INTO usuario_pedidos(id_pedido, id_correo, id_articulo, importe, cantidad) VALUES('%s', '%s', '%s', '%s', '%s')"
            , $conn->real_escape_string($pe->id_pedido)
            , $conn->real_escape_string($pe->id_correo)
            , $conn->real_escape_string($pe->id_articulo)
            , $conn->real_escape_string($pe->importe)
            , $conn->real_escape_string($pe->cantidad));
       if ( $conn->query($query)) {
            $pe->id = $conn->insert_id;
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $pe;
    }
    
}
?>
