<?php 

	require_once('../../lib/functions.php');
	require_once('../../lib/config.php');
	require_once('../../lib/db_conn.php');

	check_log();
	check_log_admin();

	$username = $_POST['username'];
	$broj_telefona = $_POST['broj_telefona'];
	$email = $_POST['email'];

	$query = "INSERT INTO korisnici SET 
	USERNAME = '$username', 
	BROJ_TELEFONA = '$broj_telefona', 
	EMAIL = '$email'";

	if (!empty($username) && !empty($broj_telefona) && !empty($email)) {
		if (mysqli_query($con, $query)) {
		$last_id = mysqli_insert_id($con);
		?>

			 <script type="text/javascript">
			 	var user_id = <?php echo $last_id; ?>;
			 	window.location = "../?action=user_read&user_id="+user_id;
			 </script>

 <?php
		} 
	}else{
			?>
			<script type="text/javascript">
			window.location = "../?action=user_create";
			</script>
			
		<?php
		}
 ?>

