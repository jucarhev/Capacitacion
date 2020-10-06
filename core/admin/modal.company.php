<!-- Modal actualizar -->
<div class="modal fade" id="update_unity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Company</h4>
			</div>
			<div class="modal-body">
				<?php 
				require_once "../../config/var.php"; 
				require_once "../comodo.php";

				$connection = new Comodo($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE, $SOCKET, $PORT);
				$result = $connection->read("select * from companies where id=".$_POST['id']);
				
				foreach ($result as $row):
					$id = $row['id'];
					$name = $row['name'];
				endforeach;
				?>

				<form id="contactform" action="#" method="POST"  onsubmit="update_company_data();return false">
					<div class="form-group">
						<label for="companyname">Company name</label>
						<input type="text" class="form-control" id="companynameupd" placeholder="enter company name" value="<?php echo $name; ?>">
					</div>
					<input type="hidden" id="idcompany" value="<?php echo $id; ?>">
					<button type="submit" class="btn btn-primary" id="savecompanyname">Guardar</button>
				</form>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>