<!doctype html>
<html lang="en">
<?php
session_start();
include("partials/header.php");
//die(var_dump($_SESSION['u_uid']));
if ($_SESSION['u_uid'] != "vaha123") {
  header('Location: home.php?access=denied');
}
?>
  <body>
  <div class="container">
    <div class="row">
      <?php include("partials/navbar.php"); ?>
      <div class="container">
      <?php if (!isset($_SESSION['u_uid'])) {
      	echo "You must login to see this page!";
      } else{
      	echo $_SESSION['u_uid'] ." are our admin Selam alejkum!";
      	include('partials/admin_contect.php');

      }
      ?>
      </div>
      <?php include('partials/footer.php') ?>
    </div>
  </div>
  </body>
</html>
