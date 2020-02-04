<?php

$dbhost = "localhost";
$dbusername = "root";
$dbpassword = "root";
$dbname = "sitePronoTest";
$dboption = array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Connection to database :
try {
    $db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword, $dboption);
    echo "Connected successfully";
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}

session_start();

?>