<?php ob_start() ?>
<?php 
  $proveedor= $params['proveedor'][0];

?>

<style>
body{color:#9C3100;}

.bajos{color:#000;padding: 6px;}
.altos{color:#9C3100;padding: 6px;
font-size:14px;
font:bold;}
td{text-transform:capitalize;}
table{
	background-color:rgba(158, 158, 158, 0.25);
  border: 1;
}
.contenido{
  position: absolute;
  
  left: 50%; /* Buscamos el centro vertical (relativo) del navegador */
  width: 800px; /* Definimos el ancho del objeto a centrar */
  margin-left: -400px; 
}

</style>
      <div class="contenido">
        
        <h2>Vizualizador de Proveedores</h2>
          <table width="800px" cellspacing="5">
            <tr>
              <td class="altos">Nombre</td>
              <td class="altos">Razon Social</td>
              <td class="altos">RFC</td>
            </tr>
            <tr>
              <td class="bajos"><?php echo $proveedor['nombre']?></td>
              <td class="bajos"><?php echo $proveedor['razon_social']?></td>
              <td class="bajos"><?php echo $proveedor['rfc']?></td>
            </tr>
          </table>
          
          <br />
          
          <h2>Datos Bancarios</h2>
          <table width="800px">
            <tr>
              <td class="altos">Banco</td>
              <td class="altos">No. de Cuenta</td> 
              <td class="altos">No. de Transferencia</td>
            </tr>
            <tr>
              <td class="bajos"><?php echo $proveedor['banco']?></td>
              <td class="bajos"><?php echo $proveedor['no_cta']?></td> 
              <td class="bajos"><?php echo $proveedor['no_trans']?></td> 
            </tr>
            <tr>
              <td colspan="7" align="right"><a href="index.php?ctl=editProveedor&id=<?php echo $proveedor['id_proveedor']?>">editar</a></td>
            </tr>
          </table> 
          <!--
          <table>
            <tr>
              <td colspan="7" align="right"><input type="submit" value="insertar" name="insertar" /></td>
            </tr>
          </table>--> 
             
      </div>

 <?php $contenido = ob_get_clean() ?>

 <?php include './app/templates/layout.php' ?>