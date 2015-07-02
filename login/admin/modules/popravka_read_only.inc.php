<?php 

	$popravka_id = $_GET['popravka_id'];

	$query = "SELECT trenutne_popravke.*, motori.*, korisnici.* 
	FROM trenutne_popravke 
	INNER JOIN korisnici 
	ON trenutne_popravke.user_id=korisnici.id 
	INNER JOIN motori 
	ON trenutne_popravke.motor_id=motori.id 
	WHERE trenutne_popravke.id = $popravka_id";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_assoc($result);
?>

<div class="container">
 	<div class="row">
 		<div class="col-xs-5">
 			<h3><?php echo $row["motor"] ?></h3>
 			<h5><?php echo $row["godiste"] ?></h5>
 			<h5><?php echo $row["serijski_broj"] ?></h5>
 			<h5><?php echo $row["dimenzija_guma"] ?></h5>
 			<h4><?php echo $row["kvar"]; ?></h4>
 			<h5><?php echo date("j F Y", $row["datum"]); ?></h5>
 			<h5><?php echo $row["kilometraza"] . " km"; ?></h5>
 		</div>
 		<div class="col-xs-offset-3 col-xs-1">
 		<a class="" data-toggle="modal" data-target="#popravka-edit-modal" href="#">
 			<img style="margin-top: 20px;" src="../../assets/pencil43.png">
 		</a>
 		<a class="popravka_delete" href="actions/popravka_delete.php?popravka_id=<?php echo $popravka_id ?>">
 			<img style="margin-top: 20px; margin-left: 10px;" src="../../assets/delete81.png">
 		</a>
 		
 		</div>
 		<div class="col-xs-3">
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
 						<td></td>
 					</tr>
 				</thead>
 				<tbody>
 				<?php 
 					$query = "SELECT * FROM cenovnik WHERE popravka_id = '$popravka_id'";
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
 						<td></td>
 						<td></td>
 					</tr>
 					<tr>
 						<td></td>
 						<td></td>
 					</tr>
 				</tfoot>
 			</table>
 		</div>
 	</div>
 </div>

 <!-- POPRAVKA DELETE MODAL -->
<div class="modal fade" id="popravka_delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Izbrisi popravku ?</h4>
      </div>
      <div style="border: none" class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn izbrisi_popravku btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- END POPRAVKA DELETE MODAL -->

<!-- MODAL POPRAVKA EDIT  -->
  <div class="modal fade" id="popravka-edit-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Izmeni popravku</h4>
      </div>
      <div class="modal-body">
        <form id="popravka_update_form" method="POST" action="actions/popravka_update.php">
          <p>Kvar</p>
          <textarea name="kvar" rows="4" cols="40"><?php echo $row['kvar']; ?></textarea>
          <br>
          <br>
          <p>Datum</p>
          <input type="date" id="datum" name="datum" value="<?php echo date('Y-m-d', $row['datum']); ?>"></input>
          <br>
          <br>
          <p>Kilometraza</p>
          <input type="text" name="kilometraza" value="<?php echo $row['kilometraza']; ?>"></input>
          <br>
          <input name="popravka_id" type="hidden" value="<?php echo $popravka_id; ?>"></input>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" form="popravka_update_form" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- END MODAL -->


<script type="text/javascript">
	$('.popravka_delete').on('click', function(){
		event.preventDefault();
		$('#popravka_delete').modal('show');
		var link = $(this).attr('href');

		$('.izbrisi_popravku').on('click', function(){
			window.location = link;
		});
	})


</script>
