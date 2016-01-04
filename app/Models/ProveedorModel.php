<?php

 class ProveedorModel
 {
    protected $conexion;

    public function __construct($dbname,$dbuser,$dbpass,$dbhost){
		 //$mvc_bd_conexion = pg_connect("host=localhost dbname=rh_dm user=PHP password=php_dev")
    	//or die('No se ha podido conectar: ' . pg_last_error());
		$mvc_bd_conexion = mysql_connect($dbhost, $dbuser, $dbpass);

		if (!$mvc_bd_conexion) {
			die('No ha sido posible realizar la conexión con la base de datos: ' . mysql_error());
		}
		mysql_select_db($dbname, $mvc_bd_conexion);

		mysql_set_charset('utf8');

		$this->conexion = $mvc_bd_conexion;
    }



	public function bd_conexion() //coneccion a la base de datos
	{

	}

     public function insertarProveedor($equipo_new)
			{
			  	extract($equipo_new);
				
				$sql = "insert into proveedor (nombre,razon_social,rfc,banco,no_cta,no_trans )
				values('".$nombre."','".$razon_social."','".$rfc."','".$banco."','".$no_cta."','".$no_trans."')";
				
				$result = mysql_query($sql, $this->conexion) or die(mysql_error());

         		return $result;
			}


	 

	
	 
	public function editarProveedor($equipo_new)
	{
	 	extract($equipo_new);
		

		$sql="Update proveedor set nombre='".$nombre."',razon_social='".$razon_social."',rfc='".$rfc."',banco='".$banco."',no_cta='".$no_cta."',no_trans='".$no_trans."' where id_proveedor=".$id_proveedor;
		$result = mysql_query($sql, $this->conexion) or die(mysql_error());
        return $result;
	}


	public function dameProveedores() // ajustar a postgress
	{
	 $sql = "select * from iron_man.proveedor ";

	 $result = mysql_query($sql, $this->conexion);
	 $proveedor = array();
		if($result){
		 	while ($row = mysql_fetch_assoc($result))
		 	{
		     $proveedor[] = $row;
		 	}
		}
		return $proveedor;
	}
	public function dameProveedor($id) // ajustar a postgress
	{
	 $sql = "select * from iron_man.proveedor where id_proveedor=".$id;

	 $result = mysql_query($sql, $this->conexion);
	 $proveedor = array();
		if($result){
		 	while ($row = mysql_fetch_assoc($result))
		 	{
		     $proveedor[] = $row;
		 	}
		}
		return $proveedor;
	}

	//porsi las dudas
	public function dameProveedoresActivos() // ajustar a postgress
	{
	 $sql = "select * from iron_man.proveedor where status=1 ";

	 $result = mysql_query($sql, $this->conexion);
	 $proveedor = array();
	 if($result){
	 	while ($row = mysql_fetch_assoc($result))
	 	{
	     $proveedor[] = $row;
	 	}

	 }
	 return $proveedor;
	}
	//porsi las dudas
	public function dameProveedoresInactivos() // ajustar a postgress
	{
	 $sql = "select * from iron_man.proveedor where status <>1 ";

	 $result = mysql_query($sql, $this->conexion);
	 $proveedor = array();
	 if($result){
	 	while ($row = mysql_fetch_assoc($result))
	 	{
	     $proveedor[] = $row;
	 	}

	 }
	 return $proveedor;
	}

	public function buscarPorNombre($nombre)
	{
	 $nombre = htmlspecialchars($nombre);

	 $sql = "select * from iron_man.proveedor where nombre like '" . $nombre . "'desc";

	 $result = mysql_query($sql, $this->conexion);

	 $proveedor = array();
	 while ($row = mysql_fetch_assoc($result))
	 {
	     $proveedor[] = $row;
	 }

	 return $proveedor;
	}

	
	
	


	public function dameEmpleados()
	{
		$sql = "select * from empleados ";

	 $result = mysql_query($sql, $this->conexion);

	 $empleados = array();
	 while ($row = mysql_fetch_assoc($result))
	 {
	     $empleados[] = $row;
	 }
	 return $empleados;
	}

	

	public function validarDatos($equipo_new)
	{
		extract($equipo_new);

	 	return (is_string($nombre) &
	 		is_string($razon_social) &
	         is_string($rfc) &
	         is_string($no_cta) &
	         is_string($no_trans) &
			 is_string($banco) 
			 );
	}

 }

 ?>