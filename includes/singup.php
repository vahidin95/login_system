<?php
session_start();

if (isset($_POST['submit'])) {

include_once('dbh.inc.php');

function test_input($data) {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
}
//$id = $_SESSION['u_id'];
$first = test_input($_POST['first']) ;
$last = test_input($_POST['last']);
$email = test_input($_POST['email']);
$uid = test_input($_POST['uid']);
$pwd = test_input($_POST['pwd']);

//$_SESSION['email'] = $_POST['email'];

//$sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd)
//VALUES ('?', '?', '?', '?', '?') ;";


if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) {
	header("Location: ../index.php?singup=empty&first=$first&last=$last&email=$email&uid=$uid");
	exit();
}else{
	if (!preg_match("/^[a-zA-Z ]*$/",$first) || !preg_match("/^[a-zA-Z ]*$/",$last)) {
		header("Location: ../index.php?singup=char&email=$email&uid=$uid");
		exit();
	}else{
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location: ../index.php?singup=email&first=$first&last=$last&uid=$uid");
		exit();
		}else{

			$sql = "SELECT * FROM users WHERE user_uid='$uid';";
			$result = mysqli_query($conn, $sql);
			$resultsCheck = mysqli_num_rows($result);

			if ($resultsCheck > 0) {
				header("Location: ../index.php?singup=usertaken&first=$first&last=$last&email=$email");
				exit();
			}
			if (strlen($pwd) < 8) {
				header("Location: ../index.php?singup=pass&first=$first&last=$last&email=$email&uid=$uid");
				exit();
			}if (!preg_match("#[0-9]+#",$pwd)) {
				header("Location: ../index.php?singup=passone&first=$first&last=$last&email=$email&uid=$uid");
			}
			else{
				if (!preg_match("#[A-Z]+#",$pwd)) {
					header("Location: ../index.php?singup=passtwo&first=$first&last=$last&email=$email&uid=$uid");
				}else{
					if (!preg_match("#[a-z]+#",$pwd)) {
						header("Location: ../index.php?singup=passthree&first=$first&last=$last&email=$email&uid=$uid");
					exit();
					}else{

					$hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);

					//Saving data!
					$stmt = $conn->prepare("INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd)
					VALUES (?,?,?,?,?)");
					$stmt->bind_param("sssss", $first, $last, $email, $uid, $hashedpwd);
					$stmt->execute();
					//die(var_dump($uid));
					$sql = "SELECT * FROM users";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_assoc($result)) {

              $_SESSION['u_id'] = $row['user_id'];
    					$_SESSION['u_first'] = $row['user_first'];
    					$_SESSION['u_last'] = $row['user_last'];
    					$_SESSION['u_uid'] = $row['user_uid'];
    					$_SESSION['u_email'] = $row['user_email'];

						}
					}else{
						die(var_dump("error!"));
					}
          //die(var_dump($_SESSION['u_id']));
					header("Location: ../home.php?singup=success");
					}
				}
			}
		}
	}
// mysqli_query($conn, $sql);
}

}else{
	header("Location: ../index.php");
}






?>
