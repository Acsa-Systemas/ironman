<?php

 class EmpleadosModel
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

     //sueldo contratado = su_neg
     public function insertarEmpleado($empleado_new)
			{
				extract($empleado_new);
			  	
				$nombre= htmlspecialchars($nombre);
				$apellido_p= htmlspecialchars($apellido_p);
				$apellido_m= htmlspecialchars($apellido_m);
				
				$sexo= htmlspecialchars($sexo);
				$estado_civil= htmlspecialchars($estado_civil);
				$nacionalidad= htmlspecialchars($nacionalidad);
				$curp= htmlspecialchars($curp);
				$rfc= htmlspecialchars($rfc);
				$f_nacimiento= htmlspecialchars($f_nacimiento);
				$l_nacimiento= htmlspecialchars($l_nacimiento);
				
				$correo_personal= htmlspecialchars($correo_personal);
				$cel_personal= htmlspecialchars($cel_personal);
				$tel_personal= htmlspecialchars($tel_personal);

				 $puesto_id= htmlspecialchars($puesto);
				$proyecto_tipo= htmlspecialchars($proyecto_tipo);
				$area_id= htmlspecialchars($area_id);
				$departamento_id= htmlspecialchars($departamento_id);
				
				$razon_social_id= htmlspecialchars($razon_social_id);
				$su_aut= htmlspecialchars($su_aut);
				$su_neg= htmlspecialchars($su_neg);
				$sd= htmlspecialchars($sd);
				$su_sem= htmlspecialchars($su_sem);
				$su_men_fiscal= htmlspecialchars($su_sem_fiscal);
				$su_sem_efectivo= htmlspecialchars($su_sem_efectivo);
				$f_ajuste_su= htmlspecialchars($f_ajuste_su);
				$imss_num= htmlspecialchars($imss_num);
				$imss_desc= htmlspecialchars($imss_desc);
				$isr_desc= htmlspecialchars($isr_desc);
				$num_cta_ban= htmlspecialchars($num_cta_ban);
				$cta_ban_clabe= htmlspecialchars($cta_ban_clabe);
				$cta_ban_id= htmlspecialchars($cta_ban_id);
				$no_banco=htmlspecialchars($no_banco);
				
				$status= htmlspecialchars($status);
				$jefe_id= htmlspecialchars($jefe_id);
				$cedula= htmlspecialchars($cedula);
				$estudios= htmlspecialchars($estudios);
				$exp_prof= htmlspecialchars($exp_prof);
				$dir_calle= htmlspecialchars($dir_calle);
				$dir_colonia= htmlspecialchars($dir_colonia);
				$dir_cp= htmlspecialchars($dir_cp);
				$dir_entidad= htmlspecialchars($dir_entidad);
				$pais= htmlspecialchars($pais);
				$fecha_baja= htmlspecialchars($fecha_baja);
				$fecha_ingreso= htmlspecialchars($fecha_ingreso);
				$dir_municipio= htmlspecialchars($dir_municipio);
				
				/*
				$infonavit= htmlspecialchars($infonavit);
				$infonavit_num_cred= htmlspecialchars($infonavit_num_cred);
				$factor_descuento = htmlspecialchars($factor_descuento );
				$vsm = htmlspecialchars($vsm );
				$trabajador_tipo = htmlspecialchars($trabajador_tipo );
				$correo_acsa= htmlspecialchars($correo_acsa);
				
				$baja_motivo= htmlspecialchars($baja_motivo);
				$contrato_tipo= htmlspecialchars($contrato_tipo);
				$contrato_fecha= htmlspecialchars($contrato_fecha);
				*/
				
				
				
				
				$sql = "insert into empleados ( nombre,apellido_p, apellido_m,sexo,estado_civil,nacionalidad,curp,rfc,f_nacimiento,l_nacimiento,correo_personal,cel_personal,tel_personal,puesto,proyecto_tipo,area_id,departamento_id, razon_social_id,su_aut,su_neg,sd,su_sem,su_sem_efectivo,su_sem_fiscal,imss_num,imss_desc,isr_desc,num_cta_ban, cta_ban_clabe,cta_ban_id,no_banco,status,jefe_id,cedula,estudios,exp_prof,dir_calle,dir_colonia,dir_cp,dir_entidad,pais,su_actual,fecha_baja,fecha_ingreso,dir_municipio, carrera)
				values('".$nombre."','".$apellido_p."','".$apellido_m."','".$sexo."','".$estado_civil."','".$nacionalidad."','".$curp."','".$rfc."','".$f_nacimiento."','".$l_nacimiento."','".$correo_personal."','".$cel_personal."','".$tel_personal."','".$puesto."','".$proyecto_tipo."','".$area_id."','".$departamento_id."','".$razon_social_id."','".$su_aut."','".$su_neg."','".$sd."','".$su_sem."','".$su_sem_efectivo."','".$su_sem_fiscal."','".$imss_num."','".$imss_desc."','".$isr_desc."','".$num_cta_ban."','".$cta_ban_clabe."','".$cta_ban_id."','".$no_banco."','".$status."','".$jefe_id."','".$cedula."','".$estudios."','".$exp_prof."','".$dir_calle."','".$dir_colonia."','".$dir_cp."','".$dir_entidad."','".$pais."','".$su_neg."','".$fecha_baja."','".$fecha_ingreso."','".$dir_municipio."','".$carrera."')";
				
				$result = mysql_query($sql, $this->conexion) or die(mysql_error());

         		return $result;
			  }
		



	 public function editarPersonales($id,$nombre,$apellido_p,$apellido_m,$sexo,$estado_civil,$nacionalidad,$curp,$rfc,
									$f_nacimiento,$l_nacimiento,$correo_personal,$cel_personal,$tel_personal,$dir_calle,$dir_colonia,$dir_cp,$dir_entidad,$pais)
	{

	 	$nombre= htmlspecialchars($nombre);
		$apellido_p = htmlspecialchars($apellido_p );
		$apellido_m= htmlspecialchars($apellido_m);
		$sexo= htmlspecialchars($sexo);
		$estado_civil= htmlspecialchars($estado_civil);
		$nacionalidad= htmlspecialchars($nacionalidad);
		$curp= htmlspecialchars($curp);
		$rfc= htmlspecialchars($rfc);
		$f_nacimiento= htmlspecialchars($f_nacimiento);
		$l_nacimiento= htmlspecialchars($l_nacimiento);
		$correo_personal= htmlspecialchars($correo_personal);
		$cel_personal= htmlspecialchars($cel_personal);
		$tel_personal= htmlspecialchars($tel_personal);
		$dir_calle= htmlspecialchars($dir_calle);
		$dir_colonia= htmlspecialchars($dir_colonia);
		$dir_cp= htmlspecialchars($dir_cp);
		$dir_entidad= htmlspecialchars($dir_entidad);
		$pais= htmlspecialchars($pais);
		$dir_municipio= htmlspecialchars($dir_municipio);

		//historial
		$id = htmlspecialchars($id);

		$sql_emp = "select * from empleados where empleado_id=".$id;

		$result = mysql_query($sql_emp, $this->conexion);
		
		$empleado_old = mysql_fetch_assoc($result);

		$sql_i="insert into cambios_empleados (nombre_new,apellido_p_new,apellido_m_new,sexo_new,estado_civil_new,nacionalidad_new,curp_new,rfc_new,f_nacimiento_new,l_nacimiento_new,correo_personal_new,cel_personal_new,tel_personal_new,dir_calle_new,dir_colonia_new,dir_cp_new,dir_entidad_new,pais_new,nombre_old,apellido_p_old,apellido_m_old,sexo_old,estado_civil_old,nacionalidad_old,curp_old,rfc_old,f_nacimiento_old,l_nacimiento_old,correo_personal_old,cel_personal_old,tel_personal_old,dir_calle_old,dir_colonia_old,dir_cp_old,dir_entidad_old,pais_old,empleado_id, tipo_cambio) values('".$nombre."','".$apellido_p."','".$apellido_m."','".$sexo."','".$estado_civil."','".$nacionalidad."','".$curp."','".$rfc."','".$f_nacimiento."','".$l_nacimiento."','".$correo_personal."','".$cel_personal."','".$tel_personal."','".$dir_calle."','".$dir_colonia."','".$dir_cp."','".$dir_entidad."','".$pais."','".$empleado_old['nombre']."','".$empleado_old['apellido_p']."','".$empleado_old['apellido_m']."','".$empleado_old['sexo']."','".$empleado_old['estado_civil']."','".$empleado_old['nacionalidad']."','".$empleado_old['curp']."','".$empleado_old['rfc']."','".$empleado_old['f_nacimiento']."','".$empleado_old['l_nacimiento']."','".$empleado_old['correo_personal']."','".$empleado_old['cel_personal']."','".$empleado_old['tel_personal']."','".$empleado_old['dir_calle']."','".$empleado_old['dir_colonia']."','".$empleado_old['dir_cp']."','".$empleado_old['dir_entidad']."','".$empleado_old['pais']."','".$id."','Personal' )";
		
		$result = mysql_query($sql_i, $this->conexion) or die(mysql_error());
		//

	 	$sql="Update empleados set nombre='".$nombre."',`apellido_p`='".$apellido_p."',`apellido_m`='".$apellido_p."', sexo='".$sexo."', estado_civil='".$estado_civil."',nacionalidad='".$nacionalidad."',curp='".$curp."',rfc='".$rfc."',f_nacimiento='".$f_nacimiento."',l_nacimiento='".$l_nacimiento."',correo_personal='".$correo_personal."',cel_personal='".$cel_personal."',tel_personal='".$tel_personal."',dir_calle='".$dir_calle."',dir_colonia='".$dir_colonia."',dir_cp='".$dir_cp."',dir_entidad='".$dir_entidad."',pais='".$pais."', dir_municipio='".$dir_municipio."' where empleado_id=".$id;
		$result = mysql_query($sql, $this->conexion) or die(mysql_error());
        return $result;
	}

	public function editarProfesionales($id,$cedula,$estudios,$exp_prof)
	{

	 	$cedula = htmlspecialchars($cedula);
		$estudios = htmlspecialchars($estudios);
		$exp_prof = htmlspecialchars($exp_prof);

		//historial
		$id = htmlspecialchars($id);

		$sql_emp = "select * from empleados where empleado_id=".$id;

		$result = mysql_query($sql_emp, $this->conexion);

		
		$empleado_old = mysql_fetch_assoc($result);

		$sql_insert="insert cambios_empleados(cedula_new,estudios_new,exp_prof_new,cedula_old,estudios_old,exp_prof_old,empleado_id, tipo_cambio) values ('".$cedula."','".$estudios."','".$exp_prof."','".$empleado_old['cedula']."','".$empleado_old['estudios']."','".$empleado_old['exp_prof']."','".$id."','Profesional')";
		$result = mysql_query($sql_insert, $this->conexion) or die(mysql_error());
		//fin historial

		$sql="Update  empleados set cedula='".$cedula."',estudios='".$estudios."',exp_prof='".$exp_prof."' where empleado_id=".$id;
		$result = mysql_query($sql, $this->conexion) or die(mysql_error());
        return $result;
	}
	public function editarOther($empleado_edit)
	{
		extract($empleado_edit);
	 	

		//historial
		$id = htmlspecialchars($id);

		$sql_emp = "select * from empleados where empleado_id=".$id;

		$result = mysql_query($sql_emp, $this->conexion);

		
		$empleado_old = mysql_fetch_assoc($result);
		$sql_insert;
		$apertura="insert cambios_empleados(";
		$campos="status_new,jefe_id_new,status_old,jefe_id_old,empleado_id, tipo_cambio";

		$medio=")values (";
		$valores="'".$status."','".$jefe_id."',''".$empleado_old['status']."','".$empleado_old['jefe_id']."','".$id."','Other'";
		$cierre=")";
		$sql_insert=$apertura.$campos.$medio.$valores.$cierre;
		$result = mysql_query($sql_insert, $this->conexion) or die(mysql_error());
		//fin historial

		$sql="Update  empleados set cedula='".$cedula."',estudios='".$estudios."',exp_prof='".$exp_prof."' where empleado_id=".$id;
		$result = mysql_query($sql, $this->conexion) or die(mysql_error());
        return $result;
	}

	public function editarPuesto($id,$puesto,$proyecto_tipo,$area_id,$departamento_id,$razon_social_id)
	{

		$puesto = htmlspecialchars($puesto);
		$proyecto_tipo = htmlspecialchars($proyecto_tipo);
		$area_id = htmlspecialchars($area_id);
		$departamento_id  = htmlspecialchars($departamento_id);
		$razon_social_id = htmlspecialchars($razon_social_id);

		//historial
		$id = htmlspecialchars($id);

		$sql_emp = "select * from empleados where empleado_id=".$id;

		$result = mysql_query($sql_emp, $this->conexion);

		
		$empleado_old = mysql_fetch_assoc($result);

		$sql_insert="insert cambios_empleados(puesto_new,proyecto_tipo_new,area_id_new,departamento_id_new,razon_social_id_new,puesto_old,proyecto_tipo_old,area_id_old,departamento_id_old,razon_social_id_old,empleado_id, tipo_cambio)
		values('".$puesto."','".$proyecto_tipo."','".$area_id."','".$departamento_id."','".$razon_social_id."','".$empleado_old['puesto']."','".$empleado_old['proyecto_tipo']."','".$empleado_old['area_id']."','".$empleado_old['departamento_id']."','".$empleado_old['razon_social_id']."','".$id."','Puesto')";
		$result = mysql_query($sql_insert, $this->conexion) or die(mysql_error());
		
		//fin historial
		$sql="Update empleados set puesto='".$puesto."',proyecto_tipo='".$proyecto_tipo."',area_id='".$area_id."',departamento_id='".$departamento_id."',razon_social_id='".$razon_social_id."' where empleado_id=".$id;
		$result = mysql_query($sql, $this->conexion) or die(mysql_error());
        return $result;
	}
	 
	public function editarEconomicos($id,$su_sem,$su_sem_efectivo,$su_sem_fiscal,$imss_num,$imss_desc,$isr_desc,$num_cta_ban, $cta_ban_clabe,$cta_ban_id,$no_banco,$su_actual)
	{
	 	
		$su_sem= htmlspecialchars($su_sem);
		$su_sem_efectivo= htmlspecialchars($su_sem_efectivo);
		$su_sem_fiscal= htmlspecialchars($su_sem_fiscal);
		$imss_num= htmlspecialchars($imss_num);
		$imss_desc= htmlspecialchars($imss_desc);
		$isr_desc= htmlspecialchars($isr_desc);
		$num_cta_ban= htmlspecialchars( $num_cta_ban);
		$cta_ban_clabe= htmlspecialchars($cta_ban_clabe);
		$cta_ban_id= htmlspecialchars($cta_ban_id);
		$no_banco == htmlspecialchars($no_banco);

		//historial
		$id = htmlspecialchars($id);

		$sql_emp = "select * from empleados where empleado_id=".$id;

		$result = mysql_query($sql_emp, $this->conexion);

		
		$empleado_old = mysql_fetch_assoc($result);
		session_start();
		$sql_i="insert into cambios_empleados (su_sem_new,su_sem_efectivo_new,su_sem_fiscal_new,f_ajuste_su_new,imss_num_new,imss_desc_new,isr_desc_new,num_cta_ban_new,cta_ban_clabe_new,cta_ban_id_new,no_banco_new,su_aut_old,su_neg_old,sd_old,su_sem_old,su_sem_efectivo_old,su_sem_fiscal_old,f_ajuste_su_old,imss_num_old,imss_desc_old,isr_desc_old,num_cta_ban_old,cta_ban_clabe_old,cta_ban_id_old,no_banco_old,empleado_id,su_actual_old,su_actual_new,tipo_cambio,quien_edita)
		 values('".$su_sem."','".$su_sem_efectivo."','".$su_sem_fiscal."',NOW(),'".$imss_num."','".$imss_desc."','".$isr_desc."','".$num_cta_ban."','".$cta_ban_clabe."','".$cta_ban_id."','".$no_banco."','".$empleado_old['su_aut']."','".$empleado_old['su_neg']."','".$empleado_old['sd']."','".$empleado_old['su_sem']."','".$empleado_old['su_sem_efectivo']."','".$empleado_old['su_sem_fiscal']."',NOW(),'".$empleado_old['imss_num']."','".$empleado_old['imss_desc']."','".$empleado_old['isr_desc']."','".$empleado_old['num_cta_ban']."','".$empleado_old['cta_ban_clabe']."','".$empleado_old['cta_ban_id']."','".$empleado_old['no_banco']."',
		 	'".$id."','".$empleado_old['su_actual']."','".$su_actual."','Economico','".$_SESSION['user_name']."')";
		$result = mysql_query($sql_i, $this->conexion) or die(mysql_error());
		session_write_close();
		//

		$sql="Update empleados set su_sem='".$su_sem."',su_sem_efectivo='".$su_sem_efectivo."',su_sem_fiscal='".$su_sem_fiscal."',f_ajuste_su=NOW(),imss_num='".$imss_num."',imss_desc='".$imss_desc."',isr_desc='".$isr_desc."',num_cta_ban='".$num_cta_ban."',cta_ban_clabe='".$cta_ban_clabe."',cta_ban_id='".$cta_ban_id."',no_banco='".$no_banco."', su_actual='".$su_actual."', su_anterior='".$empleado_old['su_actual']."' where empleado_id=".$id;
		$result = mysql_query($sql, $this->conexion) or die(mysql_error());
        return $result;
	}

	public function dameCambios($id,$tipo){
		$sql = "select * from cambios_empleados where empleado_id=".$id." and tipo_cambio ='".$tipo."'";

		 $result = mysql_query($sql, $this->conexion);
		 $cambios = array();
		 if($result){
		 	while ($row = mysql_fetch_assoc($result))
		 	{
		     $cambios[] = $row;
		 	}

		 }
		 return $cambios;

	}


	public function dameEmpleados() // ajustar a postgress
	{
	 $sql = "select * from empleados ";

	 $result = mysql_query($sql, $this->conexion);
	 $empleados = array();
	 if($result){
	 	while ($row = mysql_fetch_assoc($result))
	 	{
	     $empleados[] = $row;
	 	}

	 }
	 return $empleados;
	}
	public function dameDepartamentos() // ajustar a postgress
	{
	 $sql = "select * from departamentos ";

	 $result = mysql_query($sql, $this->conexion);
	 $departamentos = array();
	 if($result){
	 	while ($row = mysql_fetch_assoc($result))
	 	{
	     $departamentos[] = $row;
	 	}

	 }
	 return $departamentos;
	}

	public function dameEmpleados_monitor_op() // ajustar a postgress
	{
	 $sql = "SELECT e . * , d.nombre departamento_name, p.nombre puesto_name FROM empleados e, departamentos d, puestos p WHERE e.departamento_id = d.departamento_id AND e.puesto = p.clave and e.area_id= '1' order by d.orden, p.orden";

	 $result = mysql_query($sql, $this->conexion);
	 $empleados = array();
		if($result){
		 	while ($row = mysql_fetch_assoc($result))
		 	{
		    	$empleados[] = $row;
		 	}
		}
	 return $empleados;
	}

	public function dameEmpleados_monitor_op_por_dep($dep) // ajustar a postgress
	{
	 $sql = "SELECT e . * , d.nombre departamento_name, p.nombre puesto_name FROM empleados e, departamentos d, puestos p WHERE e.departamento_id = d.departamento_id AND e.puesto = p.clave  and d.departamento_id=".$dep." order by d.orden, p.orden, e.nombre";

	 $result = mysql_query($sql, $this->conexion);
	 $empleados = array();
		if($result){
		 	while ($row = mysql_fetch_assoc($result))
		 	{
		    	$empleados[] = $row;
		 	}
		}
	 return $empleados;
	}

	public function dameEmpleados_monitor_ad() // ajustar a postgress
	{
	 $sql = "SELECT e . * , d.nombre departamento_name, p.nombre puesto_name FROM empleados e, departamentos d, puestos p WHERE e.departamento_id = d.departamento_id AND e.puesto = p.clave and e.area_id= '2' order by d.orden, p.orden";

	 $result = mysql_query($sql, $this->conexion);
	 $empleados = array();
	 if($result){
	 	while ($row = mysql_fetch_assoc($result))
	 	{
	     $empleados[] = $row;
	 	}

	 }
	 return $empleados;
	}

	public function dameEmpleados_monitor_ad_por_dep($dep) // ajustar a postgress
	{
	 $sql = "SELECT e . * , d.nombre departamento_name, p.nombre puesto_name FROM empleados e, departamentos d, puestos p WHERE e.departamento_id = d.departamento_id AND e.puesto = p.clave and e.area_id= '2' and d.departamento_id=".$dep." order by d.orden, p.orden";

	 $result = mysql_query($sql, $this->conexion);
	 $empleados = array();
	 if($result){
	 	while ($row = mysql_fetch_assoc($result))
	 	{
	     $empleados[] = $row;
	 	}

	 }
	 return $empleados;
	}


	public function dameEmpleadosActivos() // ajustar a postgress
	{
	 $sql = "select * from empleados where status=1 order by nombre ";

	 $result = mysql_query($sql, $this->conexion);
	 $empleados = array();
	 if($result){
	 	while ($row = mysql_fetch_assoc($result))
	 	{
	     $empleados[] = $row;
	 	}

	 }
	 return $empleados;
	}
	public function dameEmpleadosInactivos() // ajustar a postgress
	{
	 $sql = "select * from empleados where status <>1  order by nombre";

	 $result = mysql_query($sql, $this->conexion);
	 $empleados = array();
	 if($result){
	 	while ($row = mysql_fetch_assoc($result))
	 	{
	     $empleados[] = $row;
	 	}

	 }
	 return $empleados;
	}

	public function buscarEmpleadosPorNombre($nombre)
	{
	 $nombre = htmlspecialchars($nombre);

	 $sql = "select * from empleados where nombre like '" . $nombre . "'desc";

	 $result = mysql_query($sql, $this->conexion);

	 $empleados = array();
	 while ($row = mysql_fetch_assoc($result))
	 {
	     $empleados[] = $row;
	 }

	 return $empleados;
	}

	public function getProyecto($id){
		$sql = "select proyectos.nombre as nombre_p from empleados, proyectos where empleado_id=".$id." and proyecto_tipo = proyectos.id";

		 $result = mysql_query($sql, $this->conexion);
		 $proyecto = "";
		 if($result){
		 	while ($row = mysql_fetch_assoc($result))
		 	{
		     $proyecto = $row["nombre_p"];
		 	}

		 }
		return $proyecto;
	}
	public function getDepartamento($id){
		$sql = "select d.nombre as nombre_d from empleados e, departamentos d where empleado_id= ".$id." and e.departamento_id = d.departamento_id";

		 $result = mysql_query($sql, $this->conexion);
		 $resultado = "";
		 if($result){
		 	while ($row = mysql_fetch_assoc($result))
		 	{
		     $resultado = $row["nombre_d"];
		 	}

		 }
		return $resultado;
	}
	public function getPuesto($id){
		$sql = "select p.nombre as nombre_p from empleados e, puestos p where empleado_id=".$id." and puesto = clave";

		 $result = mysql_query($sql, $this->conexion);
		 $resultado = "";
		 if($result){
		 	while ($row = mysql_fetch_assoc($result))
		 	{
		     $resultado = $row["nombre_p"];
		 	}

		 }
		return $resultado;
	}


	public function dameProyectos()
	{
		$sql = "select * from proyectos ";

	 $result = mysql_query($sql, $this->conexion);

	 $proyectos = array();
	 while ($row = mysql_fetch_assoc($result))
	 {
	     $proyectos[] = $row;
	 }
	 return $proyectos;
	}

	public function dameEmpleado($id)
	{
	 $id = htmlspecialchars($id);

	 $sql = "select * from empleados where empleado_id=".$id;

	 $result = mysql_query($sql, $this->conexion);

	 $empleados = array();
	 $row = mysql_fetch_assoc($result);

	 return $row;
	}






	public function validarDatos1( $nombre, $apellido_p, $apellido_m,  $sexo, $estado_civil, $nacionalidad,$curp, $rfc, $f_nacimiento, $l_nacimiento, $correo_personal,$cel_personal, $tel_personal)
	{
	 	return (is_string($nombre) &
	 		is_string($apellido_p) &
			is_string($apellido_m) &
	         is_string($sexo) &
			 is_string($estado_civil) &
			 is_string($nacionalidad) &
			 is_string($curp) &
			 is_string($rfc) &
			 is_string($f_nacimiento) &
			 is_string($l_nacimiento) &
			 is_string($correo_personal) &
			 is_string($nacionalidad) &
			 is_string($cel_personal) &
			 is_string($tel_personal));
	}

 }

 ?>