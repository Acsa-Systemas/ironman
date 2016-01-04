<?php

	class ProveedorController
	{

	public function inicio()//index
	{  session_start();
		if(!isset($_session['user_id'])){
	    	header('Location:  index.php?ctl=login');	
	 	}


		$m = new ProveedorModel("iron_man", Config::$mvc_bd_usuario,
		             Config::$mvc_bd_clave, Config::$mvc_bd_hostname); //coneccion al modelo

		$params = array( //parametros
		     'equipos' => $m->dameProveedors(),
		);

	 require __DIR__ . '/templates/mostrarProveedor.php';
	}

	public function listar() //listar
	{ 	session_start();
	 	if(isset($_SESSION['user_id'])){
	 	}
	 	else{
	 		header('Location:  index.php?ctl=login');
	 	}

	    $m = new ProveedorModel("iron_man", Config::$mvc_bd_usuario,
	                 Config::$mvc_bd_clave, Config::$mvc_bd_hostname); //coneccion al modelo

		$params = array( //parametros
			'equipos' => $m->dameProveedors(),
		);

	    require __DIR__ . '/templates/mostrarProveedor.php';
	}
	 

	public function addProveedor() //insert
	{ 	
		session_start();	
		if(isset($_SESSION['user_id'])){
	 	}
	 	else{
	 		header('Location:  index.php?ctl=login');
	 	}
	 	$m = new ProveedorModel("iron_man", Config::$mvc_bd_usuario,
	                 Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
	 	//poner accesos a la otra DB
		$params = array( //parametros que envio
			'nombre'=>"",
			'razon_social' => "",
			'rfc' => "",
			'banco'=>"",
			'no_cta' => "",
			'no_trans' => "",
		);

	    


	    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	        // comprobar campos formulario
			$equipo_new=$_POST;
	         if ($m->validarDatos($equipo_new)) {
				//usamos metodo del modelo
	             $m->insertarProveedor($equipo_new);
				header('Location:  index.php?ctl=listarEquipos'); //redirect				
	        } else {
	            $params = array( //parametros que envio
	            		'nombre'=>$_POST['nombre'],
						'razon_social' =>$_POST['razon_social'],
						'rfc' =>$_POST['rfc'],
						'banco'=>$_POST['banco'],
						'no_cta' =>$_POST['no_cta'],
						'no_trans' =>$_POST['no_trans'],
						'mensaje' => 'No se ha podido registrar el equipo. Revisa el formulario'
				);
	            
	        }
	         
	    }
	     require __DIR__ . '/templates/Proveedor/AltaProveedor.php';
	}


	public function buscarPorNombre()
	{ 
	 	session_start();
	 	if(isset($_SESSION['user_id'])){
	 	}
	 	else{
	 		header('Location:  index.php?ctl=login');
	 	}
	     $params = array(
	         'nombre' => '',
	         'resultado' => array(),
	     );

	     $m = new EmpleadosModel("iron_man", Config::$mvc_bd_usuario,
	                 Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

	     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	         $params['nombre'] = $_POST['nombre'];
	         $params['resultado'] = $m->buscarEmpleadoPorNombre($_POST['nombre']);
	     }

	     //require __DIR__ . '/templates/Empleado/buscarPorNombre.php';
	}
	 
	public function buscarActivos()
	{
	 	session_start();
	 	if(isset($_SESSION['user_id'])){
	 	}
	 	else{
	 		header('Location:  index.php?ctl=login');
	 	}

		 $m = new ProveedorModel("iron_man", Config::$mvc_bd_usuario,
	                 Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
	     $params = array(
	         'nombre' => '',
	         'resultado' => array(),
			 'proveedores' => $m->dameProveedoresActivos(),
	     );

	     

	     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	         $params['nombre'] = $_POST['nombre'];
	         $params['resultado'] = $m->buscarEmpleadoActivo($_POST['nombre']);
	     }

	     require __DIR__ . '/templates/Proveedor/ProveedoresActivos.php';
	}

	public function buscarInactivos()
	{
	 	session_start();
	 	if(isset($_SESSION['user_id'])){
	 	}
	 	else{
	 		header('Location:  index.php?ctl=login');
	 	}
		 $m = new EmpleadosModel("iron_man", Config::$mvc_bd_usuario,
	                 Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
	     $params = array(
	         'nombre' => '',
	         'resultado' => array(),
			 'empleados' => $m->dameEmpleadosInactivos(),
	     );

	     

	     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	         $params['nombre'] = $_POST['nombre'];
	         $params['resultado'] = $m->buscarEmpleadoInactivo($_POST['nombre']);
	     }

	     //require __DIR__ . '/templates/Empleado/buscarInactivos.php';
	}
	public function buscarTodos()
	{
	 	session_start();
	 	if(isset($_SESSION['user_id'])){
	 	}
	 	else{
	 		header('Location:  index.php?ctl=login');
	 	}
		$m = new EmpleadosModel("rhsys", Config::$mvc_bd_usuario,
		         Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
		$params = array(
			'nombre' => '',
			'resultado' => array(),
			'empleados' => $m->dameEmpleados(),
		);

	     

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$params['nombre'] = $_POST['nombre'];
			$params['resultado'] = $m->buscarEmpleadoActivo($_POST['nombre']);
		}

	    //require __DIR__ . '/templates/Empleado/buscarTodos.php';
	 }

	public function viewProveedor()
	{
		session_start();
		if(isset($_SESSION['user_id'])){
	 	}
	 	else{
	 		//echo "no tiene session";
	 		header('Location:  index.php?ctl=login');
	 	}
		$id;
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		 
		 $id=$_POST['id'];
		 $_GET['id'] = $id;

		}
		else{
			if (!isset($_GET['id'])) {
			 	throw new Exception('Página no encontrada');
			 	header('Location:  index.php?ctl=activos');
			}
			$id = $_GET['id'];
		}

		$m = new ProveedorModel("iron_man", Config::$mvc_bd_usuario,
		         Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
		

		
		$proveedor= $m->dameProveedor($id);
		$params = array('proveedor' => $proveedor,);
		
		require __DIR__ . '/templates/Proveedor/ViewProveedor.php';
	}

	public function editProveedor()
	{
		session_start();
		if(isset($_SESSION['user_id'])){
	 	}
	 	else{
	 		header('Location:  index.php?ctl=login');
	 	}
		
		$m = new ProveedorModel("iron_man", Config::$mvc_bd_usuario,
		         Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$proveedor_edit=$_POST;
			$m->editarProveedor($proveedor_edit);
			header('Location:  index.php?ctl=listar');
		}
		else{
			if(isset($_GET['id'])){
				$id = $_GET['id'];
				$proveedor=$m->dameProveedor($id);
				$params = array('proveedor'=>$proveedor,);
			}
		}
		require __DIR__ . '/templates/Proveedor/EditProveedor.php';
	}


	}
?>
 