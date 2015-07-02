<h3>Please wait</h3>
<?php 

	require_once('../../lib/functions.php');
	require_once('../../lib/config.php');
	require_once('../../lib/db_conn.php');

	check_log();
	check_log_admin();



	$motor = $_POST['motor'];
	$godiste = $_POST['godiste'];
	$serijski_broj = $_POST['serijski_broj'];
	$dimenzija_guma = $_POST['dimenzija_guma'];
	$user_id = $_POST['user_id'];

	$query = "INSERT INTO motori SET 
	MOTOR = '$motor', 
	GODISTE = '$godiste', 
	SERIJSKI_BROJ = '$serijski_broj', 
	DIMENZIJA_GUMA = '$dimenzija_guma', 
	USER_ID = '$user_id'";

	if (mysqli_query($con, $query)) {

		?>

		<script type="text/javascript">
		var user_id = <?php echo $user_id; ?>;
		window.location = "../?action=user_read&user_id="+user_id;
		</script>

<?php
	}


 ?>