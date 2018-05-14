<?php
    $db = 'mysql:host=localhost; dbname=space';
	$user = 'root';
    $password = 'root';
    
    try {
		$pdo = new PDO($db, $user, $password);
	} catch(PDOException $e){
		echo 'connection error! ' . $e;
    }