<?php
include_once('Controller.php');
/**
 *Admin controller
 *Include init.php document here and in user.controller.php as well
 */
class Admin extends Controler
{

$result = "SELECT * FROM users where id='$uid'";

public function show($id)
{
  // $userId = mysqli_query($conn, $userId);
  header('Location: views/admin/show.php?id='.$id);
}

}
