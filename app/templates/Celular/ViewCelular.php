<?php ob_start() ?>
<?php $auto= $params['automovil']?>

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

    <form action="" method="post">
        <fieldset>
            <legend>Datos de Celular</legend>
            <table>
              <tr>
                <td class="altos">Compañia</td>
                <td class="altos"># telefonico</td>
                <td class="altos"># de cuenta</td>
                  
              </tr>
              <tr>
                <td class="bajos"><input type="text" id="compania" name="compania" value="<?php echo $params['compania']?>" /></td>
                <td class="bajos"><input type="text" id="telefono" name="telefono" value="<?php echo $params['telefono']?>"/></td>
                <td class="bajos"><input type="text" id="num_cuenta" name="num_cuenta" value="<?php echo $params['num_cuenta']?>"/></td>
                  
              </tr>
              <tr>
                
                <td class="altos"  colspan="1">Empresa Adminstradora</td>
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
            </table>
        </fieldset>
    </form>


 <?php $contenido = ob_get_clean() ?>

 <?php include '/app/templates/layout.php' ?>