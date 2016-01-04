<?php

 class MarcaModel
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

    public function insertarMarca($nombre)
	{
	  	
		$nombre= htmlspecialchars($nombre);

		$sql = "insert into iron_man.marcas (nombre)
		values('".$nombre."')";
		
		$result = mysql_query($sql, $this->conexion) or die(mysql_error());

 		return $result;
	}


	 

	
	 
	public function editarMarca($id,$nombre)
	{
	 	$nombre= htmlspecialchars($nombre);		

		$sql="Update set iron_man.marcas nombre=".$nombre." where id=".$id;
		$result = mysql_query($sql, $this->conexion) or die(mysql_error());
        return $result;
	}


	public function dameMarcas() // ajustar a postgress
	{
	 $sql = "select * from iron_man.marcas ";

	 $result = mysql_query($sql, $this->conexion);
	 $marcas = array();
	 if($result){
	 	while ($row = mysql_fetch_assoc($result))
	 	{
	     $marcas[] = $row;
	 	}

	 }
	 return $marcas;
	}
	//porsi las dudas
	public function damemarcasActivos() // ajustar a postgress
	{
	 $sql = "select * from iron_man.marcas where status=1 ";

	 $result = mysql_query($sql, $this->conexion);
	 $marcas = array();
	 if($result){
	 	while ($row = mysql_fetch_assoc($result))
	 	{
	     $marcas[] = $row;
	 	}

	 }
	 return $marcas;
	}
	//porsi las dudas
	public function dameTelefonosInactivos() // ajustar a postgress
	{
	 $sql = "select * from iron_man.marcas where status <>1 ";

	 $result = mysql_query($sql, $this->conexion);
	 $marcas = array();
	 if($result){
	 	while ($row = mysql_fetch_assoc($result))
	 	{
	     $marcas[] = $row;
	 	}

	 }
	 return $marcas;
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

	public function dameMarca($id)
	{
		$id = htmlspecialchars($id);

		$sql = "select * from iron_man.marcas where marca_id=".$id;

		$result = mysql_query($sql, $this->conexion);

		//$Automoviles = array();
		$row = mysql_fetch_assoc($result);

		return $row;

	}

	public function validarDatos($nombre)
	{
	 	return (is_string($nombre));
	}

 }

 ?>