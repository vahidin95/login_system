<?php 
 		/*$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

 		if(strpos($fullUrl, "singup=empty")){
 		echo '<div class="alert alert-danger" role="alert">
			  You did not fill all data in inputs!
			</div>';
		}elseif(strpos($fullUrl, "singup=char")){
 		echo '<div class="alert alert-danger" role="alert">
			  You fill incorect characters in name and lastname!!
			</div>';
 		}elseif(strpos($fullUrl, "singup=email")){
 		echo '<div class="alert alert-danger" role="alert">
			  You fill incorect email!
			</div>';
		}elseif(strpos($fullUrl, "singup=success")){
 		echo '<div class="alert alert-success" role="alert">
			  Your form are saved successfully!
			</div>';
		}else{
		//
	}*/


		if (!isset($_GET['singup'])) {
			//
		}else{
			if ($_GET['singup'] == "empty") {
				echo '<div class="alert alert-danger" role="alert">
					  You did not fill all data in inputs!
					  </div>';
			}elseif($_GET['singup'] == "char"){
					echo '<div class="alert alert-danger" role="alert">
			  You fill incorect characters in name and lastname!!
			</div>';
			}elseif ($_GET['singup'] == "email") {
				echo '<div class="alert alert-danger" role="alert">
			  You fill incorect email!
			</div>';
			}elseif ($_GET['singup'] == "usertaken") {
				echo '<div class="alert alert-danger" role="alert">
			  User alredy taken! Try with another one!
			</div>';
			}elseif ($_GET['singup'] == "pass") {
				echo '<div class="alert alert-danger" role="alert">
			  		Your password must have at least 8 characters!
			</div>';
			}elseif ($_GET['singup'] == "passone") {
				echo '<div class="alert alert-warning" role="alert">
			  		Your Password Must Contain At Least 1 Number!
			</div>';
			}elseif ($_GET['singup'] == "passtwo") {
				echo '<div class="alert alert-warning" role="alert">
			  		Your Password Must Contain At Least 1 Capital Letter!
			</div>';
			}elseif ($_GET['singup'] == "passthree") {
				echo '<div class="alert alert-warning" role="alert">
			  		Your Password Must Contain At Least 1 Lowercase Letter!
			</div>';
			}elseif ($_GET['singup'] == "success") {
				echo '<div class="alert alert-success" role="alert">
			  You are successfully registred on this site!
			</div>';
			}
		}