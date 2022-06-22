<?php
define("DB_SERVERNAME", "locahost");
define("DB_USERNAME","root");
define("DB_PASSWORD", "root");
define("DB_NAME", "university");
define("DB_PORT", 3306);

$conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);

var_dump($conn);

if( $conn && $conn->connect_error) {
  echo "error" . $conn->connect_error;
  die();
}

?>