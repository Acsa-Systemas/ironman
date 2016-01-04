<?php ob_start() ?>

    <div style="float:center">
         <table border="1" width="50%">
             <tr>
                 <th>Nombre de equipo</th>
                 <th>Modelo</th>
                 
             </tr>
             <?php foreach ($params['equipos'] as $equipo) :?>
             <tr>
                <td><a href="index.php?ctl=ver&id=<?php echo $equipo['id_equipo']?>"><?php echo $equipo['nombre_equipo'];?></a></td>
                <td><?php echo $equipo['modelo']?></td>
             </tr>
             <?php endforeach; ?>

         </table>
    </div> 


 <?php $contenido = ob_get_clean() ?>

 <?php include 'layout.php' ?>