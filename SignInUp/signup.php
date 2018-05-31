<?php
  if (isset($_COOKIE['userSignIn'])) {
    header('location : ../');
  }

  if (isset($_GET['error'])) {
    if ($_GET['error'] == 'username') {
      echo '<script>alert("Username is already taken!");</script>';
    }elseif ($_GET['error'] == 'email') {
      echo '<script>alert("Email is already taken!");</script>';
    }else {
      echo '<script>alert("Create account failed! Try again.");</script>';
    }   
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign up to Furry Comic - フッリーコミック</title>
  <link type="text/css" rel="stylesheet" href="../View/signinup.css">
  <link rel="icon" href="../Image/iconPage.gif" type="image/gif" >
</head>
<body class="">
  <div class="header-body">
    <a href="../"><img src="../Image/iconPage.gif" alt="Sorry, can't load image :(">
    </a>
  </div>
  <div class="signInLabel">
    <p>Sign up to FurryComic</p>
  </div>
  <div class="main">
    <div class="mainContentUp">
      <form action="handle.php" method="post" enctype="multipart/form-data">
        <label class="userNameLabel">Username</label>
        <input type="text" autofocus="autofocus" pattern="[a-zA-Z0-9]{1,}" name="username" id="username" value="<?php echo $_GET['username'] ?>" placeholder="Pick a username" required="required" />
        <label class="emailLabel">Email</label>
        <input type="text" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" name="email" id="email" value="<?php echo $_GET['email'] ?>" placeholder="you@example.com" required="required" />
        <label class="passwordLabel">Password</label>
        <input type="password" pattern="[a-zA-Z0-9]{1,}" name="password" id="password" placeholder="Create a password" required="required" />
        <input type="submit" name="signup" id="signButton" value="Sign up"/>
      </form>
    </div>
    <p class="changeSign">Have a account? <a class="changeCreate" href="signin.php">Sign in.</a></p>
  </div>
</body>
</html>

