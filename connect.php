<?php
$dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname = 'signup_login';
   $link = mysqli_connect( $dbhost, $dbuser, $dbpass, $dbname);

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    exit;
}

?>