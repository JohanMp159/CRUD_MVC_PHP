<?php 
include_once('../Model/cliente.php');
include_once('../Model/crud_cliente.php');

class ControladorCliente{
	public function __contruct(){
		
	}

	public function listarCliente(){
		$crudCliente = new crudCliente();
	 	$listaCliente = $crudCliente->listarCliente();
	 	return $listaCliente;
 	}
	
	public function regristrarCliente($nombre,$apellido,$telefono,$fechaNacimiento,$email,$sexo,$idUsuario){
		$cliente = new Cliente();
		$cliente->setidCliente('');
		$cliente->setnombre($nombre);
		$cliente->setapellido($apellido);
		$cliente->settelefono($telefono);
		$cliente->setfechaNacimiento($fechaNacimiento);
		$cliente->setemail($email);
		$cliente->setgenero($sexo);
		$cliente->setidUsuario($idUsuario);
		
		$crudCliente = new crudCliente();
		$registarCliente = $crudCliente->registrarCliente($cliente);
	}
	
	public function desplegarVista($pagina){
		header("Location: ../Views/".$pagina);
	}
	
	public function buscarCliente($idCliente){
		$cliente = new Cliente();
		$cliente->setidCliente($idCliente);
		
		$crudCliente = new crudCliente();
		$datosCliente = $crudCliente->buscarCliente($cliente);
		
		$cliente->setnombre($datosCliente['nombre']);
		$cliente->setapellido($datosCliente['apellido']);
		$cliente->settelefono($datosCliente['telefono']);
		$cliente->setfechaNacimiento($datosCliente['fechaNacimiento']);
		$cliente->setemail($datosCliente['email']);
		$cliente->setgenero($datosCliente['genero']);
		$cliente->setidUsuario($datosCliente['idUsuario']);
		
		return $cliente;
	}
	
	public function actualizarCliente($idCliente,$nombre,$apellido,$telefono,$fechaNacimiento,$email,$genero,$idUsuario){
		$cliente = new Cliente();
		$cliente->setidCliente($idCliente);
		$cliente->setnombre($nombre);
		$cliente->setapellido($apellido);
		$cliente->settelefono($telefono);
		$cliente->setfechaNacimiento($fechaNacimiento);
		$cliente->setemail($email);
		$cliente->setgenero($genero);
		$cliente->setidUsuario($idUsuario);
		
		$crudCliente = new crudCliente();
		$actualizarCliente = $crudCliente->actualizarCliente($cliente);
	}
	
	public function eliminarCliente($idCliente){
		$cliente = new Cliente();
		$cliente->setidCliente($idCliente);
		
		$crudCliente = new crudCliente();
		$eliminarCliente = $crudCliente->eliminarCliente($cliente);
	}
}

$controladorCliente = new ControladorCliente();
$listaCliente = $controladorCliente->listarCliente();

if(isset($_POST['Registrar'])){
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$telefono = $_POST['telefono'];
	$fechaNacimiento = $_POST['fechaNacimiento'];
	$email = $_POST['email'];
	$sexo = $_POST['sexo'];
	$idUsuario = $_POST['idUsuario'];
	
	$controladorCliente->regristrarCliente($nombre,$apellido,$telefono,$fechaNacimiento,$email,$sexo,$idUsuario);
	
	if($controladorCliente){
		echo '<script> confirm("Usuario Registrado!") </script>';
	} else{
		echo '<script> alert("Ocurrio un error, intentelo nuevamente!") </script>';
	}
}
else if(isset($_POST['Editar'])){
	$idCliente = $_POST['idCliente'];
	$controladorCliente->desplegarVista('editar_cliente.php?idCliente='.$idCliente);
}
else if(isset($_REQUEST['views'])){
	$controladorCliente->desplegarVista($_REQUEST['views']);
}
else if(isset($_POST['Actualizar'])){
	$idCliente = $_POST['idCliente'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$telefono = $_POST['telefono'];
	$fechaNacimiento = $_POST['fechaNacimiento'];
	$email = $_POST['email'];
	$genero = $_POST['genero'];
	$idUsuario = $_POST['idUsuario'];
	
	$controladorCliente->actualizarCliente($idCliente,$nombre,$apellido,$telefono,$fechaNacimiento,$email,$genero,$idUsuario);
}
else if(isset($_POST['Eliminar'])){
	$idCliente = $_POST['Eliminar'];
	var_dump($idCliente);
	$controladorCliente->eliminarCliente($idCliente);
}


?>

