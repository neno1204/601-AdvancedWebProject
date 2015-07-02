<?php 

$user_id=$_GET['user_id'];

$query="SELECT * FROM korisnici WHERE id='$user_id'";

$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
//var_dump($row);

$query_2 ="SELECT * FROM motori WHERE user_id='$user_id'";
$result_2 = mysqli_query($con, $query_2);
//$row_2 = mysqli_fetch_assoc($result_2);
//var_dump($row_2);

 ?>

<div class="container">
	<div class="row">
		<div class="col-xs-10">
			<h3><?php echo $row['username'] ?></h3>
			<h5><?php echo $row['broj_telefona'] ?></h5>
			<h5><?php echo $row['email'] ?></h5>
		</div>
		<div class="col-xs-2 icons-holder">
			<img style="cursor: pointer" data-toggle="modal" data-target="#user-edit-modal" src="assets/pencil_big.png" class="zamotor">
			<img style="cursor: pointer" data-toggle="modal" data-target="#myModal" src="assets/motorbike5.png">
		</div>
	</div>
	<div class="row">

		<?php 
			while ($row_2 = mysqli_fetch_assoc($result_2)) {
				?>
				<a class="motor-name-holder" href="?action=motor_read&motor_id=<?php echo $row_2['id']; ?>">
				<div class="col-xs-3 col-xs-offset-2 motor_detail text-center">
				<h4><?php echo $row_2['motor']; ?></h4>
				<h5><?php echo $row_2['godiste']; ?></h5>
			</div>
			</a>
		<?php
			}
		 ?>

	</div>
</div>


<!-- MODAL ADD MOTOR -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Unesi motor</h4>
      </div>
      <div class="modal-body">
        <form id="form_create" method="POST" action="actions/motor_create.php">
        	<p>Motor</p>
        	<input name="motor"></input>
        	<br>
        	<br>
        	<p>Godiste</p>
        	<input name="godiste"></input>
        	<br>
        	<br>
        	<p>Serijski broj</p>
        	<input name="serijski_broj"></input>
        	<br>
        	<br>
        	<p>Dimenzija guma</p>
        	<input name="dimenzija_guma"></input>

        	<input name="user_id" type="hidden" value="<?php echo $row['id']; ?>"></input>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" form="form_create" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- END MODAL -->

<!-- MODAL EDIT USER -->
  <div class="modal fade" id="user-edit-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Korisnik</h4>
      </div>
      <div class="modal-body">
        <form id="form_user_edit" method="POST" action="actions/user_edit.php">
          <p>Ime i prezime</p>
          <input name="username" value="<?php echo $row['username']; ?>"></input>
          <br>
          <br>
          <p>Broj telefona</p>
          <input name="broj_telefona" value="<?php echo $row['broj_telefona']; ?>"></input>
          <br>
          <br>
          <p>Email</p>
          <input name="email" value="<?php echo $row['email']; ?>"></input>
          <br>
          <input name="user_id" type="hidden" value="<?php echo $row['id']; ?>"></input>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" form="form_user_edit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- END MODAL -->