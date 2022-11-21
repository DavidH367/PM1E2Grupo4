package com.example.pm2e1grupo3.Models;

public class RestApiMethods {
    private static final String ipaddress = "192.168.1.23/";
    public static final String StringHttp = "http://";


    //EndPoint Urls
    private static final String CreateUsuario = "Examen_API2/CrearUsuario.php";
    private static final String GETUsuario = "Examen_API2/ListaUsuario.php";
    private static final String UpdateUsuarios = "Examen_API2/UpdateEmpleado.php";
    private static final String DeleteUsuarios = "Examen_API2/DeleteEmpleado.php";




    public static final String EndPointCreateUsuario = StringHttp + ipaddress + CreateUsuario;
    public static final String EndPointGetUsuario = StringHttp + ipaddress + GETUsuario;
    public static final String EndPointUpdateUsuario = StringHttp + ipaddress + UpdateUsuarios;
    public static final String EndPointDeleteUsuario = StringHttp + ipaddress + DeleteUsuarios;
}
