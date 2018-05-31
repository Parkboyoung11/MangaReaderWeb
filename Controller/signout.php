<?php
	if(isset($_POST['signout'])){
        // test cookie
        setcookie("userSignIn", "", time() - 400000000, "/","", 0);
   		setcookie("userID", "", time() - 400000000, "/", "",  0);
        // end test http_build_cookie(cookie)
        header('location: ../');
    }
?>