<?php 
  class User {
    protected $pdo;

 	public function __construct($pdo) {											
      $this->pdo = $pdo;
	}
    
    public function checkInput($data) {
    //Convert special characters to HTML entities
      $data = htmlspecialchars($data);
      //Strip whitespace
      $data = trim($data);
      $data = stripcslashes($data);
      
      return $data;
	} 
	
	public function preventAccess($request, $currentFile, $currently) {
      if($request == 'GET' && $currentFile == $currently) {
        header('Location: index.php');
      }
	}
	


  public function register($email, $password, $screenName){ 
    $passwordHash = password_hash($password, PASSWORD_BCRYPT); 
    $stmt = $this->pdo->prepare("INSERT INTO `users` (`email`, `password`, `screenName`, `profileImage`, `profileCover`) VALUES (:email, :password, :screenName, 'assets/images/defaultprofileimage.png', 'assets/images/defaultCoverImage.png')"); 
    $stmt->bindParam(":email", $email, PDO::PARAM_STR); 
     $stmt->bindParam(":password", $passwordHash , PDO::PARAM_STR); 
    $stmt->bindParam(":screenName", $screenName, PDO::PARAM_STR); 
    $stmt->execute(); 

    $user_id = $this->pdo->lastInsertId(); 
    $_SESSION['user_id'] = $user_id; 
  }

   
	public function create($table, $fields = array()) {
      $columns = implode(',', array_keys($fields));
      $values  = ':'.implode(', :', array_keys($fields));
      $sql     = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";

        if($stmt = $this->pdo->prepare($sql)) {
			foreach ($fields as $key => $data) {
		      $stmt->bindValue(':'.$key, $data);
		    }
		$stmt->execute();
		
        return $this->pdo->lastInsertId();
		}
	}

<<<<<<< HEAD
=======
	

	public function checkUsername($username) {
      $stmt = $this->pdo->prepare("SELECT `username` FROM `users` WHERE `username` = :username");
      $stmt->bindParam(':username', $username, PDO::PARAM_STR);
      $stmt->execute();

      $count = $stmt->rowCount();
      if($count > 0) {
		return true;
      }
      else {
        return false;
      }
	}


	public function checkEmail($email) {
      $stmt = $this->pdo->prepare("SELECT `email` FROM `users` WHERE `email` = :email");
      $stmt->bindParam(':email', $email, PDO::PARAM_STR);
      $stmt->execute();

      $count = $stmt->rowCount();
      if($count > 0) {
        return true;
      }
      else {
        return false;
      }
	}	

>>>>>>> 47d6c79bf2b67d5d9da2edf139e320c93a2fd476
	public function loggedIn() {
		return (isset($_SESSION['user_id'])) ? true : false;
	}

	public function userIdbyUsername($username) {
      $stmt = $this->pdo->prepare("SELECT `user_id` FROM `users` WHERE (`username` = :username)");
      $stmt->bindParam("username", $username, PDO::PARAM_STR);
      $stmt->execute();
	    
      $user = $stmt->fetch(PDO::FETCH_OBJ);
	  return $user->user_id;
	}



     
}
?>