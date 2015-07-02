<br>
<br>

<div class="container">
	<div class="row">
		<div class="col-xs-6">
		<form method="POST" action="actions/create_popravka.php">
			<p>Search</p>
			<input class="usernamesuggest"></input>
			<input type="hidden" class="user_id_holder" name="user_id"></input>
			<div class="dropdown">
				<ul class="results">
				</ul>
			</div>

			<br>
			<br>	
			<select class="select_motor" name="motor_id">
				<option>Izaberi motor</option>
			</select>
			<br>
			<br>
			<p class="testing">Kvar</p>
			<textarea name="kvar" rows="4" cols="40"></textarea>
			<br>
			<br>
			<p>Datum</p>
			<input type="date" id="datum" name="datum"></input>
			<br>
			<br>
			<p>Kilometraza</p>
			<input type="text" name="kilometraza"></input>
			<br>
			<br>

			<input type="submit" class="btn btn-warning" value="Submit"></input>	
		</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){

		//AJAX ON KEY UP
		$('.usernamesuggest').keyup(function(){
			var search_term = $(this).val();
			$.post('actions/search_popravka.php', {search_term:search_term}, function(data){
				$('.results').html(data);

				$('.results li').on('click', function(){
					var result_value = $(this).text();
					$('.usernamesuggest').val(result_value);
					$('.results').html('');
					var user_id = $(this).attr('data-id');
					$('.user_id_holder').val(user_id);
					//console.log(user_id);

					$.post('actions/motori.php', {user_id:user_id}, function(data){
						//alert(data);
						$('.select_motor').html("<option>Izaberi motor</option>"+data);

					})//post

				})//result click

				
			})//post
		})//key up

		// var datum = Date();
		// //alert(datum);
		// $('#datum').value = datum;


		

	}) //document ready

</script>