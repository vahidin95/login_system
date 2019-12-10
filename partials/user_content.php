<?php
include_once('includes/dbh.inc.php');
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
      <li><p><small>User first: </small><span class="label label-primary"> <?php echo $_SESSION['u_first']; ?></span></p></li>
      <li><p><small>User last: </small><span class="label label-primary"> <?php echo $_SESSION['u_last']; ?></span></b></p></li>
      <li><p><small>User uid: </small><span class="label label-primary"> <?php echo $_SESSION['u_uid']; ?></span></b></p></li>
      <li><p><small>User email: </small><span class="label label-primary"> <?php echo $_SESSION['u_email']; ?></span></b></p></li>
    </ul >
  </div>
  <div class="col-md-4">
    <h3>Hello, world!</h3>
    <form method="POST" action="includes/upload.php" enctype="multipart/form-data">
      <input type="file" name="file" required><br>
      <?php include_once('includes/check.php'); include('functions/select_profile.php');?>
      <p><button type="submit" name="submit" class="btn btn-primary btn-lg" >UPLOAD</button></p>
    </form>
  </div>

</div>
