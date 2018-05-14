<?php
if ($_SERVER['REQUEST_METHOD'] == "GET" && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
	header('Location: index.php');
}
if(isset($_POST['signup'])){
    //uitlezen values input names, bij niet ingevuld een error geven
    $screenName = $_POST['screenName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConfirm = $_POST['passwordConfirm'];
    $error = '';
    if(empty($screenName) or empty($password) or empty($email)){
        $error = 'All fields are required';
    }else {

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
