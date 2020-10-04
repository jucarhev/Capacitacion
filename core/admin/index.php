<div class="panel panel-default">
	<div class="panel-heading main-color-bg">
		<h3 class="panel-title">Acciones</h3>
	</div>
	<div class="panel-body">
		
	<div class="row" style="padding: 5px;">
		<form action="" method="GET"> 
			<div class="row">
				<div class="col-xs-12 col-md-12">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search" id="txtSearch"/>
						<div class="input-group-btn">
							<button class="btn btn-primary" type="submit">
								<span class="fa fa-search" aria-hidden="true"></span>
							</button>
						</div>
					</div>
				</div>
			</div>
		</form>	
	</div>

	</div>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Compa&ntilde;&iacute;a  <button class="btn btn-info" data-toggle="modal" data-target="#add_new_unity"> <i class="fa fa-plus" aria-hidden="true"></i> </button></h3> 
	</div>
	<div class="panel-body">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th colspan="3">Option</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				require_once "../../config/var.php"; 
				require_once "../comodo.php";

				$connection = new Comodo($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE, $SOCKET, $PORT);

				$result = $connection->read("select * from companies");

				foreach ($result as $row):
					
				?>
				<tr>
					<td> <?php echo $row['id']; ?></td>
					<td><?php echo $row['name']; ?></td>
					<td>
						<a href="#">Modificar</a>
					</td>
					<td>
						<a href="#">Info</a>
					</td>
					<td>
						<a href="#">Eliminar</a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="add_new_unity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Company</h4>
			</div>
			<div class="modal-body">

				<form id="contactform" action="#" method="POST"  onsubmit="save_company();return false">
					<div class="form-group">
						<label for="companyname">Company name</label>
						<input type="text" class="form-control" id="companyname" placeholder="enter company name">
					</div>
					<button type="submit" class="btn btn-primary" id="savecompanyname">Guardar</button>
				</form>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>