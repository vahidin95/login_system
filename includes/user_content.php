<?php
include_once('dbh.inc.php');
$now = time();
if ($now > $_SESSION['expired']) {
    session_unset();
    session_destroy();
    header("Location: ../index.php?login=session_expired");
}

?>
<div class="jumbotron row">
  <h3 class="text-center">User informations <small>Personal informations</small></h3>
  <div class="vertical-line col-md-7">
    <ul style="list-style-type:circle;">
      <br><br><br><br><br>
      <li><p><small>User first: </small><b><?php echo $_SESSION['u_first']?></b></p></li>
      <li><p><small>User last: </small><b><?php echo $_SESSION['u_last']?></b></p></li>
      <li><p><small>User uid: </small><b><?php echo $_SESSION['u_uid']?></b></p></li>
      <li><p><small>User email: </small><b><?php echo $_SESSION['u_email']?></b></p></li>
    </ul >
  </div>
  <div class="col-md-4">
    <h3>Hello, world!</h3>
    <form method="POST" action="includes/upload.php" enctype="multipart/form-data">
      <input type="file" name="file" required><br>
      <?php include_once('check.php'); include('functions/select_profile.php');?>
      <p><a class="btn btn-primary btn-lg" type="submit" name="submit" role="button">UPLOAD</a></p>
    </form>
  </div>

</div>
