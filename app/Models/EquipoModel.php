<?php

 class EquipoModel
 {
    protected $conexion_iron_man;

    public function __construct($dbname,$dbuser,$dbpass,$dbhost){
		 //$mvc_bd_conexion = pg_connect("host=localhost dbname=rh_dm user=PHP password=php_dev")
    	//or die('No se ha podido conectar: ' . pg_last_error());
		$mvc_bd_conexion = mysql_connect($dbhost, $dbuser, $dbpass);

		if (!$mvc_bd_conexion) {
			die('No ha sido posible realizar la conexión con la base de datos: ' . mysql_error());
		}
		mysql_select_db("iron_man", $mvc_bd_conexion);

		mysql_set_charset('utf8');

		$this->conexion_iron_man = $mvc_bd_conexion;
    }



	public function bd_conexion() //coneccion a la base de datos
	{

	}

    public function insertarEquipo( $equipo)
	{
		extract($equipo);
	  	

		$marca_id= htmlspecialchars($marca_id);
		$modelo= htmlspecialchars($modelo);
		$no_serie= htmlspecialchars($no_serie);
		$procesador= htmlspecialchars($procesador);
		$memoria= htmlspecialchars($memoria);
		$dd= htmlspecialchars($dd);
		$usuario_id= htmlspecialchars($usuario_id);
		
		$fecha_compra= htmlspecialchars($fecha_compra);
		$fecha_alta= htmlspecialchars($fecha_alta);
		$factura= htmlspecialchars($factura);

		$sql = "insert into iron_man.equipos (marca_id,modelo,no_serie,procesador,memoria,dd,usuario_id,fecha_compra,fecha_alta,factura, nombre_equipo)
		values('".$marca_id."','".$modelo."','".$no_serie."','".$procesador."','".$memoria."','".$dd."','".$usuario_id."','".$fecha_compra."','".$fecha_alta."','".$factura."', '".$nombre_equipo."' )";

		$result = mysql_query($sql, $this->conexion_iron_man) or die(mysql_error());
		$id=mysql_insert_id($this->conexion_iron_man);
		return $id;
	}

	public function insertarMtto( $equipo)
	{
		extract($equipo);
	  	
		$equipo_id=htmlspecialchars($equipo_id);
		
		
		$memoria= htmlspecialchars($memoria);
		$dd= htmlspecialchars($dd);
		
		$sql_eq = "select * from empleados where empleado_id=".$id;

		$result_eq = mysql_query($sql_eq, $this->conexion);

		$equipo_old = mysql_fetch_assoc($result_eq);


		$sql = "insert into iron_man.ajustes_equipo (id_equipo,memoria_old,memoria_new,dd_old,dd_new,comentario)
		values('".$id_equipo."','".$equipo_old['memoria']."','".$memoria_new."','".$equipo_old['dd']."','".$dd_new."','".$comentario."')";

		$result = mysql_query($sql, $this->conexion_iron_man) or die(mysql_error());
		$id=mysql_insert_id($this->conexion_iron_man);
		return $id;
	}


	 
	public function editarEquipo($equipo)
	{
		extract($equipo);

	 	$marca_id= htmlspecialchars($marca_id);
		$modelo= htmlspecialchars($modelo);
		$no_serie= htmlspecialchars($no_serie);
		$procesador= htmlspecialchars($procesador);
		$memoria= htmlspecialchars($memoria);
		$dd= htmlspecialchars($dd);
		$usuario_id= htmlspecialchars($usuario_id);
		$ultimo_ajuste= htmlspecialchars($ultimo_ajuste);
		$ultimo_mtto= htmlspecialchars($ultimo_mtto);
		$fecha_compra= htmlspecialchars($fecha_compra);
		$fecha_alta= htmlspecialchars($fecha_alta);
		$factura= htmlspecialchars($factura);

		$sql="Update set iron_man.equipos compania=".$compania.",equipo=".$equipo.",numcuenta=".$numcuenta.",razon_social=".$razon_social.",empleado_id=".$empleado_id." where id=".$id;
		$result = mysql_query($sql, $this->conexion_iron_man) or die(mysql_error());
        return $result;
	}


	public function dameEquipos() // ajustar a postgress
	{
		$sql = "select * from iron_man.equipos ";

		$result = mysql_query($sql, $this->conexion_iron_man);
		$equipos = array();
		if($result){
			while ($row = mysql_fetch_assoc($result))
			{
				$equipos[] = $row;
			}

		}
		return $equipos;
	}
	//porsi las dudas
	public function dameEquiposActivos() // ajustar a postgress
	{
		$sql = "select * from iron_man.equipos where status=1 ";

		$result = mysql_query($sql, $this->conexion_iron_man);
		$equipos = array();
		if($result){
			while ($row = mysql_fetch_assoc($result))
			{
		 		$equipos[] = $row;
			}

		}
		return $equipos;
	}
	//porsi las dudas
	public function dameEquiposInactivos() // ajustar a postgress
	{
		$sql = "select * from iron_man.equipos where status <>1 ";

		$result = mysql_query($sql, $this->conexion_iron_man);
		$equipos = array();
		if($result){
			while ($row = mysql_fetch_assoc($result))
			{
		 $equipos[] = $row;
			}

		}
		return $equipos;
	}

	public function buscarPorNumero($numero)
	{
		$numero = htmlspecialchars($numero);

		$sql = "select * from iron_man.equipos where equipo like '" . $numero . "'desc";

		$result = mysql_query($sql, $this->conexion_iron_man);

		$equipos = array();
		while ($row = mysql_fetch_assoc($result))
		{
		 $equipos[] = $row;
		}

		return $equipos;
	}



	public function dameEmpleados()
	{
		$sql = "select * from empleados ";

	 $result = mysql_query($sql, $this->conexion_iron_man);

	 $empleados = array();
	 while ($row = mysql_fetch_assoc($result))
	 {
	     $empleados[] = $row;
	 }
	 return $empleados;
	}

	public function dameEquipo($id)
	{
		$id = htmlspecialchars($id);

		$sql = "select e.*, m.nombre, Concat(em.nombre, em.apellido_p, em.apellido_m) empleado from iron_man.equipos e, iron_man.marcas m, rhsys.empleados em  where id_equipo=".$id." and m.marca_id = e.marca_id";

		$result = mysql_query($sql, $this->conexion_iron_man);

		$row = mysql_fetch_assoc($result);

		return $row;

	}

	public function dameMarcas()
	{
		$sql = "select * from iron_man.marcas";

		$result = mysql_query($sql, $this->conexion_iron_man);

		$empleados = array();
		while ($row = mysql_fetch_assoc($result))
		{
			$empleados[] = $row;
		}
		return $empleados;

	}

	public function validarDatos($equipo)
	{
		extract($equipo);
		return true;
		/*
	 	return (is_int($marca_id) &
			is_string($modelo) &
			is_string($no_serie) &
			is_string($procesador) &
			is_string($memoria) &
	 		is_string($dd) &
			is_int($usuario_id) &
			is_string($factura) 
			);
		*/
	}
	public function dameProyectos(){
		//develop
        //     $mvc_bd_hostname = "localhost";
            //  $mvc_bd_nombre   = "proyectos";
            //  $mvc_bd_usuario  = "postgres";
            //  $mvc_bd_clave    = "qwerty";
        //

        //production
            $mvc_bd_hostname_pg = "192.168.1.244";
            $mvc_bd_nombre_pg   = "proyectos";
            $mvc_bd_usuario_pg  = "postgres";
            $mvc_bd_clave_pg    = "Acsa.2014";
        //

        $dbconn = pg_connect("host=".$mvc_bd_hostname_pg." port=5432 dbname=".$mvc_bd_nombre_pg." user=".$mvc_bd_usuario_pg." password=".$mvc_bd_clave_pg);

        //$dbconn = pg_connect("host=localhost port=5432 dbname=proyectos user=postgres password=qwerty");

        $query = "select num_proy obra_id ,nombre_proyecto nombre from proyectos.proy where status_construccion = '1'"; 

            $result = pg_query($query); 
            if (!$result) { 
                echo "Problem with query " . $query . "<br/>"; 
                echo pg_last_error(); 
                exit(); 
            }
            $proyectos=array();
            while($row = pg_fetch_assoc($result)) { 
                 $proyectos[] = $row;    
                }


                //print_r($proyectos);
        return $proyectos;
	}

 }

 ?>