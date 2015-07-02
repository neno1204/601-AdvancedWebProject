<h3>Please wait</h3>
<?php 

	// AJAX SEARCH

	require_once('../../lib/functions.php');
	require_once('../../lib/config.php');
	require_once('../../lib/db_conn.php');

	check_log();
	check_log_admin();

	//GET VARIABLES
	$user_id = $_POST['user_id'];
	$motor_id = $_POST['motor_id'];
	$kvar = $_POST['kvar'];
	$datum = $_POST['datum'];
	$kilometraza = $_POST['kilometraza'];
	$datum = strtotime($datum);

	if (!empty($user_id) && !empty($motor_id) && !empty($kvar) && !empty($datum) && !empty($kilometraza)) {
		
		$query = "INSERT INTO trenutne_popravke SET 
		USER_ID = '$user_id', 
		MOTOR_ID = '$motor_id', 
		KVAR = '$kvar', 
		DATUM = '$datum', 
		KILOMETRAZA = '$kilometraza', 
		TRENUTNA = '1'";

		if (mysqli_query($con, $query)) {
			$last_id = mysqli_insert_id($con);
			?>

			<script type="text/javascript">
				var popravka_id = <?php echo $last_id; ?>;
				window.location = "../?action=popravka_read&popravka_id="+popravka_id;
			</script>

	<?php		
		} //mysqli_query

	} else{
		?>

		<script type="text/javascript">
		window.location = "../?action=popravka_create";
		</script>

	<?php
	}

	//ako je svaki setovan unesi i preusmjeri na tu popravku ako nije vrati na popravka_create
	// INSERT INTO TRENUTNE POPRAVKE
	


	// REDIRECT TO THAT POPRAVKA


 ?>