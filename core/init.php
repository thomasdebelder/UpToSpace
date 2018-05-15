<?php 
	session_start();
	include_once('database/connection.php');
    include_once('classes/user.php');
    include_once('classes/tweet.php');
	include_once('classes/follow.php');
	include_once('classes/message.php');
    //je kan globale variabelen vanaf elke plek oproepen (ook vanuit functies of methodes)
      global $pdo;

  	$getFromU = new User($pdo);
  	$getFromT = new Tweet($pdo);
    $getFromF = new Follow($pdo);
    $getFromM = new Message($pdo);

        
    // gevonden in een tutorial zo moet je niet over de poort veranderen 
    // BASE_URL overal zetten en het werkt
    
define('BASE_URL', 'http://localhost/UpToSpace/');