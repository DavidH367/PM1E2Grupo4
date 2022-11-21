<?php

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once "Database.php"; //Se incluye archivo php
    include_once "Usuarios.php";

    $database = new Database();
    $db = $database-> getConnection();

    $item = new Usuarios($db);
    $stmt = $item->getUsuario();



    if ($stmt-> rowCount()>0)
    {
        $arreglousu = array();
        $arreglousu ["usuario"] = array();

        while ($row = $stmt-> fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            $val = array
            (
                "id" => $id,
                "nombre" => $nombre,
                "telefono" => $telefono,
                "latitud" => $latitud,
                "longitud" => $longitud,
                "foto" => $foto


            );

            array_push($arreglousu["usuario"],$val);

        }

        echo json_encode($arreglousu);

    }


?>