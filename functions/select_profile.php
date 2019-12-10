<?php
$uid = $_SESSION['u_id'];
$sqlImages = "SELECT * FROM users WHERE user_id='$uid'";
$resultImg = mysqli_query($conn, $sqlImages);
if (mysqli_num_rows($resultImg) > 0) {

while ($row = mysqli_fetch_assoc($resultImg)) {
  echo "<div>";
  if ($row['user_status'] == 0) {
    //die(var_dump("../uploads/profile$uid.jpg"));
    echo "<img src='../uploads/profile$uid.jpg' class='thumbnail image'/>";
  }else{
    echo "<img src='../uploads/profiledefault.jpg' class='thumbnail image' />";
    $setstatus = "UPDATE users SET user_status=1 WHERE user_id='$uid'";
    mysqli_query($conn, $setstatus);
  }
  echo "</div>";
}
}
