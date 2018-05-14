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
  
	public function loggedIn() {
		return (isset($_SESSION['user_id'])) ? true : false;
	}
  /*
  ------------------------
          LOGIN FEATURE 2
  ------------------------        
  */
  public function login($email, $password){
    $stmt = $this->pdo->prepare('SELECT `user_id`,`password` FROM `users` WHERE `email` = :email');
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_OBJ);
    $hash = $user->password;
    
    if(password_verify($password, $hash)){
      $_SESSION['user_id'] = $user->user_id;
      header('Location: home.php');
    }
    else {
      return false;
    }
  }
  /*
  ------------------------
          PROFILE
  ------------------------        
  */
  public function userIdbyUsername($username) {
    $stmt = $this->pdo->prepare("SELECT `user_id` FROM `users` WHERE (`username` = :username)");
    $stmt->bindParam("username", $username, PDO::PARAM_STR);
    $stmt->execute();
  
    $user = $stmt->fetch(PDO::FETCH_OBJ);
    
    return $user->user_id;
  }
  /*
  ------------------------
          EDIT USER PROFILE EDIT.php 
  ------------------------        
  */
  public function userData($user_id) {
    $stmt = $this->pdo->prepare('SELECT * FROM `users` WHERE `user_id` = :user_id');
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_OBJ);
}
/*
          IMAGE UPLOADE
*/
  public function uploadImage($file) {
    $filename   = $file['name'];
    $fileTmp    = $file['tmp_name'];
    $fileSize   = $file['size'];
    $errors     = $file['error'];
   
    $ext = explode('.', $filename);
    $ext = strtolower(end($ext));
   
    $allowed_extensions  = array('jpg','png','jpeg');
 
    if(in_array($ext, $allowed_extensions)) {
     
      if($errors ===0) {
       
        if($fileSize <= 2097152) {
          $root = 'users/' . $filename;
          move_uploaded_file($fileTmp,$_SERVER['DOCUMENT_ROOT'].'/twitter/'.$root);
          
          return $root;
        }
        else {
          $GLOBALS['imgError'] = "File Size is too large";
        }
     }
   }
    else {
     $GLOBALS['imgError'] = "Only alloewd JPG, PNG JPEG extensions";
    }
 }
 /*
          UPDATE
*/
 public function update($table, $user_id, $fields) {
  $columns = '';
  $i       = 1;

  foreach ($fields as $name => $value) {
    $columns .= "`{$name}` = :{$name} ";
if($i < count($fields)) {
  $columns .= ', ';
  }
  $i++;
  }
  $sql = "UPDATE {$table} SET {$columns} WHERE `user_id` = {$user_id}";
  
  if($stmt = $this->pdo->prepare($sql)) {
    foreach ($fields as $key => $value) {
    $stmt->bindValue(':'.$key, $value);
  }
  $stmt->execute();
  }
}
 /*
          DELETE
*/
  public function delete($table, $array) {
    $sql   = "DELETE FROM '{$table}'" .  
    $where = " WHERE ";

    foreach($array as $key => $value) {
      $sql .= "{$where} '{$name}' = :{name}";
      //$sql .= $where . $key . " = '" . $value . "'";
      $where = " AND ";
    }
    if($stmt = $this->pdo->prepare($sql)) {
      foreach($arry as $name => $value) {
        $stmt->bindValue(':' .$name, $value);
        //sql .= ";";
        //$stmt = $this->pdo->prepare($sql);
        //$stmt->execute();
      } 
      $stmt->execute();
    }
  }
} // end of User class
?>