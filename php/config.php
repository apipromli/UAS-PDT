<?php
// MySQL
$mysql_host = 'mysql-master';
$mysql_db = 'registration';
$mysql_user = 'root';
$mysql_password = 'rootpassword';

$mysqli = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_db);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Redis
$redis = new redis();
$redis->connect('redis', 6379);

// MongoDB
$mongo = new MongoDB\Driver\Manager("mongodb://mongo:27017");
