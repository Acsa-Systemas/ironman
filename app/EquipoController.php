<?php

 class EquipoController
 {

	public function inicio()//index
	{  session_start();
		if(!isset($_session['user_id'])){
	    	header('Location:  index.php?ctl=login');	
	 	}


		$m = new EquipoModel("iron_man", Config::$mvc_bd_usuario,
		             Config::$mvc_bd_clave, Config::$mvc_bd_hostname); //coneccion al modelo

		$params = array( //parametros
		     'equipos' => $m->dameEquipos(),
		);

	 require __DIR__ . '/templates/mostrarEquipos.php';
	}

	public function listar() //listar
    { 	session_start();
     	if(isset($_SESSION['user_id'])){
	 	}
	 	else{
	 		header('Location:  index.php?ctl=login');
	 	}

        $m = new EquipoModel("iron_man", Config::$mvc_bd_usuario,
                     Config::$mvc_bd_clave, Config::$mvc_bd_hostname); //coneccion al modelo

		$params = array( //parametros
			'equipos' => $m->dameEquipos(),
		);

        require __DIR__ . '/templates/mostrarEquipos.php';
    }
     

    public function addEquipo() //insert
	{ 	
		session_start();	
		if(isset($_SESSION['user_id'])){
	 	}
	 	else{
	 		header('Location:  index.php?ctl=login');
	 	}
     	$m = new EquipoModel("iron_man", Config::$mvc_bd_usuario,
                     Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
     	$m3 = new ProveedorModel("iron_man", Config::$mvc_bd_usuario,
                     Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
     	//poner accesos a la otra DB
     	$m2 = new EmpleadosModel("rhsys", Config::$mvc_bd_usuario,
                     Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
     	$empleados= $m2->dameEmpleados();

     	$proveedores= $m3->dameProveedores();

     	$marcas= $m->dameMarcas();
     	$proyectos= $m->dameProyectos();

		$params = array( //parametros que envio
			'nombre_equipo'=>"",
			'marca_id' => "",
			'marcas' => $marcas,
			'usuario_id'=>"",
			'modelo' => "",
			'no_serie' => "",
			'procesador' => "",
			'memoria' => "",
			'dd' => "",
			'modelo' => "",
			'usuario_id' => "",
			'ultimo_ajuste' => "",
			'ultimo_mtto' => "",
			'fecha_compra' => "",
			'fecha_alta' => "",
			'factura' => "",
			'proveedor_id' =>"",
			'obra_id' =>"",
			'proyectos'=> $proyectos,
			'empleados' => $empleados,
			'proveedores' => $proveedores,
		);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // comprobar campos formulario
			$equipo_new=$_POST;
            if ($m->validarDatos($equipo_new)) {
				//usamos metodo del modelo
                $id_new=$m->insertarEquipo($equipo_new);
				header('Location:  index.php?ctl=showQR&id='.$id_new); //redirect				
            } else {
                $params = array( //parametros que envio
                		'nombre_equipo'=>$_POST['nombre_equipo'],
						'marca_id' => $marcas,
						'modelo' => $_POST['modelo'],
						'no_serie' => $_POST['no_serie'],
						'procesador' => $_POST['procesador'],
						'memoria' => $_POST['memoria'],
						'dd' => $_POST['dd'],
						'modelo' => $_POST['modelo'],
						'usuario_id' => $_POST['usuario_id'],
						'ultimo_mtto' => $_POST['ultimo_mtto'],
						'fecha_compra' => $_POST['fecha_compra'],
						'fecha_alta' => $_POST['fecha_alta'],
						'factura' => $_POST['factura'],
						'empleados' => $empleados,
						'mensaje' => 'No se ha podido registrar el equipo. Revisa el formulario'
				);  
            }  
        }
        require __DIR__ . '/templates/Equipo/AltaEquipo.php';
    }

    public function addMtto() //insert
	{ 	
		session_start();	
		if(isset($_SESSION['user_id'])){
	 	}
	 	else{
	 		header('Location:  index.php?ctl=login');
	 	}
     	$m = new EquipoModel("iron_man", Config::$mvc_bd_usuario,
                     Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
     	if (!isset($_GET['id'])) {
			 	throw new Exception('Página no encontrada');
			 	header('Location:  index.php?ctl=activos');
			}
     	$equipo=$m->dameEquipo($_GET['id']);
		

		$params = array( //parametros que envio
			'equipo'=>$equipo,
			
		);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // comprobar campos formulario
			$equipo_new=$_POST;
            if ($m->validarDatos($equipo_new)) {
				//usamos metodo del modelo
                $id_new=$m->insertarMtto($equipo_new);
				header('Location:  index.php?ctl=showQR&id='.$id_new); //redirect				
            } else {
                $params = array( //parametros que envio
                		'nombre_equipo'=>$_POST['nombre_equipo'],
						'marca_id' => $marcas,
						'modelo' => $_POST['modelo'],
						'no_serie' => $_POST['no_serie'],
						'procesador' => $_POST['procesador'],
						'memoria' => $_POST['memoria'],
						'dd' => $_POST['dd'],
						'modelo' => $_POST['modelo'],
						'usuario_id' => $_POST['usuario_id'],
						'ultimo_mtto' => $_POST['ultimo_mtto'],
						'fecha_compra' => $_POST['fecha_compra'],
						'fecha_alta' => $_POST['fecha_alta'],
						'factura' => $_POST['factura'],

						'empleados' => $empleados,
						'mensaje' => 'No se ha podido registrar el equipo. Revisa el formulario'
				);  
            }  
        }
        require __DIR__ . '/templates/Equipo/AltaMtto.php';
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
		 $m = new EquipoModel("iron_man", Config::$mvc_bd_usuario,
		         Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
         $params = array(
             'nombre' => '',
             'resultado' => array(),
			 'equipos' => $m->dameEquiposActivos(),
         );

         require __DIR__ . '/templates/Equipo/ActivoEquipo.php';
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

	public function viewEquipo()
	{
		session_start();
		if(isset($_SESSION['user_id'])){
	 	}
	 	else{
	 		echo "no tiene session";
	 		#header('Location:  index.php?ctl=login');

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

		

		$m = new EquipoModel("iron_man", Config::$mvc_bd_usuario,
		         Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
		$m2 = new EmpleadosModel("rhsys", Config::$mvc_bd_usuario,
		         Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

		$empleados = $m2->dameEmpleados();
		$equipo= $m->dameEquipo($id);
		$params = array('empleados' => $empleados,
			'equipo' => $equipo,);
		
		require __DIR__ . '/templates/Equipo/ViewEquipo.php';
	}

	public function editEquipo()
	{
		session_start();
		if(isset($_SESSION['user_id'])){
	 	}
	 	else{
	 		header('Location:  index.php?ctl=login');
	 	}
		
		$m = new EquipoModel("iron_man", Config::$mvc_bd_usuario,
		         Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
		$m2 = new EmpleadosModel("rhsys", Config::$mvc_bd_usuario,
                     Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
		$m3 = new ProveedorModel("iron_man", Config::$mvc_bd_usuario,
                     Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$equipo_edit=$_POST;
			$m->editarEquipo($equipo_edit);
			header('Location:  index.php?ctl=viewCel&id='.$_POST['id']);
		}
		else{
			$id = $_GET['id'];
			
			$empleados= $m2->dameEmpleados();
			$equipo= $m->dameEquipo($id);
			$proyectos= $m->dameProyectos();


			$params = array( //parametros que envio
					'equipo'=>$equipo,
					'empleados' => $empleados,
					'marcas' => $marcas,
					'proyectos'=> $proyectos,
					'proveedores' => $proveedores,
				);
		}
		require __DIR__ . '/templates/Equipo/EditEquipo.php';

	}

	public function showQR()
	{
		session_start();
		if(isset($_SESSION['user_id'])){
	 	}
	 	else{
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

		$m = new EquipoModel("iron_man", Config::$mvc_bd_usuario,
		         Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
		
		$equipo= $m->dameEquipo($id);
		$params = array('equipo' => $equipo,);
		
		require __DIR__ . '/templates/Equipo/print_code.php';

	}
	
}
?>