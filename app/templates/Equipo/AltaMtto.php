<?php ob_start() ?>
<?php $equipo= $params['equipo']?>

<style>
body{color:#9C3100;}

.bajos{color:#000; padding: 6px;}
.altos{color:#9C3100;
font-size:14px;
font:bold;
padding: 6px;}
td{text-transform:capitalize;}
table{
	background-color:rgba(158, 158, 158, 0.25);
  
}
.contenido{
  position: absolute;
  
  left: 50%; /* Buscamos el centro vertical (relativo) del navegador */
  width: 800px; /* Definimos el ancho del objeto a centrar */
  margin-left: -400px; 
}
</style>

    
<form action="index.php?ctl=addEquipo" method="post">
      <div class="contenido">
        
          <h2>Caracteristicas del Equipo <?php echo $equipo['nombre_equipo']?></h2>
          <table>
            <tr>
              <td class="altos">Procesador</td>
              <td class="altos">Memoria</td> 
              <td class="altos">Disco Duro</td>
            </tr>
            <tr>
                <td class="bajos"><input type="text" id="procesador" name="procesador" value="<?php echo $equipo['procesador']?>"/></td>
                <td class="bajos" colspan="1">
                    <select id="memoria" name="memoria">
                        <option value="">Seleccione Uno</option>
                        <option value="2">2</option>
                        <option value="4">4</option>
                        <option value="6">6</option>
                        <option value="8">8</option> 
                        <option value="12">12</option>
                        <option value="16">16</option>                          
                    </select>
                 </td>
        <td class="bajos"><input type="text" id="dd" name="dd" value="<?php echo $equipo['dd']?>"/></td> 
            </tr>
            <tr>
              <td colspan="3">

              </td>
            </tr>
          </table> 
      </div>
    </form>


<?php $contenido = ob_get_clean() ?>

<?php include './app/templates/layout.php' ?>