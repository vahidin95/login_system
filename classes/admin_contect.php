<?php
include_once('includes/dbh.inc.php');
$now = time();
if ($now > $_SESSION['expired']) {
    session_unset();
    session_destroy();
    header("Location: ../index.php?login=session_expired");
}
$uid = $_SESSION['u_id'];
$sql = "SELECT * FROM users WHERE NOT user_uid='vaha123';";
$result = mysqli_query($conn, $sql);





//die(var_dump($user_photo));
echo "<div class='row'>";

  $users = mysqli_num_rows($result);
  if($users > 0){
    //nk
    while($row = mysqli_fetch_assoc($result)){
      //$uid = $row['user_id'];
      $uid = $row['user_id'];
      $user_photo = 'uploads/profile'.$uid.'.jpg';
      ?>

        <div class='col-sm-6 col-md-4'>
          <div class='thumbnail'>
            <!--check if user have uploaded picture in direction -->

            <?php if(file_exists($user_photo)){

            echo "<img src='../uploads/profile$uid.jpg' class='thumbnail image'/>";

          }else{
             echo "<img src='../uploads/profiledefault.jpg' class='thumbnail image' />";
             $status = $row['user_status'];
             if ($status == 0) {
               $status = "UPDATE users SET user_status=1 WHERE user_id='$uid'; ";
               mysqli_query($conn, $status);
             }
        } ?>

            <div class='caption'>
              <h4 class="text-center">First name: <?= strtoupper($row['user_first']);?></h4>
              <p class="text-center">Last name: <?= $row['user_last']?></p>
              <p class="text-center">Email addr: <?= $row['user_email']?></p>
              <p class="text-center">User uid: <?= $row['user_uid']?></p>
            </div>
            <a href="" class="btn btn-primary">Edit user</a>
            <a href="" class="btn btn-danger pull-right">Delete user</a>
          </div>
        </div> <?php
      }// end while loop
  }else {
    echo "There is no more users except you Vahidine</div>";
  }
