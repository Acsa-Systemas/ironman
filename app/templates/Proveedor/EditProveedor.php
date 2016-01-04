<?php ob_start() ?>
<?php 
$proveedor;
  if(isset($params['proveedor'][0])){
    $proveedor= $params['proveedor'][0];
  }
  else{
    header('Location:  index.php?ctl=listar');
  }
  
 
?>

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

    <h2>Registro de Proveedores</h2>
          <form action="index.php?ctl=editProveedor" method="post">
            <input type="hidden" id="id_proveedor" name="id_proveedor" value="<?php echo $proveedor['id_proveedor']?>" />
          <table>
            <tr>
              <td class="altos">Nombre</td>
              <td class="altos">Razon Social</td>
              <td class="altos">RFC</td>
            </tr>
            <tr>
              <td class="bajos"><input type="text" id="nombre" name="nombre" value="<?php echo $proveedor['nombre']?>" /></td>
              <td class="bajos"><input type="text" id="razon_social" name="razon_social" value="<?php echo $proveedor['razon_social']?>" /></td>
              <td class="bajos"><input type="text" id="rfc" name="rfc" value="<?php echo $proveedor['rfc']?>"/></td>
            </tr>
          </table> 
          <br />
          <h2>Datos Bancarios</h2>
          <table>
            <tr>
              <td class="altos">Banco</td>
              <td class="altos">No. de Cuenta</td> 
              <td class="altos">No. de Transferencia</td>
            </tr>
            <tr>
              <td class="bajos"><input type="text" id="banco" name="banco" value="<?php echo $proveedor['banco']?>"/></td>
              <td class="bajos"><input type="text" id="no_cta" name="no_cta" value="<?php echo $proveedor['no_cta']?>"/></td> 
              <td class="bajos"><input type="text" id="no_trans" name="no_trans" value="<?php echo $proveedor['no_trans']?>"/></td> 
            </tr>
          </table> 

          <table>
            <tr>
              <td colspan="7" align="right"><input type="submit" value="Guardar" name="Guardar" /></td>
            </tr>
          </table>    
    </form>
  </div>


 <?php $contenido = ob_get_clean() ?>

 <?php include './app/templates/layout.php' ?>