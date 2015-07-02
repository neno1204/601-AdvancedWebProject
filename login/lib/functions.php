<?php
	session_start();
	error_reporting(0);
	require_once('config.php');
	require_once('db_conn.php');

	//$_SESSION["user"];
	
	function log_in($username, $password){
		if($username == "nikola"){
			// GO TO ADMIN FOLDER
			global $con;
			$password_md = md5($password);
			$sql="SELECT * FROM admin_users WHERE username='$username' AND password='$password_md' LIMIT 1";
			$result = mysqli_query($con,$sql);
			
			if(isset($result)) $row = mysqli_fetch_assoc($result);
			
			$_SESSION["user"] = $row["username"];
			$_SESSION["admin"] = true;
			?>
				<script type="text/javascript">
					window.location = 'admin/index.php';
				</script>
			<?php 
		}else if($username != "nikola"){
			// GO TO USER FOLDER
			global $con;
			$password_md = md5($password);
			$sql="SELECT * FROM korisnici WHERE username='$username' AND password='$password_md' LIMIT 1";
			$result = mysqli_query($con,$sql);
			$row = mysqli_fetch_assoc($result);
			if(isset($row)){
				$_SESSION["user"] = $row["username"];
				$_SESSION["user_log"] = true;
				?>
					<script type="text/javascript">
						window.location = 'user/index.php';
					</script>
				<?php
			}else{
				?>
					<script type="text/javascript">
						window.location = '../';
					</script>
				<?php 
			}
		}
	}

	function check_log(){
		if(isset($_SESSION['user'])){
			return true;
		}else{
			?>
			<script type="text/javascript">
				window.location = '../';
			</script>
			<?php
			exit();
		}
	}

	function check_log_admin(){
		if ($_SESSION['admin']) {
			unset($_SESSION['user_log']);
			return true;
		}else{
			?>
				<script type="text/javascript">
					window.location = '../';
				</script>
			<?php
			exit();
		}
	}

	function check_log_user(){
		if($_SESSION['user_log']){
			unset($_SESSION['admin']);
			return true;
		}else{
			?>
				<script type="text/javascript">
					window.location = '../';
				</script>
			<?php
			exit();
		}
	}

	function string_test($text){
		echo $text;
	}


