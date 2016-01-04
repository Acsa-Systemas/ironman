<?php ob_start() ?>

    <div style="float:center">
        <table border="1" width="50%">
            <tr>
                <th>Nombre de Marca</th>
                <th></th>
            </tr>
            <?php foreach ($params['marcas'] as $marca) :?>
                <tr>
                    <td><a href="index.php?ctl=viewMarca&id=<?php echo $marca['marca_id']?>"><?php echo $marca['nombre'];?></a></td>
                    <td colspan="7" align="right"><a href="index.php?ctl=editMarca&id=<?php echo $marca['marca_id']?>">editar</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div> 


 <?php $contenido = ob_get_clean() ?>

 <?php include 'layout.php' ?>