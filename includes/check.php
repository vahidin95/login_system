<?php

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


		// Check if User input corect file.
		if(isset($_GET['upload']) ) {

				if ($_GET['upload'] == "success") {
					echo '<div class="alert alert-success" role="alert">
							You succefully upload your image!
				</div>';
			}elseif ($_GET['upload'] == "errorbig") {
				echo '<div class="alert alert-warning" role="alert">
							Your file is too big! Please try with smaller file.
						</div>';
			}elseif ($_GET['upload'] == "error_") {
				echo '<div class="alert alert-warning" role="alert">
							Your have an error in your file!
						</div>';
			}elseif ($_GET['upload'] == "typeerror") {
				echo '<div class="alert alert-warning" role="alert">
							Your file must be with these extensions .jpg .jpeg .png
						</div>';
					}
		}

		//Session check
		if (isset($_GET['login'])) {
			if ($_GET['login'] == "session_expired") {
				echo '<div class="alert alert-warning" role="alert">
								Your session was expired, You have to login again.
							</div>';
			}
		}

		//delete user check

		if (isset($_GET['delete'])) {
			if ($_GET['delete'] == "success") {
				echo '<div class="alert alert-success" role="alert">
							You succefully deleted user!
						</div>';
			}elseif ($_GET['delete'] == "error") {
				echo '<div class="alert alert-warning" role="alert">
							Something went wrong while deleting this user!
							Please try again!
						</div>';
			}
		}

		// Access denied for all who type url directly
		if (isset($_GET['access'])) {
			if ($_GET['access'] == "denied") {
				echo '<div class="alert alert-warning" role="alert">
							You do not have permission to do that!
						</div>';
				 }
		}
