<?php
  session_start();
  require "./dbConnect.php";

  if(!isset($_SESSION['isLoginId'])) {
    echo "로그인 후 이용해주세요.";
    exit;
  }

  $userInfo[] = $_SESSION['isLoginId'];
  $userInfo[] = $_POST['memo'];
  $userInfo[] = date("Y-m-d H:i:s");

  $sqlQuery = "insert into uni_memo(user_id, memo, reg_date) values('$userInfo[0]','$userInfo[1]','$userInfo[2]')";
  mysqli_query($dbHandler, $sqlQuery);

  Header("Location:index.php");
?>