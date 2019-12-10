<?php
session_start();
if (isset($_POST['submit'])) {
	include_once("dbh.inc.php");

	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	if (empty($uid) || empty($pwd)) {
		header("Location: ../index.php?login=empty");
		exit();
	}else{
		$sql = "SELECT * FROM users WHERE user_uid='$uid' OR user_email='$uid'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);

		if ($resultCheck < 1) {
			header("Location: ../index.php?login=error");
			exit();
		}else{
			if ($row = mysqli_fetch_assoc($result)){
				$dehechpwd = password_verify($pwd, $row['user_pwd']);
				
				if ($dehechpwd == false) {
					header("Location: ../index.php?login=error");
					exit();
				}elseif ($dehechpwd == true) {
					$_SESSION['u_id'] = $row['user_id'];
					$_SESSION['u_first'] = $row['user_first'];
					$_SESSION['u_last'] = $row['user_last'];
					$_SESSION['u_uid'] = $row['user_uid'];
					$_SESSION['u_email'] = $row['user_email'];
					$_SESSION['start'] = time();
					$_SESSION['expired'] = $_SESSION['start'] + (120 * 60);

					header("Location: ../home.php?login=success");
					exit();
				}
			}
		}
	}




}else{
	header("Location: ../index.php?login=error");
}

// mysqli_fetch_assoc = convert db in array();
