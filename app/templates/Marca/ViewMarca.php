<?php ob_start() ?>
<?php $marca= $params['marca']?>
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
    <table>
      <tr>
        <td class="altos">Nombre</td>
      </tr>
      <tr>
        <td class="bajos"><input type="text" id="nombre" name="nombre" value="<?php echo $marca['nombre']?>" /></td> 
      </tr>
      <tr>
        <td colspan="7" align="right"><a href="index.php?ctl=editMarca&id=<?php echo $marca['marca_id']?>">Editar</a></td>
      </tr>
    </table>
  </div>

 <?php $contenido = ob_get_clean() ?>

 <?php include './app/templates/layout.php' ?>