<?php 

echo '	
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
		<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
		<link rel="stylesheet" href="assets/css/login_styles.css">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	</head>
	<body>
	<header>
	</header>
		<div class="container">
			<div class="forms">
				<div class="form login">
					<span class="title">Inicio de sesión:</span>
					<form action="Controller/controlador_usuario.php" method="POST">
						<div class ="input-field">
							<input type="text" name="email" placeholder="Ingresa tu Email" required>
							<i class="uil uil-envelope icon"></i>
						</div>
						<div class ="input-field">
							<input type="password" name="contrasenia" class="password" placeholder="Ingresa tu contraseña" required>
							<i class="uil uil-lock icon"></i>
							<i class="uil uil-eye-slash showHidePw"></i>
						</div>
						<div class="checkbox-text">
							<div class="chechbox-content">
								<input type="checkbox" id="logCheck">
								<label for="logCheck" class="text">Recordarme</label>
							</div>
							<a href="#" class="text">Forgot password?</a>
						</div>
						<div class ="input-field button">
							<input type="submit" name="Acceder" value="INICIAR SESIÓN">
						</div>
					</form>
					<div class="login-signup">
						<span class="text">No tienes una cuenta? 
							<a href="#" class="text signup-link"> Registrate </a>
						</span>
					</div>
				</div>

				<!--Registration Form-->
				<div class="form signup">
					<span class="title">Registration</span>
					<form action="#">
						<div class ="input-field">
							<input type="text" placeholder="Ingresa tu nombre" required>
							<i class="uil uil-user"></i>
						</div>
						<div class ="input-field">
							<input type="text" placeholder="Ingresa tu email" required>
							<i class="uil uil-envelope icon"></i>
						</div>
						<div class ="input-field">
							<input type="password" class="password" placeholder="Crea tu contraseña" required>
							<i class="uil uil-lock icon"></i>
						</div>
						<div class ="input-field">
							<input type="password" class="password" placeholder="confirma tu contraseña" required>
							<i class="uil uil-lock icon"></i>
							<i class="uil uil-eye-slash showHidePw"></i>
						</div>
						
						<div class ="input-field button">
							<input type="button" name="Crear" value="CREAR">
						</div>
					</form>
					<div class="login-signup">
						<span class="text">Ya tienes una cuenta?  
							<a href="#" class="text login-link"> Ingresa </a>
						</span>
					</div>
				</div>
			</div>
		</div>
		<script src="assets/js/login.js"></script>
	</body>
	</html>
	'
?>

