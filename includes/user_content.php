<?php
include_once('dbh.inc.php');
echo "<h1>You only can see this if you are logged in!</h1>";


?>

<form method="POST" action="includes/upload.php" enctype="multipart/form-data">
  <input type="file" name="file" required><br>
  <button type="submit" name="submit">UPLOAD</button>
</form>

<?php
/*
	$sql = "SELECT * FROM users";
	$result = mysqli_query($conn, $sql);
	$userId = $_SESSION['u_uid'];
	$sqlImages = "SELECT * FROM userprofile WHERE user_id='$userId'";
	$resultImg = mysqli_query($conn, $sqlImages);
	if (mysqli_num_rows($result) > 0) {

	while ($rowImg = mysqli_fetch_assoc($resultImg)) {
		echo "<div>";
		if ($rowImg['status'] == 0) {
			echo "<img src='../uploads/profile".$userId.".jpg'/>";
		}else{
			echo "<img src='../uploads/profiledefault.jpg'/>";
		}
		echo $row['user_first'];
		echo "</div>";
	}
}
*/
$id  = $_SESSION['u_id'];
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$id = $row['user_id'];
		$sqlImg = "SELECT * FROM userprofile WHERE userid='$id'";
		$resultImg = mysqli_query($conn, $sqlImg);
		while($rowImg = mysqli_fetch_assoc($resultImg)) {
			echo "<div>";
			if ($rowImg['status'] == 0) {
				echo "<img src='../uploads/profile".$id.".jpg'/>";
				}else{
					echo "<img src='../uploads/profiledefault.jpg'/>";
				}
					echo "</div>";
					echo $_SESSION['u_first'];
				}
	}
}
?>