<?php

 class MarcaController
 {



 	
	public function inicio()//index
	{  session_start();
		if(!isset($_session['user_id'])){
	    	header('Location:  index.php?ctl=login');	
	 	}
	}

	public function listar() //listar
    { 	session_start();
     	if(isset($_SESSION['user_id'])){
	 	}
	 	else{
	 		header('Location:  index.php?ctl=login');
	 	}

	 	$m = new MarcaModel("iron_man", Config::$mvc_bd_usuario,
                     Config::$mvc_bd_clave, Config::$mvc_bd_hostname); //coneccion al modelo

		$params = array( //parametros
			'marcas' => $m->dameMarcas(),
		);

        require __DIR__ . '/templates/mostrarMarca.php';

    }
     

    public function addMarca() //insert
	{ 	
		session_start();	
		if(isset($_SESSION['user_id'])){
	 	}
	 	else{
	 		header('Location:  index.php?ctl=login');
	 	}
     	$m = new MarcaModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                     Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

     	

		$params = array( //parametros que envio
			'nombre' => "",			
		);

        


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

             // comprobar campos formulario
			
             if ($m->validarDatos($_POST['nombre'])) {
				//usamos metodo del modelo

                $m->insertarMarca($_POST['nombre']);
				header('Location:  index.php?ctl=listarAuto'); //redirect				
            } else {
                $params = array( //parametros que envio
						'nombre' => $_POST['nombre'],
						
				);
                $params['mensaje'] = 'No se ha podido registrar la marca. Revisa el formulario';
            }
             
         }

         require __DIR__ . '/templates/Marca/AltaMarca.php';
    }
    public function editMarca()
	{
		session_start();
		if(isset($_SESSION['user_id'])){
	 	}
	 	else{
	 		header('Location:  index.php?ctl=login');
	 	}
		
		$m = new MarcaModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
		         Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$m->editarMarca($_POST['id'],$_POST['nombre']);
			header('Location:  index.php?ctl=listarMarca');
		}
		else{
			$id = $_GET['id'];
			if(isset($_GET['id'])){
				$id = $_GET['id'];
				$marca= $m->dameMarca($id);
				$params = array( //parametros que envio
					'marca' => $marca,
				);
			}
			else{
	 			header('Location:  index.php?ctl=listarMarca');
	 		}
		}
		require __DIR__ . '/templates/Marca/EditMarca.php';

	}

	public function viewMarca()
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

		

		$m = new MarcaModel("iron_man", Config::$mvc_bd_usuario,
		         Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
		

		
		$marca= $m->dameMarca($id);
		$params = array(
			'marca' => $marca,);
		
		require __DIR__ . '/templates/Marca/ViewMarca.php';
	}

	
 }
 