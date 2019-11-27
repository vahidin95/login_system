<!doctype html>
<html lang="en">
<?php include("partials/header.php"); include('includes/dbh.inc.php'); ?>
  <body>
    <?php include("partials/navbar.php"); ?>
    <div class="container">
      <div class="col-md-offset-3 col-md-6">
        <br>
        <?php include('includes/check.php'); ?>
        <form method="POST" action="includes/singup.php">
          <?php 
            echo "<input type='hidden' name='id'/>";
            if (isset($_GET['first'])) {
              $first = $_GET['first'];
              echo '<div class="form-group">
            <label>Name:</label>
            <input name="first" type="text" class="form-control" placeholder="Enter name" value="'.$first.'">
          </div>';
            }else {
              echo ' <div class="form-group">
            <label>Name:</label>
            <input name="first" type="text" class="form-control" placeholder="Enter name">
          </div>';
            }
            if (isset($_GET['last'])) {
              $last = $_GET['last'];
              echo '<div class="form-group">
            <label>Name:</label>
            <input name="last" type="text" class="form-control" placeholder="Enter last" value="'.$last.'">
          </div>';
            }else {
              echo ' <div class="form-group">
            <label>Last:</label>
            <input name="last" type="text" class="form-control" placeholder="Enter last">
          </div>';
            }
            if (isset($_GET['email'])) {
              $email = $_GET['email'];
              echo '<div class="form-group">
            <label>Name:</label>
            <input name="email" type="text" class="form-control" placeholder="Enter name" value="'.$email.'">
          </div>';
            }else {
              echo ' <div class="form-group"> 
            <label>Email:</label>
            <input name="email" type="text" class="form-control" placeholder="Enter email">
          </div>';
            }
            if (isset($_GET['uid'])) {
              $uid = $_GET['uid'];
              echo '<div class="form-group">
            <label>Uid:</label>
            <input name="uid" type="text" class="form-control" placeholder="Enter uid" value="'.$uid.'">
          </div>';
            }else {
              echo ' <div class="form-group">
            <label>Uid:</label>
            <input name="uid" type="text" class="form-control" placeholder="Enter uid">
          </div>';
            }

          ?>
            <label>Password</label>
            <input type="password" name="pwd" class="form-control" placeholder="Password"><br>
            <button type="submit" class="btn btn-success" name="submit">Submit</button>
          </div>
        </form>
  </div>

<?php
/*
$sqll = "SELECT * FROM users";
$result = mysqli_query($conn, $sqll);
$datas = array();

if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $datas[] = $row;
  }
}

//print_r($datas);
foreach ($datas[0] as $data) {
  echo $data."<br>";
}
*/
?>




    </div>
  </body>
</html>