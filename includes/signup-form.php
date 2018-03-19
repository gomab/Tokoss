<?php
	if(isset($_POST['signup'])){
		$screenName = $_POST['screenName'];
		$password   = $_POST['password'];
		$email      = $_POST['email'];
		$errors     = '';

		if(empty($screenName) or empty($password) or empty($email)){
			$error = 'All fields are required';
		}else{
			$email      = $getFromU->checkInput($email);  
			$screenName = $getFromU->checkInput($screenName);  
			$password   = $getFromU->checkInput($password); 

			if(!filter_var($email)){
				$error = 'Invalid email format';
			} else if(strlen($screenName) > 20){
				$error = 'Name must be between in 6-20 characters';
			}elseif (strlen($password) < 5 ) {
				$error = 'password is too short';
			}else{
				if($getFromU->checkEmail($email) === true){
					$error = 'Email is already in use';
				}else{

				}
			}
		}
	}
?>

<form method="post">
<div class="signup-div"> 
	<h3>Sign up </h3>
	<ul>
		<li>
		    <input type="text" name="screenName" placeholder="Full Name"/>
		</li>
		<li>
		    <input type="email" name="email" placeholder="Email"/>
		</li>
		<li>
			<input type="password" name="password" placeholder="Password"/>
		</li>
		<li>
			<input type="submit" name="signup" Value="Signup for Tokoss">
		</li>

		<?php if(isset($error))
			{
		 		?>
		 			<li class="error-li">
					  <div class="span-fp-error"><?= $error; ?></div>
					</li> 
		 		<?php
			}
	    ?>		
	</ul>

</div>
</form>