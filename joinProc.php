<?php
  require './dbConnect.php';

  $userInfo = array($_POST['idx'], $_POST['user_id'], $_POST['pwd'], $_POST['name'], $_POST['email']);

  $userInfo[] = date("Y-m-d H:i:s");
  $userInfo[] = $_SERVER['REMOTE_ADDR'];

  $sqlQuery = "insert into uni_member(idx,user_id, pwd, name, email, reg_date, ip) values ('$userInfo[0]','$userInfo[1]',password('$userInfo[2]'),'$userInfo[3]','$userInfo[4]','$userInfo[5]','$userInfo[6]')";


  $records = mysqli_query($dbHandler, $sqlQuery);
  $result = mysqli_affected_rows($dbHandler);

  if($result == 1) {
    echo 'Ok';
    Header("Location:index.php");
  } else {
    echo '<script>alert("없는 아이디 이거나 동일 아이디가 존재합니다.");location.href="join.php";</script>';
  }
?>

