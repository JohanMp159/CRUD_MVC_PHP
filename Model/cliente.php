<?php
class  Cliente{
    //Atributos
    private $idCliente; 
    private $nombre;
    private $apellido;
    private $telefono;
    private $fechaNacimiento;
    private $email;
    private $genero;
    private $idUsuario;

    //Definir el constructor
    public function __construct(){}

    //Definicion de métodos sets, Es decir asignar valores a los atributos.
    public function setidCliente($idCliente){
         $this->idCliente = $idCliente;
    }
    public function setnombre($nombre){
         $this->nombre = $nombre;
    }
    public function setapellido($apellido){
         $this->apellido = $apellido;
    }
    public function settelefono($telefono){
         $this->telefono = $telefono;
    }
    public function setfechaNacimiento($fechaNacimiento){
         $this->fechaNacimiento = $fechaNacimiento;
    }
    public function setemail($email){
         $this->email = $email;
    }
    public function setgenero($genero){
         $this->genero = $genero;
    }
	public function setidUsuario($idUsuario){
         $this->idUsuario = $idUsuario;
    }

    //Definición de métodos get
    public function getidCliente(){
        return $this->idCliente;
    }
    public function getnombre(){
        return $this->nombre;
    }
    public function getapellido(){
        return $this->apellido;
    }
    public function gettelefono(){
        return $this->telefono;
    }
    public function getfechaNacimiento(){
        return $this->fechaNacimiento;
    }
    public function getemail(){
        return $this->email;
    }
    public function getgenero(){
        return $this->genero;
    }
	public function getidUsuario(){
        return $this->idUsuario;
    }

}

?>