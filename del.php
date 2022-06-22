<?php
  require "./dbConnect.php";

  $idx = $_GET['idx'];
  $idx = mysqli_real_escape_string($dbHandler, $idx);

  $sqlQuery = "delete from uni_memo where idx='$idx' ";
  mysqli_query($dbHandler, $sqlQuery);

  Header("Location: index.php");
?>