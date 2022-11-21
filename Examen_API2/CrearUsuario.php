<?php 
    

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");



include_once "Database.php"; //Se incluye archivo php
include_once "Usuarios.php";

$database = new Database();
$db = $database-> getConnection();

$item = new Usuarios($db);


$data = new Usuarios($db);
$data= json_decode(file_get_contents("php://input"));


if (isset($data))
{
    $item->nombre = $data->nombre;
    $item->telefono = $data->telefono;
    $item->latitud = $data->latitud;
    $item->longitud = $data->longitud;
    $item->foto = $data->foto;


    if($item->createUsuario())
    {
        echo json_encode
        (
            array("codigo"=> "00", "message"=> "Empleado ingresado con exito")

        );
    }
else
{
    echo json_encode
    (
        array("codigo"=> "01", "message"=> "Empleado no se pudo crear ")

    );

}

}
else
{
    echo json_encode
    (
        array("codigo"=> "02", "message"=> "Sin informacion por procesar")

    );



}
?>