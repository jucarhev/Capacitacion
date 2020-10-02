<?php 
session_start();
if(!isset($_SESSION['usuario'])) {
	header('Location: login.php'); 
	exit();
}

?>
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

			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="index.html">Dashboard</a></li>
					<li><a href="#" id="unidades_click">Unidades</a></li>
					<li><a href="posts.html">Posts</a></li>
					<li><a href="user.html">User</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					<li><a href="#">Welsome Brad</a></li>
					<li><a href="core/logout.session.php">Logout</a></li>
				</ul>
			</div><!--/.nav-collapse -->

		</div>
	</nav>

	<header id="header">
		<div class="container">
			<div class="row">
				<div class="col-md-10">
					<h1>Dashboard <small><i class="fa fa-cog" aria-hidden="true"></i> Manage your site</small></h1>
				</div>
				<div class="col-md-2">
					<div class="dropdown create">
						<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
						Create content
						<span class="caret"></span>
						</button>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
							<li><a href="#">Add Page</a></li>
							<li><a href="#">Add Post</a></li>
							<li><a href="#">Add User</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</header>

	<section id="breadcrumb">
		<div class="container">
			<ol class="breadcrumb">
				<li class="active">Dashboard</li>
			</ol>
		</div>
	</section>

	<section class="main">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="list-group">
						<a href="index.html" class="list-group-item active main-color-bg">
							<span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
						</a>
						<a href="pages.html" class="list-group-item"> <i class="fa fa-newspaper-o" aria-hidden="true"></i> Pages <span class="badge">44</span></a>
						<a href="posts.html" class="list-group-item"> <i class="fa fa-pencil" aria-hidden="true"></i> Posts <span class="badge">76</span></a>
						<a href="users.html" class="list-group-item"> <i class="fa fa-user" aria-hidden="true"></i> Users <span class="badge">1234</span></a>
					</div>

					<div class="well">
						<h4>Disk space used</h4>
						<div class="progress">
							<div class="progress">
								<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
									60%
								</div>
							</div>
						</div>
					</div>

					<div class="well">
						<h4>Bandwidth used</h4>
						<div class="progress">
							<div class="progress">
								<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
									60%
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-9" id="content_ajax" >
					<div class="panel panel-default">
						<div class="panel-heading main-color-bg">
							<h3 class="panel-title">Website Overview</h3>
						</div>
						<div class="panel-body">
							<div class="col-md-3">
								<div class="well dash-box">
									<h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 203</h2>
									<h4>Pages</h4>
								</div>
							</div>
							<div class="col-md-3">
								<div class="well dash-box">
									<h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 203</h2>
									<h4>Posts</h4>
								</div>
							</div>
							<div class="col-md-3">
								<div class="well dash-box">
									<h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> 203</h2>
									<h4>Users</h4>
								</div>
							</div>
							<div class="col-md-3">
								<div class="well dash-box">
									<h2><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> 203</h2>
									<h4>Visitors</h4>
								</div>
							</div>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading">
							<h3>Users</h3>
						</div>
						<div class="panel-body">
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th>Id</th>
										<th>Name</th>
										<th>Added</th>
										<th>Option</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>Juan</td>
										<td>23-02-2000</td>
										<td>
											<a href="#">Eliminar</a>
										</td>
									</tr>
									<tr>
										<td>1</td>
										<td>Jose</td>
										<td>09-06-2001</td>
										<td>
											<a href="#">Eliminar</a>
										</td>
									</tr>
									<tr>
										<td>1</td>
										<td>Juan</td>
										<td>23-02-2000</td>
										<td>
											<a href="#">Eliminar</a>
										</td>
									</tr>
									<tr>
										<td>1</td>
										<td>Jose</td>
										<td>09-06-2001</td>
										<td>
											<a href="#">Eliminar</a>
										</td>
									</tr>
									<tr>
										<td>1</td>
										<td>Juan</td>
										<td>23-02-2000</td>
										<td>
											<a href="#">Eliminar</a>
										</td>
									</tr>
									<tr>
										<td>1</td>
										<td>Jose</td>
										<td>09-06-2001</td>
										<td>
											<a href="#">Eliminar</a>
										</td>
									</tr>
									<tr>
										<td>1</td>
										<td>Juan</td>
										<td>23-02-2000</td>
										<td>
											<a href="#">Eliminar</a>
										</td>
									</tr>
									<tr>
										<td>1</td>
										<td>Jose</td>
										<td>09-06-2001</td>
										<td>
											<a href="#">Eliminar</a>
										</td>
									</tr>
								</tbody>
							</table>
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
<script src="assets/js/functions.js"></script>

</body>
</html>