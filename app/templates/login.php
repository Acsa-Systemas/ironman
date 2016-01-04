<?php ob_start() ?>
<link rel="stylesheet" href="bootstrap-3.1.1-dist/css/bootstrap.min.css"  media="all"/>
        <link rel="stylesheet" href="DataTables-1.10.2/media/css/jquery.dataTables.css" />
        <link rel="stylesheet" href="datepicker/css/datepicker.css"  >
        <link rel="stylesheet" href="chosen/chosen.css"  />
        
        <style>
            body {
  /* Location of the image */
  background-image: url(./img/full_acsa_background_acsa.png);
  


              /*background-color: #000;*/ /*Default bg, similar to the background's base color*/
              
              background-position: right bottom; /*Positioning*/
              background-repeat: no-repeat; /*Prevent showing multiple background images*/
            
}
            </style>
   
    
    
    <body>
        
        <div class="container-fluid">
        <form id="formAcceso" name="formAcceso" method="post" action="index.php?ctl=login" role="form" class="form-horizontal">
            <div class="form-group">
                    <label for="USUARIO" class="col-sm-2 control-label">Usuario: </label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="usuario" name="usuario_kai" placeholder="Usuario">
                    </div>
                </div>
            <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">Contraseña: </label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" id="password" name="password_kai" placeholder="Contraseña">
                    </div>
                </div>
            <div>
                    <div class="col-sm-6">
                        <button type="submit" name="login" class="btn btn-primary btn-block">Ingresar <span class="glyphicon glyphicon-check"></span></button>
                    </div>
                </div>
        </form>
        </div>
    </body>
    
     <?php $contenido = ob_get_clean() ?>

 <?php include 'layout.php' ?>