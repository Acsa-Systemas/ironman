<?php ob_start() ?>
<?php $equipo= $params['equipo']?>
<style>
body{color:#9C3100;}

.bajos{color:#000;padding: 6px;}
.altos{color:#9C3100;padding: 6px;
font-size:14px;
font:bold;}
td{text-transform:capitalize;}
table{
	background-color:rgba(158, 158, 158, 0.25);}
.contenido{
  position: absolute;
  
  left: 50%; /* Buscamos el centro vertical (relativo) del navegador */
  width: 800px; /* Definimos el ancho del objeto a centrar */
  margin-left: -400px; 
}
</style>
      <div class="contenido">
        <fieldset>
            <legend>Equipo: <?php echo $equipo['nombre_equipo']?></legend>
            <table>
              <tr>
                <td class="altos">Modelo</td>
                <td class="altos">#  deSerie</td>
                <td class="altos">Procesador</td>
                <td class="altos">Memoria</td> 
                <td class="altos">Marca</td>
                <td class="altos">Disco Duro</td>
              </tr>
              <tr>
                <td class="bajos"><?php echo $equipo['modelo']?></td>
                <td class="bajos"><?php echo $equipo['no_serie']?></td>
                <td class="bajos"><?php echo $equipo['procesador']?></td>
                <td class="bajos"><?php echo $equipo['memoria']?></td>
                <td class="bajos"><?php echo $equipo['nombre']?></td>
                  
                <!--<td class="bajos"><input type="text" id="marca_id" name="marca_id" value="<?php echo $equipo['marca_id']?>"/></td>-->
                <td class="bajos"><input type="text" id="dd" name="dd" value="<?php echo $equipo['dd']?>"/></td>  
              </tr>
              <tr>
                <td class="altos"  colspan="1">Adminstradora</td>
                <td class="altos"  colspan="1">Asignado a:</td>
                <td class="altos"  colspan="1">Ultimo Mtto:</td>
                <td class="altos"  colspan="1">Fecha Compra:</td>
                <td class="altos"  colspan="1">Fecha de Alta:</td>
                <td class="altos"  colspan="1">Factura:</td>      
              </tr>
              <tr> 
                <td class="bajos" colspan="1">
                    <select id="razon_social" name="razon_social">
                        <option value="">Seleccione Uno</option>
                        <option value="">ACSA</option>
                        <option value="">MADA</option>                          
                    </select>
                 </td>
                 <td class="bajos" colspan="1">
                    <select id="usuario_id" name="usuario_id">
                          <option value="">Seleccione Uno</option>
                        <?php foreach ($params['empleados'] as $empleado) :?>
                          <option value="<?php echo $empleado['empleado_id']?>" <?php if($empleado['empleado_id']==$equipo['usuario_id']){ echo "selected";}?> ><?php echo $empleado['nombre']." ".$empleado['apellido_p']." ".$empleado['apellido_m']?></option>
                        <?php endforeach; ?>
                    </select>
                 </td>
                 <td class="bajos"><?php echo $equipo['ultimo_mtto']?></td>
                 <td class="bajos"><?php echo $equipo['fecha_compra']?></td> 
                 <td class="bajos"><?php echo $equipo['fecha_alta']?></td> 
                 <td class="bajos"><?php echo $equipo['factura']?></td>  
              </tr>
              <tr>
                <td colspan="7" align="right"><a href="index.php?ctl=edit&id=<?php echo $equipo['id_equipo']?>">editar</a></td>
              </tr>
            </table>
        </fieldset>
      </div>

  <?php
    include('./web/phpqrcode/qrlib.php'); 
    

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

 <?php include './app/templates/layout.php' ?>