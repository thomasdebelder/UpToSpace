<?php
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == "GET" && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
  header('Location: index.php');
}
  if(isset($_POST['login']) && !empty($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($email) or !empty($password)) {
      $email = $getFromU->checkInput($email);
      $password = $getFromU->checkInput($password);

      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errorMsg = "Invalid format";
      }else {
        if($getFromU->login($email, $password) === false){
          $errorMsg = "The email or password is incorrect!";
        }
      }
    }else {
      $errorMsg = "Please enter username and password!";
    }
  }
?>


<form method="post">
        <h3>Log in </h3>
	<ul>
		<li>
		  <input type="text" name="email" class="form-control" placeholder="Please enter your Email here"/>
		</li>
		<li>
		  <input type="password" name="password" class="form-control" placeholder="password"/><input type="submit" name="login" value="Log in"/>
		</li>

    <?php
      if(isset($errorMsg)){
        echo '<li class="error-li">
        <div class="span-fp-error">'.$errorMsg.'</div>
        </li>';
      }
    ?>
	</ul>

	</form>
