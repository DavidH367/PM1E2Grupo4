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
        if($item->deleteUsuario())
        {
            echo json_encode
            (
                array("codigo"=> "00", "message"=> "Empleado eliminado con exito")

            );
        }
        else
        {
            echo json_encode
            (
                array("codigo"=> "05", "message"=> "Empleado no se pudo eliminar ")

            );


        }

    }
    else
    {
        echo json_encode
        (
            array("codigo"=> "06", "message"=> "Sin informacion por eliminar")

        );



    }






?>