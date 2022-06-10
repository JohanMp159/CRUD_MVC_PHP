<?php
require_once('conexion.php');

class crudCliente{
    public function __construct(){}

    public function listarCliente(){
        $baseDatos = Conexion::conectar();
        $sql = $baseDatos->query('SELECT * FROM clientes');
        $sql->execute();
        Conexion::desconectar($baseDatos);
        return($sql->fetchAll()); //Retornar el resultado de la consulta
    }
	
	public function registrarCliente($cliente){
		$mensaje = "";
		$baseDatos = Conexion::conectar();
		$sql = $baseDatos->prepare('INSERT INTO clientes (idCliente,nombre,apellido,telefono,fechaNacimiento,email,genero,idUsuario)VALUES(:idCliente,:nombre,:apellido,:telefono,:fechaNacimiento,:email,:genero,:idUsuario) '); //e: = datos de entrada (versatil, indicamos los atributos)
		$sql->bindValue('idCliente',$cliente->getidCliente());//bindValue(Primer parametro es el valor enviado, el segudo parametro es donde obtenemos la variable)
		$sql->bindValue('nombre',$cliente->getnombre());
        $sql->bindValue('apellido',$cliente->getapellido());
        $sql->bindValue('telefono',$cliente->gettelefono());
        $sql->bindValue('fechaNacimiento',$cliente->getfechaNacimiento());
        $sql->bindValue('email',$cliente->getemail());
        $sql->bindValue('genero',$cliente->getgenero());
		$sql->bindValue('idUsuario',$cliente->getidUsuario());
		
		try{
			$sql->execute();
			$mensaje = "Registro exitoso";
		} catch (Exception $excepcion) {
			echo $excepcion->getMessage();
		}
        
		Conexion::desconectar($baseDatos);
		return $mensaje;
	}
	
	public function buscarCliente($cliente){
        $baseDatos = Conexion::conectar();
        $sql = $baseDatos->query('SELECT * FROM clientes WHERE idCliente="'.$cliente->getidCliente().'"');
        $sql->execute();
        Conexion::desconectar($baseDatos);
        return($sql->fetch()); 
    }

     public function actualizarCliente($cliente){
	 	$baseDatos = Conexion::conectar();
	 	$sql = $baseDatos->prepare('UPDATE clientes SET idCliente=:idCliente, nombre=:nombre, apellido=:apellido, telefono=:telefono, fechaNacimiento=:fechaNacimiento, email=:email, genero=:genero, idUsuario=:idUsuario WHERE idCliente = :idCliente'); 
	 	$sql->bindValue('idCliente',$cliente->getidCliente());
		$sql->bindValue('nombre',$cliente->getnombre());
        $sql->bindValue('apellido',$cliente->getapellido());
        $sql->bindValue('telefono',$cliente->gettelefono());
        $sql->bindValue('fechaNacimiento',$cliente->getfechaNacimiento());
        $sql->bindValue('email',$cliente->getemail());
        $sql->bindValue('genero',$cliente->getgenero());
		$sql->bindValue('idUsuario',$cliente->getidUsuario());
		
	 	try{
	 		$sql->execute();
	 		echo '<script> 
					alert("Actualización exitosa!");
					location.href = "../Views/listar_cliente.php";
				</script>';
            //header('Location: ../Views/listar_cliente.php');
	 	} catch (Exception $excepcion) {
	 		echo $excepcion->getMessage();
            echo '<script> confirm("Hubo problemas en la actualización!") </script>';
	 	} finally {
		
		}
        
	 	Conexion::desconectar($baseDatos);
	 }
	
     public function eliminarCliente($cliente){
		$baseDatos = Conexion::conectar();
		$sql = $baseDatos->prepare('DELETE FROM clientes WHERE idCliente = :idCliente');
		$sql->bindValue('idCliente',$cliente->getidCliente());
		 
		 try{
			$sql->execute();
			echo '<script> 
					alert("Eliminacion exitosa!");
					location.href = "../Views/listar_cliente.php"
				</script>';
		} catch (Exception $excepcion) {
			echo $excepcion->getMessage();
			echo '<script> alert("Problemas en la eliminación!") </script>';
			
		}        
			Conexion::desconectar($baseDatos);
		}

}

?>