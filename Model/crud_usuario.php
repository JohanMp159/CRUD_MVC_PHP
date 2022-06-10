<?php 

include('conexion.php');

class crudUsuario{
	
	public function validarAcceso($usuario){
		$baseDatos = Conexion::conectar();
		$sql= $baseDatos->query('SELECT * FROM usuarios WHERE email="'.$usuario->getemail().'" AND contrasenia="'.$usuario->getcontrasenia().'"');
		try{
			$sql->execute();
			if($sql->rowCount()> 0){
				$datosUsuario = $sql->fetch();
				$usuario->setlogueado(true);
				$usuario->setidRol($datosUsuario['idRol']);
			}
		}catch(Exception $e){
			echo '<script>
					alert('.$e.');
				</script>';
		}
		
		//Conexion::desconectar();
		return($sql->fetch());
	}
}

?>