<?php ob_start() ?>

<style>
body{color:#9C3100;}

.bajos{color:#000;}
.altos{color:#9C3100;
font-size:14px;
font:bold;}
td{text-transform:capitalize;}
table{
	background-color:rgba(158, 158, 158, 0.25);}
</style>

    <form action="index.php?ctl=addAuto" method="post">
        <fieldset>
            <legend>Alta de Equipo</legend>
            <table>
              <tr>
                <td class="altos">Modelo</td>
                <td class="altos">#  deSerie</td>
                <td class="altos">Procesador</td>
                <td class="altos">Memoria</td>  
              </tr>
              <tr>
                <td class="bajos"><input type="text" id="modelo" name="modelo" value="<?php echo $params['modelo']?>" /></td>
                <td class="bajos"><input type="text" id="no_serie" name="no_serie" value="<?php echo $params['no_serie']?>"/></td>
                <td class="bajos"><input type="text" id="procesador" name="procesador" value="<?php echo $params['procesador']?>"/></td>
                <td class="bajos"><input type="text" id="memoria" name="memoria" value="<?php echo $params['memoria']?>"/></td>  
              </tr>
              <tr>
                <td class="altos"  colspan="1"> Adminstradora</td>
                <td class="altos"  colspan="2">Asignado a:</td>
              </tr>
              <tr> 
                <td class="bajos" colspan="1">
                    <select id="razon_social" name="razon_social">
                        <option value="">Seleccione Uno</option>
                        <option value="">ACSA</option>
                        <option value="">MADA</option>                          
                    </select>
                 </td>
                 <td class="bajos" colspan="2">
                    <select id="empleado_id" name="empleado_id">
                          <option value="">Seleccione Uno</option>
                        <?php foreach ($params['empleados'] as $empleado) :?>
                          <option value="<?php echo $empleado['empleado_id']?>" <?php if($empleado['empleado_id']==$params['empleado_id']){ echo "selected";}?> ><?php echo $empleado['nombre']." ".$empleado['apellido_p']." ".$empleado['apellido_m']?></option>
                        <?php endforeach; ?>
                    </select>
                 </td>
              </tr>
              <tr>
                <td colspan="7" align="right"><input type="submit" value="insertar" name="insertar" /></td>
              </tr>
            </table>
        </fieldset>
    </form>


 <?php $contenido = ob_get_clean() ?>

 <?php include '/app/templates/layout.php' ?>