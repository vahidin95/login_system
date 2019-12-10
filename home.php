<!doctype html>
<html lang="en">
<?php session_start(); include("partials/header.php");  ?>
  <body>
  <div class="container">
    <div class="row">
      <?php include("partials/navbar.php"); ?>
      <div class="container">
      <?php if (!isset($_SESSION['u_uid'])) {
      	echo "You must login to see this page!";
      } else{?>
      	<span class="label label-primary"> <?php echo $_SESSION['u_first']; ?></span>
        <?php include('partials/user_content.php');

      }
      ?>
      </div>
      <?php include('partials/footer.php') ?>
    </div>
  </div>
  </body>
</html>
