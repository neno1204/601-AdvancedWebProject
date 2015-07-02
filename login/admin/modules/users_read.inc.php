<br>
<br>
<div class="container">
	<div class="row">
		<div class="col-xs-4">
			<p>Search</p>
			<input type="text" class="autosuggest"> </input>
		</div>

	</div>
</div>
<br>
<br>

<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr class="first-row">
				<td>#</td>
				<td>Username</td>
				<td>Broj telefona</td>
				<td>Email</td>
				<td></td>
				<td></td>
			</tr>
		</thead>
		<tbody class="users_list">
			<?php 
				$query = "SELECT * FROM korisnici ORDER BY RAND() LIMIT 15";
				$result = mysqli_query($con, $query);
				$redosled=0;
			// start the loop
				while($row = mysqli_fetch_assoc($result)){
					$redosled++;
			 ?>
			 <tr onclick="document.location='?action=user_read&user_id=<?php echo $row['id'] ?>'">
			 	<td><?php echo $redosled; ?></td>
			 	<td><?php echo $row['username']; ?></td>
			 	<td><?php echo $row['broj_telefona']; ?></td>
			 	<td><?php echo $row['email']; ?></td>
			 </tr>

			 <?php 
			} //end while
			  ?>

		</tbody>
	</table>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('.autosuggest').keyup(function(){
			var search_term = $(this).val();
			$.post('actions/search.php', {search_term:search_term}, function(data){
				$('.users_list').html(data);
			})
		})//key up
	}) //document ready

</script>