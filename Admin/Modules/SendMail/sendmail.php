<?php
	function SendAllMail($emailArray){	
		include('../Helper/config.php');	
		include('../Helper/PHPMailerLibrary/PHPMailerAutoload.php');
		$title = "Reset Password";
		foreach ($emailArray as $key) {
			$rawpass = mt_rand(100000, 999999);
			$defaultPass = md5($rawpass);

			$content = "Admin have reset password. Your current password is '".$rawpass."'. Please sign in to change your password !";
			$mailto = $key['email'];
			$uid = $key['uid'];

			$mail = new PHPMailer;
			$mail->isSMTP();                                     
			$mail->Host = 'smtp.gmail.com'; 
			$mail->SMTPAuth = true;                               
			$mail->Username = 'vuhongsonjv11@gmail.com';                
			$mail->Password = 'wnzuiphgvwgrmmlv';                          
			$mail->SMTPSecure = 'tls'; 
			$mail->Port = 587;                                    
			$mail->setFrom('vuhongsonjv11@gmail.com', $title);
			$mail->addAddress($mailto);                              
			$mail->isHTML(true);                                  
			$mail->Subject = $title;
			$mail->Body    = $content;
			if($mail->Send()) {
		      	$sqlresetpass = "UPDATE users set password='$defaultPass' where uid=$uid";
		      	$database->query($sqlresetpass);;
		    }else {
		    }
			$mail->clearAddresses();
		}
		
	}	
?>