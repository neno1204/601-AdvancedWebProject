<h3>Please wait</h3>
<?php 

	require_once('../../lib/functions.php');
	require_once('../../lib/config.php');
	require_once('../../lib/db_conn.php');

	check_log();
	check_log_admin();


	$popravka_id = $_POST['id_popravka_zavrsena'];
	$motor_id = $_POST['id_motor'];

	$query = "UPDATE trenutne_popravke SET 
	TRENUTNA = '0' WHERE id = '$popravka_id'";

	if (mysqli_query($con, $query)) {
		echo "proslo je";
		echo "string";
	?>

	<script type="text/javascript">
	var motor_id = <?php echo $motor_id; ?>;
	window.location = "../?action=motor_read&motor_id="+motor_id;
	</script>

<?php
	}

 ?>