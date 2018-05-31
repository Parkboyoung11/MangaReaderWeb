<?php
  if (isset($_COOKIE['userSignIn'])) {
    exit();
  }
  if (isset($_GET['error'])) {
    echo '<script>alert("User or Password not correct. Try again.");</script>';
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign in to Furry Comic - フッリーコミック</title>
  <link type="text/css" rel="stylesheet" href="../View/signinup.css">
  <link rel="icon" href="../Image/iconPage.gif" type="image/gif" >
</head>
<body class="">
  <div class="header-body">
    <a href="../"><img src="../Image/iconPage.gif" alt="Sorry, can't load image :(">
    </a>
  </div>
  <div class="signInLabel">
    <p>Sign in to FurryComic</p>
  </div>
  <div class="main">
    <div class="mainContent">
      <form action="handle.php" method="post" enctype="multipart/form-data">
        <label class="userNameLabel">Username or email address</label>
        <input type="text" autofocus="autofocus" pattern="[a-zA-Z0-9@.]{1,}" name="username" id="username" value="<?php echo $_GET['error']?>" placeholder="Enter username..." required="required" />
        <label class="passwordLabel">Password<a class="forgotPass" href="forgotpass.php">Forgot password?</a></label>
        <input type="password" pattern="[a-zA-Z0-9]{1,}" name="password" id="password" placeholder="Enter password..." required="required" />
        <input type="submit" name="signin" id="signButton" value="Sign in"/>
      </form>
    </div>
    <p class="changeSign">New to FurryComic? <a class="changeCreate" href="signup.php">Create an account.</a></p>
  </div>
</body>
</html>

