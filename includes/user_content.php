<?php
include_once('dbh.inc.php');


?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title text-center">Welcome to this page</h3>
  </div>
  <div class="panel-body">
    this is the start of a good website
  </div>
</div>
<form method="POST" action="includes/upload.php" enctype="multipart/form-data">
  <input type="file" name="file" required><br>
  <?php include_once('check.php'); ?>
  <button type="submit" name="submit">UPLOAD</button>
</form>

<?php


	$sql = "SELECT * FROM users";
	$result = mysqli_query($conn, $sql);
	$userId = $_SESSION['u_id'];
	$sqlImages = "SELECT * FROM users WHERE user_id='$userId'";
	$resultImg = mysqli_query($conn, $sqlImages);
	if (mysqli_num_rows($result) > 0) {

	while ($row = mysqli_fetch_assoc($resultImg)) {
		echo "<div>";
    $uid = $row['user_id'];
		if ($row['user_status'] == 0) {
      //die(var_dump($uid));
			echo "<img src='../uploads/profile$uid.jpg' class='thumbnail image'/>";
		}else{
			echo "<img src='../uploads/profiledefault.jpg' class='thumbnail image' />";
      $setstatus = "UPDATE users SET user_status=1 WHERE user_id='$uid'";
		}
		echo "</div>";
	}
}

/*
$id  = $_SESSION['u_uid'];
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	if ($row = mysqli_fetch_assoc($result)) {
		$id = $row['user_id'];
		$sqlImg = "SELECT * FROM users WHERE user_id='$id'";
		$resultImg = mysqli_query($conn, $sqlImg);
		if($rowImg = mysqli_fetch_assoc($resultImg)) {
			echo "<div>";
			if ($rowImg['user_status'] == 0) {
				echo "<img src='../uploads/profile".$id.".jpg'/>";
				}else{
					echo "<img src='../uploads/profiledefault.jpg'/>";
				}
					echo "</div>";
					echo $_SESSION['u_first'];
				}
	}
}
*/
?>
