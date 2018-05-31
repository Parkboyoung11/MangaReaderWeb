<?php
	function SendMail($emailto, $titleSend, $contentSend){
		$title = $titleSend;
		$content = $contentSend;
		$mailto = $emailto;

		// include('../Helper/config.php');	
		include('../Helper/PHPMailerLibrary/PHPMailerAutoload.php');

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

		if(!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
			return flase;
		} else {
			echo 'Message has been sent';
			return true;
		}
	}	
?>