<?php

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

$methodType = $_SERVER['REQUEST_METHOD'];

$_SESSION['loggedin'] = false;

header( 'Location: index.php' ) ;

?>

