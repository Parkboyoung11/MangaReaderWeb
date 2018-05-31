<?php
	if(isset($_POST['signout'])){
        // test cookie
        setcookie("userSignIn", "", time() - 400000000, "/","", 0);
   		setcookie("userID", "", time() - 400000000, "/", "",  0);
        // end test http_build_cookie(cookie)
    }
?>
<!DOCTYPE html>   
<html lang="en">
<head>
	<meta charset="UTF-8">
  	<title>Furry Comic - フッリーコミック</title>
 	<link type="text/css" rel="stylesheet" href="View/styles.css">
 	<link type="text/css" rel="stylesheet" href="View/drop.css">
 	<link type="text/css" rel="stylesheet" href="View/jquery-ui.css">
 	<link rel="stylesheet" href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  	<link rel="icon" href="Image/iconPage.gif" type="image/gif" >
</head>
<body>
	<?php
		include('Helper/config.php');
		include('Modules/header.php');
		include('Modules/content.php');
	?>
	<script type="text/javascript" src="Helper/js/jquery.min.js"></script>
	<script type="text/javascript" src="Helper/js/jquery.js"></script>
	<script type="text/javascript" src="Helper/js/jquery-ui.js"></script>
	<script type="text/javascript" src="Helper/js/StarRating.js"></script>
	<script type="text/javascript" src="Helper/js/showBox.js"></script>
</body>
</html>