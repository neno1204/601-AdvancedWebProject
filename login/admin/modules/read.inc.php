<div class="table-responsive">
	<table class="table table-striped popravka-read">
		<thead>
			<tr class="first-row">
				<td class="table-first">#</td>
				<td class="table-second"><img src="assets/bike.png"></td>
				<td><img src="assets/tool.png"></td>
				<td class="table-second"><img src="assets/calendar146.png"></td>
				<td class="table-fourth"><img src="assets/user.png"></td>
			</tr>
		</thead>
		<tbody>

				<?php 

					$sql = "SELECT trenutne_popravke.id, trenutne_popravke.kvar, trenutne_popravke.datum, korisnici.username, motori.motor
					FROM trenutne_popravke 
					INNER JOIN korisnici 
					ON trenutne_popravke.user_id=korisnici.id
					INNER JOIN motori
					ON trenutne_popravke.motor_id=motori.id 
					WHERE trenutna ='1' ORDER BY trenutne_popravke.datum";
					$result = mysqli_query($con, $sql);
					$redosled = 1;
					// STARTING WHILE LOOP
					while($row = mysqli_fetch_assoc($result)){
				 ?>
					<tr class="clickable-row" data-href="?action=popravka_read&popravka_id=<?php echo $row['id']; ?>">
					<td><?php echo $redosled++ ?></td>
					<td><?php echo $row["motor"] ?></td>
					<td><?php echo $row["kvar"] ?></td>
					<td><?php echo date("j F Y",$row['datum']); ?></td>
					<td><?php echo $row["username"] ?></td>
					</tr>
				<?php 
				// CLOSING WHILE LOOP
				}
				 ?>		
		</tbody>
	</table>
</div>

<div class="container">
	<div class="row action-buttons">
		<div class="col-xs-3 text-center">
			<div onclick="window.location = '?action=popravka_create'" class="for-buttons text-center">
				<a href="#"><img src="assets/new.png"></a>
			</div>
		</div>
		<div class="col-xs-3">
			<div onclick="window.location = '?action=user_create'" class="for-buttons text-center">
				<a href="#"><img src="assets/newuser.png"></a>
			</div>
		</div>
		<div class="col-xs-3">
			<div onclick="window.location = '?action=users_read'" class="for-buttons text-center">
				<a href="#"><img src="assets/moreusers.png"></a>
			</div>
		</div>
		<div class="col-xs-3">
			<div class="for-buttons text-center">
				<img src="assets/tools.png">
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('.clickable-row').on("click", function(){
		window.document.location = $(this).data("href");
	})
</script>















