<?php ob_start() ?>

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
.opt_proy{font-size: 12px;
  text-transform:lowercase;
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
        <h2>Registro de Equipo</h2>
          <table>
              <tr>
                <td class="altos">Nombre</td>
                <td class="altos">Marca</td>
                <td class="altos">Modelo</td>
                <td class="altos"># de Serie</td>
              </tr>
              
              <tr>
                <td class="bajos"><input type="text" id="nombre_equipo" name="nombre_equipo" value="<?php echo $params['nombre_equipo']?>" /></td>
                <td class="bajos">
                    <select id="marca_id" name="marca_id">
                          <option value="">Seleccione Uno</option>
                        <?php foreach ($params['marcas'] as $marca) :?>
                          <option value="<?php echo $marca['marca_id']?>" <?php if($marca['marca_id']==$params['marca_id']){ echo "selected";}?> ><?php echo $marca['nombre']?></option>
                        <?php endforeach; ?>
                    </select>
                 </td>
                <td class="bajos"><input type="text" id="modelo" name="modelo" value="<?php echo $params['modelo']?>" /></td>
                <td class="bajos"><input type="text" id="no_serie" name="no_serie" value="<?php echo $params['no_serie']?>"/></td>
              </tr>
          </table> 
          <br />
          <h2>Caracteristicas</h2>
          <table>
            <tr>
              <td class="altos">Procesador</td>
                <td class="altos">Memoria</td> 
                
                <td class="altos">Disco Duro</td>
            </tr>
            <tr>
               <td class="bajos"><input type="text" id="procesador" name="procesador" value="<?php echo $params['procesador']?>"/></td>
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
        <td class="bajos"><input type="text" id="dd" name="dd" value="<?php echo $params['dd']?>"/></td> 
            </tr>
          </table> 
          
          
          <h2>Asignacion de Usuario</h2>
          <table>
              <tr>
                <td class="altos"  colspan="1">Adminstradora</td>
                <td class="altos"  colspan="1">Obra Asignada:</td>      
              </tr>
              <tr> 
                <td class="bajos" colspan="1">
                    <select id="razon_social" name="razon_social" >
                        <option value="">Seleccione Uno</option>
                        <option value="ACSA">ACSA</option>
                        <option value="MADA">MADA</option>                          
                    </select>
                 </td>
                 <td class="bajos" colspan="1">
                    <select   id="obra_id" name="obra_id" style="width:285px;">
                          <option class="opt_proy" value="">Seleccione Uno</option>
                          
                        <?php foreach ($params['proyectos'] as $proyectos) :?>
                          <option class="opt_proy" style="text-transform:capitalize;" value="<?php echo $proyectos['obra_id']?>" <?php if($proyectos['obra_id']==$params['obra_id']){ echo "selected";}?> ><?php echo ucfirst(strtolower($proyectos['nombre']));?></option>
                        <?php endforeach; ?>
                     
                    </select>
                 </td>
              </tr>
            </table>
              <h2>Registro Proveedor</h2>
             <table>
             <tr>
                <td class="altos"  colspan="1">Fecha Compra:</td>
                <td class="altos"  colspan="1">Proveedor:</td>
              </tr>
                <td class="bajos"><input type="text" id="dd" name="dd" value="<?php echo $params['dd']?>"/></td> 
                <td class="bajos" colspan="1">
                    <select id="proveedor_id" name="proveedor_id">
                          <option value="">Seleccione Uno</option>
                          
                        <?php foreach ($params['proveedores'] as $proveedor) :?>
                          <option value="<?php echo $proveedor['id_proveedor']?>" 
                            <?php if($proveedor['id_proveedor']==$params['proveedor_id']){ echo "selected";}?> >
                            <?php echo $proveedor['nombre'];?></option>
                        <?php endforeach; ?>
                      
                    </select>
                </td>
              </tr>
              <tr>
                <td colspan="7" align="right"><input type="submit" value="insertar" name="insertar" /></td>
              </tr>
            </table>
      </div>
    </form>


<?php $contenido = ob_get_clean() ?>

<?php include './app/templates/layout.php' ?>