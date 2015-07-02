<?php 
error_reporting(3);
	$id_popravka = $_GET["popravka_id"];

	$query = "SELECT trenutne_popravke.*, motori.*, korisnici.* 
	FROM trenutne_popravke 
	INNER JOIN korisnici 
	ON trenutne_popravke.user_id=korisnici.id 
	INNER JOIN motori 
	ON trenutne_popravke.motor_id=motori.id 
	WHERE trenutne_popravke.id = $id_popravka";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_assoc($result);

 ?>

 <div class="container">
 	<div class="row">
 		<div class="col-xs-6">
 			<h3><?php echo $row["motor"] ?></h3>
 			<h5><?php echo $row["godiste"] ?></h5>
 			<h5><?php echo $row["serijski_broj"] ?></h5>
 			<h5><?php echo $row["dimenzija_guma"] ?></h5>
 			<h4><?php echo $row["kvar"]; ?></h4>
 			<h5><?php echo date("j F Y", $row["datum"]); ?></h5>
 			<h5><?php echo $row["kilometraza"] . " km"; ?></h5>
 		</div>
 		<div class="col-xs-3 col-xs-offset-3">
 			<h3><?php echo $row['username'] ?></h3>
 			<h5><?php echo $row["broj_telefona"] ?></h5>
 			<h5><?php echo $row["email"] ?></h5>
 		</div>
 	</div>
 	<div class="row">	
 		<!-- 
			OSTAVLJENO ZA CHAT
 		 -->
 		
 		<div class="col-xs-offset-6 table-responsive table-cenovnik">
 			<table class="cenovnik">
 				<thead>
 					<tr>
 						<td>
 							<h4 class="donjalinija">Cenovnik</h4>
 						</td>
 						<td></td>
 						<td></td>
 						<td></td>
 						<td></td>
 						<td data-toggle="modal" data-target="#myModal"><img src="assets/add139.png"></td>
 					</tr>
 				</thead>
 				<tbody>
 				<?php 
 					$popravka_id = $row['id'];
 					$query = "SELECT * FROM cenovnik WHERE popravka_id = '$id_popravka'";
 					$cenovnik_results = mysqli_query($con, $query);
 					$placeno_din = array();
 					$neplaceno_din = array();
 					$placeno_eur = array();
 					$neplaceno_eur = array();
 					$total_din = array();
 					$total_eur = array();

 					while ($cenovnik_row = mysqli_fetch_assoc($cenovnik_results)) {
 						?>
 					<tr>
 						<td><?php echo $cenovnik_row['opis']; ?></td>
 						<td><?php echo $cenovnik_row['cena'] . " " . $cenovnik_row['valuta']; ?></td>
 						<?php if ($cenovnik_row['placeno'] == 1) {
 							echo "<td class='ikonice'><input data-id='".$cenovnik_row['id']."' class='placeno_check' type='checkbox' checked></input></td>";
 						}else{
 						 	echo "<td class='ikonice'><input data-id='".$cenovnik_row['id']."' class='placeno_check' type='checkbox'></input></td>";
 						}
 						?>
 						<td data-id="<?php echo $cenovnik_row['id']; ?>" class='ikonice delete_icon'><img src="../../assets/delete81.png"></td>
 					</tr>
 					<?php
 						if ($cenovnik_row['valuta'] == 'din') {
 							$total_din[] = $cenovnik_row['cena'];
 						} elseif ($cenovnik_row['valuta'] == 'eur') {
 							$total_eur[] = $cenovnik_row['cena'];
 						}

 						if($cenovnik_row['valuta'] == 'din' && $cenovnik_row['placeno'] == 1){
 							$placeno_din[] = $cenovnik_row['cena'];
 						} elseif ($cenovnik_row['valuta'] == 'din' && $cenovnik_row['placeno'] == 0) {
 							$neplaceno_din[] = $cenovnik_row['cena'];
 						} elseif ($cenovnik_row['valuta'] == 'eur' && $cenovnik_row['placeno'] == 1) {
 							$placeno_eur[] = $cenovnik_row['cena'];
 						} elseif ($cenovnik_row['valuta'] == 'eur' && $cenovnik_row['placeno'] == 0) {
 							$neplaceno_eur[] = $cenovnik_row['cena'];
 						}
 					}
 				 ?>
 				</tbody>
 				<tfoot>
 					<tr>
 						<td><b>Total</b></td>
 						<td>
 							<b>
 							<?php
 							if (!empty(array_sum($total_din))) {
 								echo array_sum($total_din) . " din";
 							}
 							if (!empty(array_sum($total_din)) && !empty(array_sum($total_eur))) {
 								echo " + ";
 							}
 							if (!empty(array_sum($total_eur))) {
 								echo array_sum($total_eur) . " eur";
 							}
 							 ?>
 						 	</b>
 						 </td>
 					</tr>
 					<tr>
 						<td>Placeno </td>
 						<td>
 							<?php
 							$placeno_din_sum = array_sum($placeno_din);
 							$placeno_eur_sum = array_sum($placeno_eur);
 							if (!empty($placeno_din_sum)) {
 								echo $placeno_din_sum . " din";
 							}
 							if (!empty($placeno_din_sum) && !empty($placeno_eur_sum) ) {
 								echo " + ";
 							}
 							if (!empty($placeno_eur_sum)) {
 								echo $placeno_eur_sum . " eur";
 							}
 							if (empty($placeno_din_sum) && empty($placeno_eur_sum)) {
 								echo " / ";
 							}
 							?>
 							
 						</td>
 					</tr>
 					<tr>
 						<td>Preostalo</td>
 						<td>
 						<?php
 						$neplaceno_din_sum = array_sum($neplaceno_din);
 						$neplaceno_eur_sum = array_sum($neplaceno_eur);
 						if (!empty($neplaceno_din_sum)) {
 								echo $neplaceno_din_sum . " din";
 							}
						if (!empty($neplaceno_din_sum) && !empty($neplaceno_eur_sum) ) {
							echo " + ";
						}
						if (!empty($neplaceno_eur_sum)) {
							echo $neplaceno_eur_sum . " eur";
						}
						if (empty($neplaceno_din_sum) && empty($neplaceno_eur_sum)) {
							echo " / ";
						}
						
						 ?></td>
 					</tr>
 				</tfoot>
 			</table>
 		</div>
 		<!-- UNVISIBLE FORM FOR CHECK -->
 		<form id="hidden_check" action="actions/cenovnik_update.php" method="POST">
 			<input type="hidden" class="stavka_id" name="stavka_id"></input>
 			<input type="hidden" class="ischecked" name="ischecked"></input>
 			<input type="hidden" class="popravka_id" name="popravka_id" value="<?php echo $id_popravka; ?>"></input>
 		</form>
 		<form id="hidden_delete" action="actions/cenovnik_delete.php" method="POST">
 			<input type="hidden" class="delete_id" name="delete_id"></input>
 			<input type="hidden" class="popravka_id_delete" name="popravka_id_delete" value="<?php echo $id_popravka; ?>"></input>
 		</form>
 	</div>
 	<div class="row">
 		<div class="col-xs-4 pull-right">
 			<button type="submit" form="popravka_zavrsena" class="popravljen btn btn-warning pull-right">Popravljen</button>
 		</div>
 	</div>
 </div>

 <!-- POPRAVKA_OLD HIDDEN FORM -->
 <form method="POST" id="popravka_zavrsena" action="actions/popravka_zavrsena.php">
 	<input type="hidden" name="id_popravka_zavrsena" value="<?php echo $id_popravka; ?>"></input>
 	<input type="hidden" name="id_motor" value="<?php echo $row['motor_id']; ?>"></input>
 </form>

 <!-- MODAL POPRAVLJEN CONFIRM -->
 <div class="modal fade" id="popravljen_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Potvrdi popravku</h4>
      </div>
      <div style="border: none" class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" form="popravka_zavrsena" class="btn popravljen_confirm btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
 <!-- END MODAL POPRAVLJEN CONFIRM -->

 <!-- MODAL TO INSERT NEW -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Unesi</h4>
      </div>
      <div class="modal-body">
        <form id="form_create" method="POST" action="actions/cenovnik_create.php">
        	<p>Opis</p>
        	<input name="opis"></input>
        	<br>
        	<br>
        	<p>Cena</p>
        	<input name="cena"></input>
        	<br>
        	<br>
        	<input type="radio" name="valuta" value="din">Din<br>
			<input type="radio" name="valuta" value="eur">Eur
        	<input name="popravka_id_create" type="hidden" value="<?php echo $id_popravka; ?>"></input>
        	<input name="user_id_create" type="hidden" value="<?php echo $row['user_id']; ?>"></input>
        	<input name="motor_id_create" type="hidden" value="<?php echo $row['motor_id']; ?>"></input>

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

<script type="text/javascript">
	
$(document).ready(function(){
	var popravka_id = <?php echo $row['id']; ?>;

	$('.placeno_check').click(function(){
		var stavka_id = $(this).attr('data-id');
		var ischecked = $(this).is(':checked');
		$('.stavka_id').val(stavka_id);
		$('.ischecked').val(ischecked);
		$('#hidden_check').submit();
		//alert(testing2);
	})//placeno check
	$('.delete_icon').click(function(){
		var delete_id = $(this).attr('data-id');
		$('.delete_id').val(delete_id);
		$('#hidden_delete').submit();
	})//delete icon


	//popravljen
	$('.popravljen').on('click', function(){
		event.preventDefault();
		$('#popravljen_modal').modal('show');
	}) // popravljen click


});//document ready

</script>




















