<?php
include_once('../includes/dbh.inc.php');

$userId = $_GET['id'];
//die(var_dump($userId));
$query = "DELETE FROM users WHERE user_id=$userId;";

$user_photo = "../uploads/profile$userId.jpg";


   if (file_exists($user_photo)) {
      unlink($user_photo);
   }

   if (mysqli_query($conn, $query)) {
     header('Location: ../list.php?delete=success');
   }else {
     header('Location: ../list.php?delete=error');
   }
