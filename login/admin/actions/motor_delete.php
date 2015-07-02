<h3>Please wait</h3>
<?php 

	require_once('../../lib/functions.php');
	require_once('../../lib/config.php');
	require_once('../../lib/db_conn.php');

	check_log();
	check_log_admin();

	$motor_id = $_GET['id'];

	$query="DELETE FROM motori WHERE id='$motor_id'";

	$query_2 = "DELETE FROM trenutne_popravke WHERE motor_id='$motor_id'";

	$query_3 = "DELETE FROM cenovnik WHERE motor_id='$motor_id'";

	if (mysqli_query($con, $query) && mysqli_query($con, $query_2) && mysqli_query($con, $query_3)) {
		?>

		<script type="text/javascript">
		window.location = "../";
		</script>

	<?php
	}


