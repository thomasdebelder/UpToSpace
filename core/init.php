<?php
    session_start();
    include_once('database/connection.php');
    //je kan globale variabelen vanaf elke plek oproepen (ook vanuit functies of methodes)
    global $pdo;



    // gevonden in een tutarial zo moet je niet over de poort veranderen 
    // BASE_URL overal zetten en het werkt
    define('BASE_URL', 'http://localhost:8888/twitter/');