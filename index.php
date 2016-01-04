<?php
 // web/index.php

 // carga del modelo y los controladores
 require_once __DIR__ . '/app/Config.php';
 require_once __DIR__ . '/app/Models/EmpleadoModel.php';
 require_once __DIR__ . '/app/Models/EquipoModel.php';
 require_once __DIR__ . '/app/Models/UsuarioModel.php';
 require_once __DIR__ . '/app/Models/ProveedorModel.php';
 require_once __DIR__ . '/app/Models/CelularModel.php';
 require_once __DIR__ . '/app/WelcomeController.php';
 require_once __DIR__ . '/app/EquipoController.php';
 require_once __DIR__ . '/app/ProveedorController.php';
 require_once __DIR__ . '/app/Models/MarcaModel.php';
 require_once __DIR__ . '/app/MarcaController.php';


 //valido login


 // enrutamiento
 $map = array(
     'login' => array('controller' =>'WelcomeController', 'action' =>'login'),
     'logout' => array('controller' =>'WelcomeController', 'action' =>'logout'),
     'inicio' => array('controller' =>'WelcomeController', 'action' =>'login'),
     'listar' => array('controller' =>'EquipoController', 'action' =>'listar'),
     
     //equipo
     'addEquipo' => array('controller' =>'EquipoController', 'action' =>'addEquipo'),
     'addMtto' => array('controller' =>'EquipoController', 'action' =>'addMtto'),
     'edit' => array('controller' =>'EquipoController', 'action' =>'editEquipo'),
     'ver' => array('controller' =>'EquipoController', 'action' =>'viewEquipo'),
     'activosEquipo' => array('controller' =>'EquipoController', 'action' =>'buscarActivos'),
     'listarEquipos' => array('controller' =>'EquipoController', 'action' =>'listar'),
     'showQR' => array('controller' =>'EquipoController', 'action' =>'showQR'),
     //'qrcode' => array('controller' =>'EquipoController', 'action' =>'qrcode'),

     //proveedores
     'addProveedor' => array('controller' =>'ProveedorController', 'action' =>'addProveedor'),
     'editProveedor' => array('controller' =>'ProveedorController', 'action' =>'editProveedor'),
     'verProveedor' => array('controller' =>'ProveedorController', 'action' =>'viewProveedor'),
     'activosProveedor' => array('controller' =>'ProveedorController', 'action' =>'buscarActivos'),
     'listarProveedor' => array('controller' =>'ProveedorController', 'action' =>'listar'),

     //Marca
     'addMarca' => array('controller' =>'MarcaController', 'action' =>'addMarca'),
     'editMarca' => array('controller' =>'MarcaController', 'action' =>'editMarca'),
     'viewMarca' => array('controller' =>'MarcaController', 'action' =>'viewMarca'),
     'listarMarca' => array('controller' =>'MarcaController', 'action' =>'listar'),
     
     
     //Celular
     'addCel' => array('controller' =>'CelularController', 'action' =>'addCel'),
     'editCel' => array('controller' =>'CelularController', 'action' =>'editCel'),
     'viewCel' => array('controller' =>'CelularController', 'action' =>'viewCel'),
     'listarCel' => array('controller' =>'CelularController', 'action' =>'listar'),
     //monitores
     'monitorEmp_s' => array('controller' =>'EmpleadoController', 'action' =>'monitores_empleados_simple'),
     'monitorEmp_a' => array('controller' =>'EmpleadoController', 'action' =>'monitores_empleados_alt'),
 );

 // Parseo de la ruta
 if (isset($_GET['ctl'])) {
     if (isset($map[$_GET['ctl']])) {
         $ruta = $_GET['ctl'];
     } else {
         header('Status: 404 Not Found');
         echo '<html><body><h1>Error 404: No existe la ruta <i>' .
                 $_GET['ctl'] .
                 '</p></body></html>';
         exit;
     }
 } else {
     $ruta = 'inicio';
 }

 $controlador = $map[$ruta];
 // Ejecución del controlador asociado a la ruta

 if (method_exists($controlador['controller'],$controlador['action'])) {
     call_user_func(array(new $controlador['controller'], $controlador['action']));
 } else {

     header('Status: 404 Not Found');
     echo '<html><body><h1>Error 404: El controlador <i>' .
             $controlador['controller'] .
             '->' .
             $controlador['action'] .
             '</i> no existe</h1></body></html>';
 }