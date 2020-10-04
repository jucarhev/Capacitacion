<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon" />

	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/reset.css">
	<link rel="stylesheet" type="text/css" href="assets/fontawesome/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<title>Login</title>
</head>
<body>
	
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">No Menu</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Login</a>
			</div>
		</div>
		</div>
	</nav>

	<header id="header">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h1>Sign in <i class="fa fa-sign-in white" aria-hidden="true"></i> </h1>
				</div>
			</div>
		</div>
	</header>

	<section class="main">
		<div class="container">
			<div class="row">
				
				<div class="col-md-4 col-md-offset-4">

					<div class="panel panel-default">
						<div class="panel-heading main-color-bg">
							<h3>Sign in</h3>
						</div>
						<div class="panel-body">
							<form action="core/login.session.php" method="POST" role="form">
								<div class="form-group">
									<label for="">E-mail</label>
									<input type="email" class="form-control" id="email" name="email" placeholder="Ingrese email">
								</div>
								<div class="form-group">
									<label for="">Password</label>
									<input type="password" class="form-control" id="password" name="password" placeholder="Ingrese Password">
								</div>
							
								<button type="submit" class="btn btn-primary">Iniciar session</button>
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
	<footer id="footer">
		<div class="container">
			Todos lo derechos reservador &copy; 2019
		</div>
	</footer>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.js"></script>

</body>
</html>