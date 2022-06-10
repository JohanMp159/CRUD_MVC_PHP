<?php

class Conexion{
    private static $conexion = NULL;
    private function __construct(){} 

    public static function conectar(){
        $pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
        self::$conexion = new PDO('mysql:host=localhost;dbname=enfocanica','root','',$pdo_options);
        return self::$conexion;
    }

    static function desconectar(&$conexion){
        $conexion = null;
    }
}

$baseDatos = Conexion::conectar();

?>