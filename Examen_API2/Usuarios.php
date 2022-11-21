<?php

    
class Usuarios 
{

    //Objeto de Conexion
    private $conexion;

    //Tabla
    private $dbtabla = "usuarios";
    public $id;
    public $nombre;
    public $telefono;
    public $latitud;
    public $longitud;
    public $foto;

    public function __construct($db)
    {

        $this->conexion = $db;

    }



     //READ
    public function getUsuario()
    {
        $consulta = "SELECT id, nombre, telefono, latitud, longitud, foto FROM " .  $this->dbtabla . "";

        $stmt = $this->conexion->prepare($consulta);
        $stmt-> execute();
        return $stmt;

    }

    public function createUsuario()
    {
        $consulta= "INSERT INTO " . $this->dbtabla . 
        "
        SET 
        nombre = :nombre,
        telefono = :telefono,
        latitud = :latitud,
        longitud = :longitud,
        foto = :foto";

        $stmt = $this->conexion->prepare($consulta);

        //SANITIZACION

        $this->nombre=htmlspecialchars(strip_tags($this->nombre));
        $this->telefono=htmlspecialchars(strip_tags($this->telefono));
        $this->latitud=htmlspecialchars(strip_tags($this->latitud));
        $this->longitud=htmlspecialchars(strip_tags($this->longitud));
        $this->foto=htmlspecialchars(strip_tags($this->foto));

        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":telefono", $this->telefono);
        $stmt->bindParam(":latitud", $this->latitud);
        $stmt->bindParam(":longitud", $this->longitud);
        $stmt->bindParam(":foto", $this->foto);

        if ($stmt->execute())
        {
            return true;
        }
        else{
            return false;
        }

    }

    //Update

    public function updateUsuario()
    {

        $consulta= "UPDATE" . $this->dbtabla . 
        "
        SET 
        nombre = :nombre,
        telefono = :telefono,
        latitud = :latitud,
        longitud = :longitud,
        foto = :foto,
        where id= :id";

        $stmt = $this->conexion->prepare($consulta);

        //SANITIZACION

        $this->nombre=htmlspecialchars(strip_tags($this->nombre));
        $this->telefono=htmlspecialchars(strip_tags($this->telefono));
        $this->latitud=htmlspecialchars(strip_tags($this->latitud));
        $this->longitud=htmlspecialchars(strip_tags($this->longitud));
        $this->foto=htmlspecialchars(strip_tags($this->foto));

        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":telefono", $this->telefono);
        $stmt->bindParam(":latitud", $this->latitud);
        $stmt->bindParam(":longitud", $this->longitud);
        $stmt->bindParam(":foto", $this->foto);

        if ($stmt->execute())
        {
            return true;
        }
        else{
            return false;
        }
        
    }


    public function deleteUsuario()
    {

        $consulta= "DELETE FROM" . $this->dbtabla ." where id= :id";

        $stmt = $this->conexion->prepare($consulta);

        //SANITIZACION

        $this-> id = htmlspecialchars(strip_tags($this-> id));
        $stmt-> bindParam(":id",$this->id);
       

        if ($stmt->execute())
        {
            return true;
        }
        else{
            return false;
        }            
    }

}

 
?>