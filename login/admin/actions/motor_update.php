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
	$motor_id = $_POST['motor_id'];


	$query = "UPDATE motori SET 
	MOTOR = '$motor', 
	GODISTE = '$godiste', 
	SERIJSKI_BROJ = '$serijski_broj', 
	DIMENZIJA_GUMA = '$dimenzija_guma' 
	WHERE id ='$motor_id'";


	if (mysqli_query($con, $query)) {
	?>

	<script type="text/javascript">
		var motor_id = <?php echo $motor_id; ?>;
		window.location = "../?action=motor_read&motor_id="+motor_id;
	</script>

	<?php
	}