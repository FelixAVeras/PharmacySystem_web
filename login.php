<?php

session_start();

if (isset($_SESSION["username"])) { 
	header("location: dashboard.php"); 
	exit(); 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>GoodPharmacy - Inicio de Sesión</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<link rel="stylesheet" href="css/login.css">
</head>
<body>
	
	<div class="container fw-bold  form-login">
		<h1 class="text-center mb-3">GoodPharmacy</h1>
		<!-- <h3 class="text-muted text-center"></h3> -->

		<div class="row mt-5">
			<div class="col-12 col-md-4"></div>
			<div class="col-12 col-md-4 ">
				<div class="card login mb-3">
					<h4 class="card-header text-center text-white p-4">Inicio de Sesion</h4>
					<div class="card-body mt-3">
						<form action="" id="login-form" method="POST">
							<div class="form-group mb-3 text-white">
								<label for="username" class="mb-2">Nombre de Usuario</label>
								<div class="input-group mb-3">
								  <span class="input-group-text" id="basic-addon1">
								  	<i class="bi bi-person-fill"></i>
								  </span>
								  <input type="text" class="form-control" id="username" name="username">
								</div>
							</div>
							<div class="form-group mb-3 text-white">
								<label for="password" class="mb-2">Contraseña</label>
								<div class="input-group mb-3">
								  <span class="input-group-text" id="basic-addon1">
								  	<i class="bi bi-lock-fill"></i>
								  </span>
								  <input type="password" class="form-control" id="password" name="password">
								</div>
							</div>
							<div class="mt-4 mb-3 d-flex justify-content-center gap-2">
								<button type="button" id="btnSubmit" class="btn btn-iniciar w-75 border-3">Iniciar</button>
							</div>
						</form>
					</div>
				</div>
				<a href="passwordRecovery.php" class="mt-5 text-decoration-none linkC">Olvide mi contraseña?</a>
			</div>
			<div class="col-12 col-md-4"></div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="./js/auth.js"></script>
</body>
</html>