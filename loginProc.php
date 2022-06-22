<?php
  session_start();
  require "./dbConnect.php";
  
  $user_id = $_POST['user_id'];
  $pwd = $_POST['pwd'];

  $sqlQuery = "select * from uni_member where user_id='$user_id'";
  $records = mysqli_query($dbHandler, $sqlQuery);
  $data = mysqli_fetch_assoc($records);

  if(!$data['idx']) {
    echo "존재하지 않는 회원  입니다."; 
    exit;
  }

  $sqlQuery = "select * from uni_member where pwd=password('$pwd')";
  $records = mysqli_query($dbHandler, $sqlQuery);
  $dataPwd = mysqli_fetch_assoc($records);

  if($data['pwd'] != $dataPwd['pwd']) {
    echo "로그인 정보가 잘못 되었습니다.";
    exit;
  }

  $_SESSION['isLoginId'] = $user_id;

  Header("Location:index.php");
?>