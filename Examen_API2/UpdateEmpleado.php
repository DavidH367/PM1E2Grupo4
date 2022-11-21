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
    $item->id = $data->id;
    $item->nombres = $data->nombres;
    $item->apellidos = $data->apellidos;
    $item->edad = $data->edad;
    $item->direccion = $data->direccion;

    if($item->updateUsuario())
        {
            echo json_encode
            (
                array("codigo"=> "00", "message"=> "Empleado actualizado")

            );
        }
    else
    {
        echo json_encode
        (
            array("codigo"=> "03", "message"=> "Empleado no se pudo actualizar ")

        );


    }
}
else
{
    echo json_encode
    (
        array("codigo"=> "04", "message"=> "Sin informacion por actualizar")

    );



}



?>