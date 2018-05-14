<?php 
	session_start();
	include 'database/connection.php';
	include 'classes/user.php';
    //je kan globale variabelen vanaf elke plek oproepen (ook vanuit functies of methodes)
      global $pdo;

  	$getFromU = new User($pdo);

        
    // gevonden in een tutorial zo moet je niet over de poort veranderen 
    // BASE_URL overal zetten en het werkt
    
define('BASE_URL', 'http://localhost:8888/UpToSpace/');