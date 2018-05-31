 <div class="content"> 
 	<div class="box_contains">  
 		<?php
 		if(isset($_GET['choose']) && isset($_GET['ac'])){
 			$choose=$_GET['choose'];
 			$action=$_GET['ac'];
 			if (isset($_GET['stt'])) {
 				if ($_GET['stt'] == "true") {
 					echo '<script>alert("Creat account and send mail succeeded.");</script>';
 				}elseif($_GET['stt'] == "false") {
 					echo '<script>alert("Creat account succeeded but send mail failed.");</script>';
 				}else {
 					echo '<script>alert("Creat account failed.");</script>';
 				}
 			}
 		}else{
 			$choose='';
 		}

 		if(($choose == 'user')&&($action == 'list')){
 			
 			include('Modules/User/list.php');

 		}elseif(($choose == 'manga')&&($action == 'add')){
 			
 			include('Modules/Manga/add.php');

 		}elseif(($choose == 'manga')&&($action == 'list')){
 			
 			include('Modules/Manga/list.php');

 		}elseif(($choose == 'manga')&&($action == 'edit')){
 			
 			include('Modules/Manga/edit.php');

 		}elseif(($choose == 'password')&&($action == 'reset')){

 			include('Modules/ResetPassword/resetAll.php');

 		}else{
 			include('Modules/Manga/list.php');
 		}
 		?>		
 	</div>
 </div>
 <div class="clear"></div>