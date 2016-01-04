 <?php
 //develop
        //     $mvc_bd_hostname = "localhost";
            //  $mvc_bd_nombre   = "proyectos";
            //  $mvc_bd_usuario  = "postgres";
            //  $mvc_bd_clave    = "qwerty";
        //

        //production
            $mvc_bd_hostname_pg = "192.168.1.244";
            $mvc_bd_nombre_pg   = "proyectos";
            $mvc_bd_usuario_pg  = "postgres";
            $mvc_bd_clave_pg    = "Acsa.2014";
        //

        $dbconn = pg_connect("host=".$mvc_bd_hostname_pg." port=5432 dbname=".$mvc_bd_nombre_pg." user=".$mvc_bd_usuario_pg." password=".$mvc_bd_clave_pg);

        //$dbconn = pg_connect("host=localhost port=5432 dbname=proyectos user=postgres password=qwerty");

        $query = "select num_proy,nombre_corto from proyectos.proy where status_construccion = 1"; 

            $result = pg_query($query); 
            if (!$result) { 
                echo "Problem with query " . $query . "<br/>"; 
                echo pg_last_error(); 
                exit(); 
            }
            $proyectos=array();
            while($row = pg_fetch_assoc($result)) { 
                 $proyectos[] = $row;    
                }


                //print_r($proyectos);
        echo json_encode($proyectos);
?>