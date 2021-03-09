<?php



/****************helper functions ********************/


function clean($string) {

    return htmlentities($string);

}



function redirect($location){

    return header("Location: {$location}");

}


function set_message($message) {


	if(!empty($message)){


		$_SESSION['message'] = $message;

	}else {

		$message = "";

	}


}



function display_message(){


	if(isset($_SESSION['message'])) {


		echo $_SESSION['message'];

		unset($_SESSION['message']);

	}



}



function token_generator(){


$token = $_SESSION['token'] =  md5(uniqid(mt_rand(), true));

return $token;


}


function validation_errors($error_message) {

$error_message = <<<DELIMITER

<div class="alert alert-warning alert-dismissible" role="alert">
  	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  	<strong>Aviso!</strong> $error_message
 </div>
DELIMITER;

return $error_message;
		




}




function email_exists($email) {

	$sql = "SELECT id FROM users WHERE email = '$email'";

	$result = query($sql);

	if(row_count($result) == 1 ) {

		return true;

	} else {


		return false;

	}



}



function username_exists($username) {

	$sql = "SELECT id FROM users WHERE username = '$username'";

	$result = query($sql);

	if(row_count($result) == 1 ) {

		return true;

	} else {


		return false;

	}



}


function send_email($email, $subject, $msg, $headers){


return mail($email, $subject, $msg, $headers);


}



/****************Validation functions ********************/



function validate_user_registration(){

	$errors = [];

	$min = 3;
	$max = 100;



	if($_SERVER['REQUEST_METHOD'] == "POST") {


		$name 		= clean($_POST['first_name']);
		$email 				= clean($_POST['email']);
		$password			= clean($_POST['password']);
		$confirm_password	= clean($_POST['confirm_password']);
        $clinic			    = clean($_POST['clinic']);
        $active			    = clean($_POST['active']);
        $role 				= clean($_POST['role']);
        



		if(strlen($name) < $min) {

			$errors[] = "El nombre debe contener mínimo {$min} caracteres";

		}

		if(strlen($name) > $max) {

			$errors[] = "El nombre debe contener mánimo {$max} caracteres";

		}






		if(email_exists($email)){

			$errors[] = "Lo sentiemos este error ya esta en uso";

		}




		if(strlen($email) < $min) {

			$errors[] = "El email no puede contener más de  {$max} caracteres";

		}

		if($password !== $confirm_password) {

			$errors[] = "Las contraseña no coincide";

		}



		if(!empty($errors)) {

			foreach ($errors as $error) {

			echo validation_errors($error);

			
			}


		} else {


			if(register_user($name, $email, $password, $clinic, $role, $active)) {



				set_message("<p class='bg-success text-center'>Usuario agregado</p>");

				redirect("users.php");


			} else {


				set_message("<p class='bg-danger text-center'>Lo sentimos no pudimos agregar al usuario</p>");

				redirect("users.php");

			}



		}



	} // post request 



} // function 

/****************Register user functions ********************/

function register_user($name, $email, $password, $clinic, $role, $active) {


	$name = escape($name);
	$email      = escape($email);
	$password   = escape($password);
    $clinic     = escape($clinic);
    $role       = escape($role);
    $active     = escape($active);



	if(email_exists($email)) {


		return false;


	} else {

		$password   = md5($password);

		$validation_code = md5($name . microtime());

		$sql = "INSERT INTO users(name, email, password, validation_code, role, id_clinic, active)";
		$sql.= " VALUES('$name', '$email','$password','$validation_code', '$role', '$clinic', '$active')";
		$result = query($sql);
		confirm($result);


		/*$subject = "Activar centa Sistema Integral Gesión de Clínicas";
		$msg = "Haga clic en el enlace a continuación para activar su cuenta
        http://edwincodecollege.com/login_app/activate.php?email=$email&code=$validation_code
		";

		$headers = "From: noreply@edwincodecollege.com";



		send_email($email, $subject, $msg, $headers);*/


		return true;

	}



} 


/****************Activate user functions ********************/


function activate_user() {


	if($_SERVER['REQUEST_METHOD'] == "GET") {


		if(isset($_GET['email'])) {


			$email = clean($_GET['email']);

			$validation_code = clean($_GET['code']);


			$sql = "SELECT id FROM users WHERE email = '".escape($_GET['email'])."' AND validation_code = '".escape($_GET['code'])."' ";
			$result = query($sql);
			confirm($result);

			if(row_count($result) == 1) {

			$sql2 = "UPDATE users SET active = 1, validation_code = 0 WHERE email = '".escape($email)."' AND validation_code = '".escape($validation_code)."' ";	
			$result2 = query($sql2);
			confirm($result2);

			set_message("<p class='bg-success'>Your account has been activated please login</p>");

			redirect("login.php");


		} else {

			set_message("<p class='bg-danger'>Sorry Your account could not be activated </p>");

			redirect("login.php");


			}




		} 


	}



} // function 

/****************Validate user login functions ********************/



