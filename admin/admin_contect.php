<?php
include_once('dbh.inc.php');
$now = time();
if ($now > $_SESSION['expired']) {
    session_unset();
    session_destroy();
    header("Location: ../index.php?login=session_expired");
}
$uid = $_SESSION['u_id']
$sql = "SELECT * FROM users WHERE NOT user_uid="vaha123";";
$result = mysqli_query($conn, $sql);
?>

<!-- Admin view  -->
<div class="row">
  <?php
  $users = mysqli_num_rows($result);
  if($users > 0){
    while ($row = mysqli_fetch_assoc($resultImg)) {
      echo "<div>";
      if ($row['user_status'] == 0) {
        echo "
        <div class='col-sm-6 col-md-4'>
          <div class='thumbnail'>
            <img src='../uploads/profile$uid.jpg' class='thumbnail image'/>
            <div class='caption'>
              <h3>Thumbnail label</h3>
              <p>...</p>
              </div>
          </div>
        </div>
        ";
      }else{
        echo "
        <div class='col-sm-6 col-md-4'>
          <div class='thumbnail'>
            <img src='../uploads/profiledefault.jpg' class='thumbnail image' />
            <div class='caption'>
              <h3>Thumbnail label</h3>
              <p>...</p>
              </div>
          </div>
        </div>
        ";
        $setstatus = "UPDATE users SET user_status=1 WHERE user_id='$uid'";
        return $setstatus;
      }
      echo "</div>";
    }
  }?>
</div>
