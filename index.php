<?php
  session_start();
  require "./dbConnect.php"; // 세션 주석추가
?>
<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>Member</title>
  </head>
  <body>
    <main>
      <section>
        <form action="loginProc.php" method="POST">
          <?php if(isset($_SESSION['isLoginId'])) {?>
            <a href="logOut.php">로그아웃</a>
          <?php } else { ?>
            <input id="user_id" type="text" name="user_id" placeholder="아이디"/>
            <input id="pwd" type="password" name="pwd" placeholder="비밀번호"/>
            <canvas id="cpt_area" class="cpt_area"></canvas>
            보안 <input id="secureNumber" type="text" autocomplete="off" required>
          <button id="openSubmit" type="submit" disabled="disabled">로그인</button>
          <a href="join.php">회원가입</a>
          <?php } ?>
        </form>
        <?php if(isset($_SESSION['isLoginId'])) {?>
          <form action="memoProc.php" method="POST">
            <input type="hidden" name="idx" value="<?=$idx?>">
            <textarea name="memo" placeholder="메모를 입력해주세요."></textarea>
          <br>
          <button type="submit">저장</button>
          </form>
          <table border=1>
            <tr>
              <th>아이디</th>
              <th>메모</th>
              <th>등록일</th>
              <th>삭제</th>
              <?php
                $sqlQuery = "select * from uni_memo where user_id='$_SESSION[isLoginId]' order by idx desc";
                $records = mysqli_query($dbHandler, $sqlQuery);
                while($list = mysqli_fetch_array($records)) {
              ?>
              <tr>
                <td><?=$list['user_id']?></td>
                <td><?=nl2br($list['memo'])?></td>
                <td><?=$list['reg_date']?></td>
                <td><a href="del.php?idx=<?=$list['idx']?>" onclick="return confirm('정말 삭제할까요');">삭제</a></td>
              </tr>
              <?php } ?>
            </tr>
          </table>
          <?php }?>
    </section>
  </main>           
  <script>
    const secureNumber = document.querySelector("#secureNumber");
    let randomNumber = Math.floor(Math.random()*(9999-1000+1)) +1000;
    let cpt_area = document.getElementById("cpt_area");
    let ctx = cpt_area.getContext("2d");
    ctx.font = "100px Malgun Gothic";
    ctx.fillStyle = "blue";
    ctx.textAlign = "center";
    ctx.fillText(randomNumber, cpt_area.width/2, cpt_area.height/1.35);

    const completeSecureNumber = event => {
      const user_id = document.querySelector("#user_id").value;
      const pwd = document.querySelector("#pwd").value;
      const openSubmit = document.querySelector("#openSubmit");

      if( user_id && pwd && randomNumber == event.target.value) {
        openSubmit.removeAttribute("disabled");
      }
    }
    secureNumber.addEventListener("keyup", completeSecureNumber);
  </script>
  </body>
</html>