<?php
class UsuarioModel
 {
     protected $conexion;

     public function __construct($dbname,$dbuser,$dbpass,$dbhost)
     {
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

     public function login($u,$p)
			{
			  	
				
				$u= htmlspecialchars($u);
				$p= htmlspecialchars($p);				
				$sql = "select * from usuarios where usuario='".$u."' and password='".$p."'";
				
				$result = mysql_query($sql, $this->conexion) or die(mysql_error());
				$usuario = array();
				while ($row = mysql_fetch_assoc($result))
				{
				    $usuario[] = $row;
				}
				return $usuario;

         		
			  }


	 

 }
 ?>