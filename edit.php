<?php

//finish edit.php form, when Vahidin click on submit button let save data!
include_once('includes/dbh.inc.php');
session_start(); include("partials/header.php");
$userId = $_GET['id'];
include_once("partials/navbar.php");
$sql = "SELECT * FROM users WHERE user_id=$userId";
$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($result)) { ?>

<div class="jumbotron row">
  <h3 class="text-center">User informations <small>Personal informations</small></h3>
  <div class="vertical-line col-md-6">
    <ul style="list-style-type:circle;">
      <br><br><br>
      <form class="form-group" method="POST">
        <label for="">First name</label>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1">@</span>
          <input type="text" name="user_first" value="<?=$row['user_first']?>" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
        </div>
        <label for="">Last name</label>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1">@</span>
          <input type="text" name="user_last" value="<?=$row['user_last']?>" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
        </div>
        <label for="">Midle name</label>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1">@</span>
          <input type="text" name="user_uid" value="<?=$row['user_email']?>" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
        </div>
        <label for="">E-mail</label>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1">@</span>
          <input type="email" name="user_email" value="<?=$row['user_uid']?>" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
        </div>
        <label for="">User password</label>
        <div class="input-group">
          <li><p><small>User pwd: </small><span class="label label-warning"><?= $row['user_pwd']?></span></b></p></li>
        </div>
      </form>
  </div>
  <div class="col-md-1"></div>
  <div class="col-md-4">
    <h3>Hello, world!</h3>
    <?php include_once('includes/check.php');?>
    <form method="POST" action="includes/upload.php" enctype="multipart/form-data">
      <input type="file" name="file" required><br>
      <?php include('functions/select_profile.php');?>
      <p><button type="submit" name="submit" class="btn btn-primary btn-lg" >UPLOAD</button></p>
    </form>
  </div>

</div>
<?php }
include_once("partials/footer.php");

if (isset($_POST['submit'])) {

}
 ?>
