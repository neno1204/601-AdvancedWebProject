<?php 

	require_once('../../lib/functions.php');
	require_once('../../lib/config.php');
	require_once('../../lib/db_conn.php');

	check_log();
	check_log_admin();


	$delete_id = $_POST['delete_id'];
	$popravka_id_delete = $_POST['popravka_id_delete'];

	$query = "DELETE FROM cenovnik WHERE id ='$delete_id'";


	if (mysqli_query($con, $query)) {
		?>

		<script type="text/javascript">
		var popravka_id = <?php echo $popravka_id_delete; ?>;
		window.location = "../?action=popravka_read&popravka_id="+popravka_id;
		</script>

<?php
	}

 ?>