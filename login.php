<?php

include_once './config/connection.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>GoodPharmacy - Inicio de Sesión</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<link rel="stylesheet" href="https://bootswatch.com/5/minty/bootstrap.min.css">
</head>
<body>
	
	<div class="container mt-4">
		<h2 class="text-center">GoodPharmacy</h2>
		<h3 class="text-muted text-center"></h3>

		<div class="row mt-3">
			<div class="col-12 col-md-4"></div>
			<div class="col-12 col-md-4 ">
				<div class="card">
					<h5 class="card-header text-center">Inicio de Sesion</h5>
					<div class="card-body">
						<form action="" method="POST">
							<div class="form-group mb-3">
								<label for="username">Nombre de Usuario</label>
								<div class="input-group mb-3">
								  <span class="input-group-text" id="basic-addon1">
								  	<i class="bi bi-person-fill"></i>
								  </span>
								  <input type="text" class="form-control" name="username">
								</div>
							</div>
							<div class="form-group mb-3">
								<label for="password">Contraseña</label>
								<div class="input-group mb-3">
								  <span class="input-group-text" id="basic-addon1">
								  	<i class="bi bi-lock-fill"></i>
								  </span>
								  <input type="password" class="form-control" name="password">
								</div>
							</div>
							<div class="mt-3 d-grid gap-2">
								<button type="submit" class="btn btn-primary">Iniciar</button>
							</div>
						</form>
					</div>
				</div>
				<a href="passwordRecovery.php" class="mt-4">Olvide mi contraseña?</a>
			</div>
			<div class="col-12 col-md-4"></div>
		</div>
	</div>

</body>
</html>