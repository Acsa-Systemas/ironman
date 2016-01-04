
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  
  <script type="text/javascript">
//     $(function() {
//         var availableTags = ;
//         $("#tags").autocomplete({
//             source: availableTags,
//             autoFocus:true
//         });
//     });
   </script>


  <?php ob_start() ?>
 


 <?php if(isset($params['mensaje'])) :?>
 <b><span style="color: red;"><?php echo $params['mensaje'] ?></span></b>
 <?php endif; ?>
 <br/>
 <form action="index.php?ctl=verProveedor" method="POST">
   <table>
     <tr>
        <td align="right">Proveedor:</td>
        <td>
            <select id="id" name="id" class="custom-select">
              <option>Seleccione uno</option>
              <?php foreach ($params['proveedores'] as $empleado) :?>
                <option value="<?php echo $empleado['id_proveedor']; ?>"><?php echo $empleado['nombre']; ?></option>
              <?php endforeach; ?>
            </select>            
        </td>
        <td>
             <input type="submit" value="Ir">
        </td>
     </tr>
   </table>
 </form>
 <!--
 <div class="ui-widget">
  <label for="tags">Tags: </label>
  <input id="tags">
</div>
 -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="./js/jquery-customselect-1.9.1.js"></script>
  <link href="./web/css/jquery-customselect-1.9.1.css" rel="stylesheet" />

  <!--<script src="datepicker/js/bootstrap-datepicker.js"></script>-->
      <script type="text/javascript">
          $(document).ready(function() {
              $("#id").customselect();
          });
      </script>



 <?php $contenido = ob_get_clean() ?>

 <?php include './app/templates/layout.php' ?>