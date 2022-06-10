<?php 

session_start();

require_once('../Model/crud_usuario.php');
require_once('../Model/usuario.php');

class ControladorUsuario{
	public function construct(){
		
	}
	
	public function validarAcceso($email,$contrasenia){
		$usuario = new Usuario();
		$usuario->setemail($email);
		$usuario->setcontrasenia(hash('sha512',$contrasenia));
		$usuario->setlogueado(false);
		
		$crudUsuario = new CrudUsuario();
		$crudUsuario->validarAcceso($usuario);
		
		if($usuario->getlogueado() == true){
			$_SESSION['idRol'] = $usuario->getidRol();
			$_SESSION['email'] = $usuario->getemail();
			header('Location: ../Views/listar_cliente.php');
		}else{
			echo '
				<script>
					alert("Usuario y/o contraseña incorrectos");
					location.href="../index.php";
				</script>
			';
		}
	}
	
	public function cerrarSesion(){
		session_destroy();
		header('Location: ../index.php');
	}
}

$controladorUsuario = new ControladorUsuario();

if(isset($_POST['Acceder'])){
	$email = $_POST['email'];
	$contrasenia = $_POST['contrasenia'];
	
	$controladorUsuario->validarAcceso($email,$contrasenia);
}else if(isset($_REQUEST['logOut'])){
	$controladorUsuario->cerrarSesion();
}


?>