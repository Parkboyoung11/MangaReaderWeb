<div id="wrap" class="lowerPage"> 	  
	<div id="contents" class="clearfix"> 
		<div id="mainContent">
			<div class="innerType-lower">
				<div class="divide-UIType-2colum clearfix">
					<div class="divideLeft" style="margin-left: 120px; width: 300px">
						<?php
						  	$sql = "SELECT * FROM users WHERE uid=".$_COOKIE['userID']." limit 1";

						  	$result = $database->query($sql);

                        	$result->setFetchMode(PDO::FETCH_ASSOC);

							$row = $result->fetch();
							$username = $row['username'];
							$email = $row['email'];
							$fullname = $row['fullname'];
							$avatar = $row['avatar'];
							$gender = $row['gender'];

							if ($avatar == '') {
								echo '<div class="detail_img"><img id="avatarShow" src="Image/defaultAvatar.jpg" width="250" height="250" alt="Avatar Loading..."></div>';
							}else {
								$timeStamp = time();
								echo "<div class=\"detail_img\"><img id=\"avatarShow\" src=\"".$avatar."?$timeStamp\" width=\"250\" height=\"250\" alt=\"Avatar Loading...\"></div>";
							}					  	
						?>
						<div class="overUser">
						    <p class="fullName"><?php echo ($fullname == "" ? $fullname : 'Anonymous'); ?></p>
						    <p class="username"><?php echo $username; ?></p>
						</div>
						<div class="welcome">Welcome you !</div>						
					</div>
					<div class="divideRight">
						<section id="detailInfoBox">
							<h1 class="bookTitle">&nbsp;&nbsp;&nbsp;Your Profile Information</h1>						
							<div id="detailInfoInner" class="clearfix">
								<div class="detail_info">
									<form action="Update/update.php" method="post">
									<table class="mangaInformation">																	            
							                <tr>
					        				<th class="thProfile">Email</th>
						        			<td class="tdProfile"><?php echo $email?></td>	
						        			</tr>
						        			<tr>
						        			<th class="thProfile">Username</th>	
						        			<td class="tdProfile" id="usernameJS"><?php echo $username ?></td>							        				
						        			</tr>
						        			<tr>
						        			<th class="thProfile">Full Name</th>	
						        			<td>
						        			<div class="fullNameDiv">
                                    		<input name="fullNameChange" type="text" value="<?php echo $fullname ?>" class="fullNameInput" placeholder="Input your name ....">
											</div>
						        			</td>	
						        			</tr>
						        			<tr>
						        			<th class="thProfile">Gender</th>	
						        			<td class="tdProfile">
						        				<?php
										          if ($gender) {
										            echo 'Male <input type="radio" name="gender" value="1" checked="checked" style="width: 10%">';
										            echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Female <input type="radio" name="gender" value="0" style="width: 10%">';
										          }else {
										            echo 'Male <input type="radio" name="gender" value="1" style="width: 10%">';
										            echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Female <input type="radio" name="gender" value="0" checked="checked" style="width: 10%">';
										          }
										        ?>
						        			</td>	
						        			</tr>						   
						        			<tr>
						        			<th class="thProfile">Password</th>	
						        			<td>	
						        			<div class="passwordDiv">
                                    		<input name="passwordChange" type="password" value="" class="passwordInput" placeholder="Input new password ....">
											</div>		
						        			</td>	
						        			</tr>
						        			<tr>
						        			<th class="thProfile">Avatar</th>	
						        			<td>	
						        			<div class="avatarDiv">
                                    		<input name="avatarChange" id="upload" type="file" class="avatarInput">
											</div>		
						        			</td>	
						        			</tr>			   				           						        	
									</table>
									<div class="updateDiv">
										<input type="submit" name="update" value="Update" class="updateButton">
									</div>
									</form>
								</div>
							</div>
						</section>
					</div>
				</div>
			</div>
		</div>
	</div>					
</div>
<div id="previewDiv">
</div>
<div id="previewMain">
	<div id="titleCrop">
		<h2 id="labelCrop">Crop your new avatar</h2>
		<button type="button" id="hidenCrop" style="float: right;border: 0;background-color: transparent;"><svg aria-hidden="true" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path fill-rule="evenodd" d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48z"></path></svg></button>
	</div>	
	<div id="imageBox">
		<img id="imagePreview"  ratio="" lock="" src="">
		<div id="cropTool"></div>
	</div>
	<div id="btnCropDiv">
		<button type="submit" id="cropButton">
     	 Set your new avatar
    	</button>
	</div>
	
</div>