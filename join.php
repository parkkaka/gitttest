<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>회원가입</title>
</head>
<script>
formCheckFirm = () => {
      let user_id = document.querySelector('#user_id');
      let pwd = document.querySelector('#pwd');
      let name = document.querySelector('#name');
      let email = document.querySelector('#email');
      
      if (user_id.value == '') {
        alert('id를 입력해주세요.');
        user_id.focus();
        return false;
      }
      if (pwd.value == '') {
        alert('pw를 입력해주세요.');
        pwd.focus();
        return false;
      }
      if (name.value == '') {
        alert('이름을 입력해주세요.');
        c.focus();
        return false;
      }
      if (email.value == '') {
        alert('이메일을 입력해주세요.');
        d.focus();
        return false;
      }
      return true;
    }
</script>
<body>
<form action="joinProc.php" method="POST" onsubmit="return formCheckFirm()">
    <div>
      <input type="hidden" name="idx">
    </div>
    <div>
      아이디 : <input type="text" name="user_id" id="user_id" placeholder="아이디">
    </div>
    <div>
      비밀번호: <input type="password" name="pwd" id="pwd" placeholder="비밀번호">
    </div>
    <div>
      이름: <input type="text" name="name" id="name" id="name" placeholder="이름">
    </div>
    <div>
      이메일: <input type="text" name="email" id="email" placeholder="이메일">
    </div>
      <button type="submit">회원가입</button>
    </form>
</body>
</html>