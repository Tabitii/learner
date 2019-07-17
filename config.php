<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'p240539.mysql.ihc.ru');
define('DB_USERNAME', 'p240539_learn');
define('DB_PASSWORD', 'akF25366ct');
define('DB_NAME', 'p240539_learn');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
