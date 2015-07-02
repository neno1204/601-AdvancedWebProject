<?php 

	require_once('../../lib/functions.php');
	require_once('../../lib/config.php');
	require_once('../../lib/db_conn.php');

	check_log();
	check_log_admin();

	$user_id = $_POST['user_id'];
	$username = $_POST['username'];
	$broj_telefona = $_POST['broj_telefona'];
	$email = $_POST['email'];


	$query = "UPDATE korisnici SET 
	USERNAME = '$username', 
	BROJ_TELEFONA = '$broj_telefona', 
	EMAIL = '$email' WHERE id = '$user_id'";
	mysqli_query($con, $query);

 ?>
 <script type="text/javascript">
 	var user_id = <?php echo $user_id; ?>;
	window.location = "../?action=user_read&user_id="+user_id;
 </script>