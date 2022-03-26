<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Credential: true');
    header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    header('Access-Control-Max-Age: 1000');
    header('Acess-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token, Authorization');

    // vamos a incluir a la base de datos 
    include '../Conexion/ParametrosDB.php';

    //Abrir conexion
    $conn = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

    // vamos avalidar la conexion 
    if ($conn->connect_error)
        {
          die("La conexion no se pudo realizar...".$conn->connect_error);
        }
        else
        {
            // ahora vamos a construir la consulta para visualizatr todos los registro 
            $sql = "Select * from Tbldepartamento";
            // ahora la ejecutamos
            $result = $conn->query($sql);
            // vamos a verificar si tiene registros o no 
            if($result->num_rows >0)
            {
               //pasemos los deatos recuperados a un vector 
               while($row[] = $result->fetch_assoc())
               {
                  //vamos a separ registros 1 a 1 
                  $item = $row;
                  // vamos a comvertir este registro a json 
                  $json = json_encode($item);                     
               }
            }
            else
            {
                echo "La consulta no tiene registro";
            }
            echo $json; //Muestro los datos en formato Json
            // cerrar la conexion a la base de datos 
            $conn->close();
        }
?>