function validate_user_login(){

	$errors = [];

	$min = 3;
	$max = 20;



	if($_SERVER['REQUEST_METHOD'] == "POST") {


		$email 		= clean($_POST['email']);
		$password	= clean($_POST['password']);
		$remember   = isset($_POST['remember']);




		if(empty($email)) {

			$errors[] = "Ingresa tu email";

		}


		if(empty($password)) {

			$errors[] = "Ingresa tu contraseña";

		}



		if(!empty($errors)) {

				foreach ($errors as $error) {

				echo validation_errors($error);

				
				}


			} else {


				if(login_user($email, $password, $remember)) {


					redirect("sistema/");


				} else {


				echo validation_errors("que paso que paso");		



				}



			}



	}


} // function 





/****************User login functions ********************/


	function login_user($email, $password, $remember) {


		$sql = "SELECT password, id, role, name FROM users WHERE email = '".escape($email)."' AND active = 1";

		$result = query($sql);

		if(row_count($result) == 1) {

			$row = fetch_array($result);

			$db_password = $row['password'];
            $userId = $row['id'];
            $roleId = $row['role'];
            $user_name = $row['name'];

			if(md5($password) === $db_password) {

				if($remember == "on") {

					setcookie('email', $email, time() + 86400);

				}


				$_SESSION['email'] = $email;
                $_SESSION['user_name'] = $user_name;
                $_SESSION['id_user'] = $userId;
                $_SESSION['role_user'] = $roleId;
                $_SESSION['typo_user'] = '1';
                
                


				return true;

			} else {


				return false;
			}









			return true;

		} else {


			return false;



		}



	} // end of function



/****************logged in function ********************/



function logged_in(){

	if(isset($_SESSION['user_name'])){


		return true;

	} else {


		return false;
	}

}	// functions




/****************Recover Password function ********************/



function recover_password() {


	if($_SERVER['REQUEST_METHOD'] == "POST") {

		if(isset($_SESSION['token']) && $_POST['token'] === $_SESSION['token']) {

			$email = clean($_POST['email']);


			if(email_exists($email)) {


			$validation_code = md5($email . microtime());


			setcookie('temp_access_code', $validation_code, time()+ 900);


			$sql = "UPDATE users SET validation_code = '".escape($validation_code)."' WHERE email = '".escape($email)."'";
			$result = query($sql);



			$subject = "Please reset your password";
			$message =  " Here is your password rest code {$validation_code}

			Click here to reset your password http://edwincodecollege.com/login_app/code.php?email=$email&code=$validation_code

			";

			$headers = "From: noreply@@edwincodecollege.com";





			send_email($email, $subject, $message, $headers);




			set_message("<p class='bg-success text-center'>Please check your email or spam folder for a password reset code</p>");

			redirect("index.php");


			} else {


				echo validation_errors("This emails does not exist");


			}



		} else {


			redirect("index.php");

		}




		// token checks

 
		if(isset($_POST['cancel_submit'])) {

			redirect("login.php");


		}



	} // post request





} // functions




/**************** Code  Validation ********************/


function validate_code () {


	if(isset($_COOKIE['temp_access_code'])) {

			if(!isset($_GET['email']) && !isset($_GET['code'])) {

				redirect("index.php");


			} else if (empty($_GET['email']) || empty($_GET['code'])) {

				redirect("index.php");


			} else {



				if(isset($_POST['code'])) {

					$email = clean($_GET['email']);

					$validation_code = clean($_POST['code']);

					$sql = "SELECT id FROM users WHERE validation_code = '".escape($validation_code)."' AND email = '".escape($email)."'";
					$result = query($sql);

					if(row_count($result) == 1) {

						setcookie('temp_access_code', $validation_code, time()+ 900);

						redirect("reset.php?email=$email&code=$validation_code");


					} else {



						echo validation_errors("Sorry wrong validation code");

					}
		




				}



			}








	} else {

		set_message("<p class='bg-danger text-center'>Sorry your validation cookie was expired</p>");

		redirect("recover.php");


	}







}



/**************** Password Reset Function ********************/


function password_reset() {

	if(isset($_COOKIE['temp_access_code'])) {


		if(isset($_GET['email']) && isset($_GET['code'])) {



			if(isset($_SESSION['token']) && isset($_POST['token'])) {


				if($_POST['token'] === $_SESSION['token']) {


					if($_POST['password']=== $_POST['confirm_password'])  { 


						$updated_password = md5($_POST['password']);


						$sql = "UPDATE users SET password = '".escape($updated_password)."', validation_code = 0 WHERE email = '".escape($_GET['email'])."'";
						query($sql);



						set_message("<p class='bg-success text-center'>You passwords has been updated, please login</p>");

						redirect("login.php");
						

						} else {

							echo validation_errors("Password fields don't match");


						}


				  }

	

			} 



		} 


	}else {


		set_message("<p class='bg-danger text-center'>Sorry your time has expired</p>");

		redirect("recover.php");




		}


}











