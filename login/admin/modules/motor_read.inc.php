<?php 
	
	$motor_id = $_GET['motor_id'];

	//MOTOR RESULTS
	$query = "SELECT * FROM motori WHERE id='$motor_id'";
	$result = mysqli_query($con, $query);
	$row1 = mysqli_fetch_assoc($result);

 ?>


<div class="container">
	<div class="row">
		<div class="col-xs-10">
			<h3><?php echo $row1['motor']; ?></h3>
			<h4><?php echo $row1['godiste']; ?></h4>
			<h4><?php echo $row1['dimenzija_guma']; ?></h4>
			<h4><?php echo $row1['serijski_broj']; ?></h4>
		</div>
		<div class="col-xs-2 icons-holder">
			<a href="#" data-toggle="modal" data-target="#motor-edit-modal">
			<img src="../../assets/pencil43.png" class="zamotor">
			</a>
			<a class="motor_delete" href="actions/motor_delete.php?id=<?php echo $row1['id']; ?>"><img src="../../assets/delete81.png"></a>
		</div>
	</div>
</div>


<div class="table-responsive motor-read-table">
	<table class="table table-striped">
		<thead>
			<tr class="first-row">
				<td class="table-first">#</td>
				<td class="table-second"><img src="assets/calendar146.png"></td>
				<td><img src="assets/tool.png"></td>
				<td class="table-fourth"><img src="assets/road41.png"></td>
			</tr>
		</thead>
		<tbody>
			<?php 
			//POPRAVKE RESULTS
			$query_2 = "SELECT * FROM trenutne_popravke WHERE motor_id='$motor_id' ORDER BY datum DESC";
			$result_2 = mysqli_query($con, $query_2);
			$redosled = 0;
			while ($row = mysqli_fetch_assoc($result_2)) {
				$redosled++;
			?>
			<tr onclick="document.location='?action=popravka_read_only&popravka_id=<?php echo $row['id'] ?>'">
				<td><?php echo $redosled; ?></td>
				<td><?php echo date("j F Y",$row['datum']); ?></td>
				<td><?php echo $row['kvar']?></td>
				<td><?php echo $row['kilometraza']; ?> km</td>
			</tr>

			<?php
				}
			 ?>

				
		</tbody>
	</table>
</div>

<!-- MODAL DELETE MOTOR -->
<div class="modal fade" id="motor_delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Izbrisi <?php echo $row1['motor']; ?> ?</h4>
      </div>
      <div style="border: none" class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" form="form_create" class="btn izbrisi_motor btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- END MODAL DELETE MOTOR -->

<!-- MOTOR EDIT MODAL  -->
  <div class="modal fade" id="motor-edit-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Izmeni motor</h4>
      </div>
      <div class="modal-body">
        <form id="motor_edit" method="POST" action="actions/motor_update.php">
        	<p>Motor</p>
        	<input name="motor" value="<?php echo $row1['motor']; ?>"></input>
        	<br>
        	<br>
        	<p>Godiste</p>
        	<input name="godiste" value="<?php echo $row1['godiste']; ?>"></input>
        	<br>
        	<br>
        	<p>Serijski broj</p>
        	<input name="serijski_broj" value="<?php echo $row1['serijski_broj']; ?>"></input>
        	<br>
        	<br>
        	<p>Dimenzija guma</p>
        	<input name="dimenzija_guma" value="<?php echo $row1['dimenzija_guma']; ?>"></input>

        	<input name="motor_id" type="hidden" value="<?php echo $row1['id']; ?>"></input>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" form="motor_edit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- END MODAL -->

<script type="text/javascript">

	$('.motor_delete').on('click', function(){
		event.preventDefault();
		$('#motor_delete').modal('show');
		var link = $(this).attr('href');

		$('.izbrisi_motor').on('click', function(){
			window.location = link;
		});
	})// motor delete click

</script>
	