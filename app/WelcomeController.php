<?php

 class WelcomeController
 {

	 public function login(){//login
	 	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		 	$m = new UsuarioModel("rhsys", Config::$mvc_bd_usuario,
	                     Config::$mvc_bd_clave, Config::$mvc_bd_hostname); //coneccion al modelo
			$user_kai=$_POST['usuario_kai'];
			$password_kai=$_POST['password_kai'];

			$response=$m->login($user_kai,$password_kai);
			print_r($response);
			

			if(count($response)==1){
				$user=$response[0];
				session_start();
				$_SESSION['user_id']=$user["id"];
				$_SESSION['user_name']=$user["name"];
				//print_r($_SESSION);
				if(isset($_SESSION['user_id'])){
					header('Location:  index.php?ctl=listar');
					//print_r($_SESSION);
				}
				else{
					echo "sin user id";
					//print_r($_SESSION);
					require __DIR__ . '/templates/login.php';
				}	
			}
			else{
				echo "los datos son incorrectos";
				require __DIR__ . '/templates/login.php';
			}
		}
		else{
			require __DIR__ . '/templates/login.php';
		}
		 
		 
	 }
	 
	 
	 public function logout(){
	 	$m = new UsuarioModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                     Config::$mvc_bd_clave, Config::$mvc_bd_hostname); //coneccion al modelo



	 }
	 
	 
	 
	 
	 }
 