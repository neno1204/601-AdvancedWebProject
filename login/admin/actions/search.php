<?php 

	// AJAX SEARCH

	require_once('../../lib/functions.php');
	require_once('../../lib/config.php');
	require_once('../../lib/db_conn.php');

	check_log();
	check_log_admin();

	$search_term = $_POST['search_term'];

	if(isset($search_term) && !empty($search_term)){
		$search_term = mysql_real_escape_string($search_term);
		$query = "SELECT * FROM korisnici WHERE username LIKE '%$search_term%' LIMIT 15";
		$result = mysqli_query($con, $query);
		$redosled=0;
		while($row = mysqli_fetch_assoc($result)) {
			$redosled++;
			?>
			<tr>
			<td onclick="document.location='?action=user_read&user_id=<?php echo $row['id'] ?>'"><?php echo $redosled ?></td>
			<td onclick="document.location='?action=user_read&user_id=<?php echo $row['id'] ?>'"><?php echo $row['username'] ?></td>
			<td onclick="document.location='?action=user_read&user_id=<?php echo $row['id'] ?>'"><?php echo $row['broj_telefona'] ?></td>
			<td onclick="document.location='?action=user_read&user_id=<?php echo $row['id'] ?>'"><?php echo $row['email'] ?></td>
			<td><img src="../../assets/pencil43.png"></td>
			<td>
			<a href="actions/user_delete.php?user_id=<?php echo $row['id']; ?>">
				<img src="../../assets/delete81.png">
			</a>
			</td>
			</tr>
		<?php
		}
	}else{
		//
	}


 ?>