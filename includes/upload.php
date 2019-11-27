<?php
session_start();
include('dbh.inc.php');
$id  = $_SESSION['u_id'];
//die(var_dump($id));
if (isset($_POST['submit'])) {
	$file = $_FILES['file'];
	//print_r($file);
	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];
	$fileExt = explode(".", $fileName); //we explode $fileName on two peaces of data from (.);
	$fileActualExt = strtolower(end($fileExt)); // now we make sure that uploaded file extencion is lower case;
	// end() take last key in an array;
	$allow = array('jpg', 'jpeg', 'png', 'pdf'); // which file extencion we want to allow to user upload;
	if (in_array($fileActualExt , $allow)) { // in_array() function with first param inside chech if it exist in array which we put inside like another param.
		if ($fileError === 0) {
			if ($fileSize < 1000000) {
				$fileNameNew = "profile".$id.".".$fileActualExt; //uniqid() function take random numbers and letters but when type inside single counts and then true parameter we tell our function that we actualy just want miliceound as our unq id.
				$fileDestination = "../uploads/". $fileNameNew; //our new destination because if we did not determine the location it will be saved in tmp folder which we wont to do in our case.
				move_uploaded_file($fileTmpName, $fileDestination); //now we moved our file from .tmp folder to our new destination which we create up here.
				$sql = "UPDATE userprofile SET status=0 WHERE userid='$id'";
				$results = mysqli_query($conn, $sql);
				header("Location: ../home.php?upload=success");
			}else{
				echo "Your file is too big for upload!";
			}
		}else{
			echo "There was an error uploading your file";
		}
	}else{
		echo "You cannot upload file with that type!";
	}
}else{
	header("Location: ../home.php");
}
?>