<?php

 class CelularesModel
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

     public function insertarCelular( $compania,$telefono,$numcuenta,$razon_social,$empleado_id)
			{
			  	
				$compania= htmlspecialchars($compania);
				$telefono= htmlspecialchars($telefono);
				
				
				
				$numcuenta= htmlspecialchars($numcuenta);
				$razon_social= htmlspecialchars($razon_social);
			
				$empleado_id= htmlspecialchars($empleado_id);
				
				
				
				
				$sql = "insert into telefonos (compania,telefono,numcuenta,razon_social,empleado_id )
				values('".$compania."','".$telefono."','".$numcuenta."','".$razon_social."','".$empleado_id."')";
				
				$result = mysql_query($sql, $this->conexion) or die(mysql_error());

         		return $result;
			  }


	 

	
	 
	public function editarTelefono($id,$compania,$telefono,$numcuenta,$razon_social,$empleado_id)
	{
	 	$compania= htmlspecialchars($compania);
		$telefono= htmlspecialchars($telefono);
		$numcuenta= htmlspecialchars($numcuenta);
		$razon_social= htmlspecialchars($razon_social);
		$empleado_id= htmlspecialchars($empleado_id);
		

		$sql="Update set telefonos compania=".$compania.",telefono=".$telefono.",numcuenta=".$numcuenta.",razon_social=".$razon_social.",empleado_id=".$empleado_id." where id=".$id;
		$result = mysql_query($sql, $this->conexion) or die(mysql_error());
        return $result;
	}


	public function dameTelefonos() // ajustar a postgress
	{
	 $sql = "select * from telefonos ";

	 $result = mysql_query($sql, $this->conexion);
	 $telefonos = array();
	 if($result){
	 	while ($row = mysql_fetch_assoc($result))
	 	{
	     $telefonos[] = $row;
	 	}

	 }
	 return $telefonos;
	}
	//porsi las dudas
	public function dameTelefonosActivos() // ajustar a postgress
	{
	 $sql = "select * from telefonos where status=1 ";

	 $result = mysql_query($sql, $this->conexion);
	 $telefonos = array();
	 if($result){
	 	while ($row = mysql_fetch_assoc($result))
	 	{
	     $telefonos[] = $row;
	 	}

	 }
	 return $telefonos;
	}
	//porsi las dudas
	public function dameTelefonosInactivos() // ajustar a postgress
	{
	 $sql = "select * from telefonos where status <>1 ";

	 $result = mysql_query($sql, $this->conexion);
	 $telefonos = array();
	 if($result){
	 	while ($row = mysql_fetch_assoc($result))
	 	{
	     $telefonos[] = $row;
	 	}

	 }
	 return $telefonos;
	}

	public function buscarPorNumero($numero)
	{
	 $numero = htmlspecialchars($numero);

	 $sql = "select * from telefonos where telefono like '" . $numero . "'desc";

	 $result = mysql_query($sql, $this->conexion);

	 $telefonos = array();
	 while ($row = mysql_fetch_assoc($result))
	 {
	     $telefonos[] = $row;
	 }

	 return $telefonos;
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

	public function dameAutomovil($id)
	{
		$id = htmlspecialchars($id);

		$sql = "select * from telefonos where tel_id=".$id;

		$result = mysql_query($sql, $this->conexion);

		//$Automoviles = array();
		$row = mysql_fetch_assoc($result);

		return $row;

	}

	public function validarDatos($compania,$telefono,$numcuenta,$razon_social)
	{
	 	return (is_string($compania) &
	 		is_string($telefono) &
	         is_string($numcuenta) &
			 is_string($razon_social) 
			 );
	}

 }

 ?>