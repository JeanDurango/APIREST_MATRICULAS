<?php
//creamos los 4 EndPoint para la tabla departamento
//invocamos las cabeceras para dar permisos de ejecuacion a los
// llamados de la api desde cualquier aplicacion

header('Access-Control-Allow-Origin: *');
header('Access-Control-Credential: true');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Acess-Control-Allow-Headers: Origin, Content-Type,
X-Auth-Token, Authorization');

//Invocamos la conexion
include '../Conexion/parametrosDB.php';

//Abrir conexion
$conn = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

//Metodos
//vamos a comvertir la informacion que queda en la conexion $conn a formato JSON

$json = file_get_contents('php://input');
$obj = json_decode($jason, true);

//Creamos variables de la tabla departamentos
$id_departamento = $obj['id_Departamento'];
$nombre = $obj['Nombre'];

//Instruciones SQL
//Insertar ------------------
$sql_query = "INSER INTO tbldepartamento (id_Departamento, Nombre)
VALUES ($id_departamento, $nombre)";

//Ejecutamos la instruccion
if(mysqli_query($conn, $sql_query)){
    $mensaje = "Insertado con exito!";
    $json = json_encode($mensaje);
    echo $json;
}else{
    echo "Error!";
};

?>