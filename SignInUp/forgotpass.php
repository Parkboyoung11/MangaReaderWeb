<?php 
  if (isset($_GET['result']) and ($_GET['result'] == 'noemail')) {
    echo "<script>alert('Can\'t find that email, sorry.');</script>";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Forgot Password ・ Furry Comic - フッリーコミック</title>
  <link type="text/css" rel="stylesheet" href="../View/signinup.css">
  <link rel="icon" href="../Image/iconPage.gif" type="image/gif" >
</head>
<body class="">
  <div class="header-body">
    <a href="../"><img src="../Image/iconPage.gif" alt="Sorry, can't load image :(">
    </a>
  </div>
  <div class="signInLabel">
    <p>Reset your password</p>
  </div>
  <div class="main">
    <div class="mainContentForgot">
      <form action="handle.php" method="post" enctype="multipart/form-data">
        <label class="userNameLabel" style="line-height: 140%">Enter your email address and we will send you a new password.</label>
        <input type="text" autofocus="autofocus" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" name="email" id="username" placeholder="Enter your email address..." required="required" />
        <input type="submit" style="font-size: 15px" name="resetPass" id="signButton" value="Send password reset email"/>
      </form>
    </div>
  </div>
</body>
</html>
