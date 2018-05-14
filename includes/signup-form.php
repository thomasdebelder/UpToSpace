<?php
if ($_SERVER['REQUEST_METHOD'] == "GET" && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
	header('Location: index.php');
}
if(isset($_POST['signup'])){
    //ophalen ingegeven values bij input velden
    $screenName = $_POST['screenName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConfirm = $_POST['passwordConfirm'];
    $error = '';
    if(empty($screenName) or empty($password) or empty($email)){
        $error = 'All fields are required';
    }else {
        $email = $getFromU->checkInput($email);
        $screenName = $getFromU->checkInput($screenName);
        $password = $getFromU->checkInput($password);
        if(!filter_var($email)) {
            $error = 'Invalid email format';
        }
        else if(strlen($screenName) > 20){
            $error = 'Name must be between in 6-20 characters';
        }
        else if(strlen($password) < 5){
            $error = 'Password is too short';
        }
        else if($password != $passwordConfirm ) {
            $error = 'Please put in the same password twice';
        }

        else {
            if($getFromU->checkEmail($email) === true){
                $error = 'Email is already in use';
            }else {
                $user_id = $getFromU->create('users', array('email' => $email, 'password' => password_hash($password, PASSWORD_BCRYPT) , 'screenName' => $screenName, 'profileImage' => 'assets/images/defaultProfileImage.png', 'profileCover' => 'assets/images/defaultCoverImage.png'));
                $_SESSION['user_id'] = $user_id;
                header('Location: home.php');
            }
        }
    }
}
?>
<form method="post">

	<h3>Sign up </h3>
	<ul>
		<li>
		    <input type="text" name="screenName" class="form-control" placeholder="Full Name"/>
		</li>
		<li>
		    <input type="email" name="email" class="form-control" placeholder="Email"/>
		</li>
		<li>
			<input type="password" name="password" class="form-control" placeholder="Password"/>
		</li>

        <li>
            <input type="password" name="passwordConfirm" class="form-control" placeholder="Confirm Password"/>
        </li>
		<li>
			<input type="submit" name="signup" Value="Register">
		</li>
		<?php
      if(isset($error)){
        echo '<li class="error-li">
        <div class="span-fp-error">'.$error.'</div>
        </li>';
      }
    ?>
	</ul>

</form>
