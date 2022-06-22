<?php
  error_reporting(1);
  ini_set("display_errors",1);
  require './inc/dbInfo.inc';

  $dbHandler = mysqli_connect( $host, $user, $password, $database);
  if(!$dbHandler) {
    echo '<script>console.log("Failed DB Connecting...");</script>';
    exit;
  }
  if(!mysqli_select_db($dbHandler, $database)) {
    echo '<script>console.log("There is no any Database...");</script>';
    exit;
  }
?>