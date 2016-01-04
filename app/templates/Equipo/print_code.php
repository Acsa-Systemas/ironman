<?php ob_start() ?>
  <?php
    include('./web/phpqrcode/qrlib.php'); 
     $equipo= $params['equipo'];

    // how to build raw content - QRCode with simple Business Card (VCard) 
     
    $tempDir = "./web/gens/"; 
     
    // datos extra 

    //
     
    // we building raw data 
    $codeContents  = 'BEGIN:VCARD'."\n";
      $codeContents.="modelo: ".$equipo['nombre_equipo']."\n";
      $codeContents.="modelo: ".$equipo['modelo']."\n";
      $codeContents.="no_serie: ".$equipo['no_serie']."\n";
      $codeContents.="procesador: ".$equipo['procesador']."\n";
      $codeContents.="memoria: ".$equipo['memoria']."\n";
      $codeContents.="disco duro: ".$equipo['dd']."\n";
      $codeContents.="modelo: ".$equipo['modelo']."\n";
      $codeContents.="fecha_compra: ".$equipo['fecha_compra']."\n";
      $codeContents.="factura: ".$equipo['factura']."\n";
    $codeContents .= 'END:VCARD'; 
     
    // generating 
    QRcode::png($codeContents, $tempDir.'025.png', QR_ECLEVEL_L, 3); 
    
    // displaying 
    echo '<img src="'.$tempDir.'025.png" />';
  ?>

  <?php $contenido = ob_get_clean() ?>

 <?php include '/app/templates/layout.php' ?>