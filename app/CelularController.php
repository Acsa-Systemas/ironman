<?php

 class CelularController
 {



 	
	public function inicio()//index
	{  session_start();
		if(!isset($_session['user_id'])){
	    	header('Location:  index.php?ctl=login');	
	 	}


		$m = new EmpleadosModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
		             Config::$mvc_bd_clave, Config::$mvc_bd_hostname); //coneccion al modelo

		$params = array( //parametros
		     'empleados' => $m->dameEmpleados(),
		);

	 require __DIR__ . '/templates/mostrarEmpleado.php';
	}

	public function listar() //listar
    { 	session_start();
     	if(isset($_SESSION['user_id'])){
	 	}
	 	else{
	 		header('Location:  index.php?ctl=login');
	 	}

        $m = new AutomovilesModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                     Config::$mvc_bd_clave, Config::$mvc_bd_hostname); //coneccion al modelo

		$params = array( //parametros
			'autos' => $m->dameAutomoviles(),
		);

        require __DIR__ . '/templates/mostrarCarros.php';
    }
     

    public function addCelular() //insert
	{ 	
		session_start();	
		if(isset($_SESSION['user_id'])){
	 	}
	 	else{
	 		header('Location:  index.php?ctl=login');
	 	}
     	$m = new CelularesModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                     Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

     	$m2 = new EmpleadosModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                     Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
     	$empleados= $m->dameEmpleados();

		$params = array( //parametros que envio
			'compania' => "",
			'telefono' => "",
			'num_cuenta' => "",
			'razon_social' => "",
			'empleado_id' => "",
			'empleados' => $empleados,
		);

        


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

             // comprobar campos formulario
			
             if ($m->validarDatos($_POST['compania'],$_POST['telefono'],$_POST['numcuenta'],$_POST['razon_social'])) {
				//usamos metodo del modelo

                 $m->insertarCelular($_POST['compania'],$_POST['telefono'],$_POST['numcuenta'],$_POST['razon_social'],$_POST['empleado_id']);
					 //header('Location:  index.php?ctl=listarAuto'); //redirect				
            } else {
                $params = array( //parametros que envio
						'compania' => $_POST['compania'],
						'telefono' => $_POST['telefono'],
						'num_cuenta' => $_POST['numcuenta'],
						'razon_social' => $_POST['razon_social'],
						'empleado_id' => $_POST['empleado_id'],
						'empleados' => $empleados,
				);
                $params['mensaje'] = 'No se ha podido registrar el celular. Revisa el formulario';
            }
             
         }

         require __DIR__ . '/templates/Celular/AltaCelular.php';
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

         $m = new EmpleadosModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
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
		 $m = new EmpleadosModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                     Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
         $params = array(
             'nombre' => '',
             'resultado' => array(),
			 'empleados' => $m->dameEmpleadosActivos(),
         );

         

         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
             $params['nombre'] = $_POST['nombre'];
             $params['resultado'] = $m->buscarEmpleadoActivo($_POST['nombre']);
         }

         //require __DIR__ . '/templates/Empleado/buscarActivos.php';
    }

    public function buscarInactivos()
    {
     	session_start();
     	if(isset($_SESSION['user_id'])){
	 	}
	 	else{
	 		header('Location:  index.php?ctl=login');
	 	}
		 $m = new EmpleadosModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
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
		$m = new EmpleadosModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
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

	public function viewCelular()
	{
		session_start();
		if(isset($_SESSION['user_id'])){
	 	}
	 	else{
	 		echo "no tiene session";
	 		#header('Location:  index.php?ctl=login');

	 	}
		if (!isset($_GET['id'])) {
		 throw new Exception('Página no encontrada');
		}

		$id = $_GET['id'];

		$m = new AutomovilesModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
		         Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
		$m2 = new EmpleadosModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
		         Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

		$empleados = $m2->dameEmpleados();
		$automovil= $m->dameAutomovil($id);
		$params = array('empleados' => $empleados,'automovil' => $automovil);

		require __DIR__ . '/templates/Automovil/viewAutomovil.php';
	}

	public function editCelular()
	{
		session_start();
		if(isset($_SESSION['user_id'])){
	 	}
	 	else{
	 		header('Location:  index.php?ctl=login');
	 	}
		$m2 = new EmpleadosModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
	                     Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
		$m = new CelularesModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
		         Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$m->editarTelefono($_POST['id'],$_POST['compania'],$_POST['telefono'],$_POST['numcuenta'],$_POST['razon_social'],$_POST['empleado_id']);
			header('Location:  index.php?ctl=viewCel&id='.$_POST['id']);
		}
		else{
			$id = $_GET['id'];
			
			$empleados= $m2->dameEmpleados();

			$params = array( //parametros que envio
						'compania' => $_POST['compania'],
						'telefono' => $_POST['telefono'],
						'num_cuenta' => $_POST['numcuenta'],
						'razon_social' => $_POST['razon_social'],
						'empleado_id' => $_POST['empleado_id'],
						'empleados' => $empleados,
				);
		}
		require __DIR__ . '/templates/Celular/editCelular.php';

	}

	
 }
 