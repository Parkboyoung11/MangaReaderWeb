<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Upload To Database</title>
  <link type="text/css" rel="stylesheet" href="update.css">
</head>
<body>
<?php
	session_start();
	if(isset($_SESSION['username'])) {
		ClickHandler();
		?>
			<div class="updateArea">
				<form action="index.php" method="POST">
					<div class="tableid">
						<label id="tablelbl">TableID</label>
						<input type="text" name="tableid" id="tabletxt"><br>
					</div>
					<div class="mangaurl">
						<label id="urllbl">MangaUrl</label>
						<input type="text" name="mangaurl" id="urltxt"><br>
					</div>
					<div class="update">
						<input type="submit" name="upload" value="Upload" id="uploadBtn">
					</div>
					<div class="letsupload">
						<label>Let's upload your database !</label>
					</div>										
				</form>
			</div>
		<?php
	}else {
		if (isset($_POST['submit'])) {
			if ($_POST['user'] == "sonvuhong" && $_POST['pass'] == "ParkBoYoung") {
				$_SESSION['username'] = $_POST['user'];
				ClickHandler();
				?>
					<div class="updateArea">
						<form action="index.php" method="POST">
							<div class="tableid">
								<label id="tablelbl">TableID</label>
								<input type="text" name="tableid" id="tabletxt"><br>
							</div>
							<div class="mangaurl">
								<label id="urllbl">MangaUrl</label>
								<input type="text" name="mangaurl" id="urltxt"><br>
							</div>
							<div class="update">
								<input type="submit" name="upload" value="Upload" id="uploadBtn">
							</div>
							<div class="letsupload">
								<label>Login Succeeded. Let's upload your database !</label>
							</div>										
						</form>
					</div>
				<?php
			}else {
				?>
				<div class="loginArea">
					<form action="index.php" method="POST">
						<div class="user">
							<label id="usernamelbl">Username</label>
							<input type="text" name="user" id="usernametxt"><br>
						</div>
						<div class="pass">
							<label id="passwordlbl">Password</label>
							<input type="password" name="pass" id="passwordtxt"><br>
						</div>
						<div class="login">
							<input type="submit" name="submit" value="Login" id="loginBtn">
						</div>
						<div class="error">
							<label>User or Password not correct! Please check again =)))</label>
						</div>										
					</form>
				</div>			
				<?php
			}
		}else {
			?>
			<div class="loginArea">
				<form action="index.php" method="POST">
					<div class="user">
						<label id="usernamelbl">Username</label>
						<input type="text" name="user" id="usernametxt"><br>
					</div>
					<div class="pass">
						<label id="passwordlbl">Password</label>
						<input type="password" name="pass" id="passwordtxt"><br>
					</div>
					<div class="login">
						<input type="submit" name="submit" value="Login" id="loginBtn">
					</div>										
				</form>
			</div>			
			<?php
		}		
	}

	function ClickHandler() {
		$tableID = $mangaUrl = "";
		if (isset($_POST['upload'])) {
			if ($_POST['tableid'] == "" || $_POST['mangaurl'] == "") {
				echo "<script>alert('Please Fill All TextField!');</script>";
			}else {
				$tableID = $_POST['tableid'];
				$mangaUrl = $_POST['mangaurl'];
			}

			if ($tableID && $mangaUrl) {
				$database = mysqli_connect("localhost","u739163159_sonvu","iloveyou","u739163159_manga");
			    if (!$database) {
			        die("Connection failed: " . mysqli_connect_error());
			    }
			    $linkChapArray = [];
			    $nameChapArray = [];
			    getlinkChap($mangaUrl, $linkChapArray, $nameChapArray);
			    $resultLock = 1;
			    // $i = count($linkChapArray);
			    for ($i = count($linkChapArray) ; $i > 0 ; $i--) {
			        $linkImage = "";
			        getlink($linkChapArray[$i-1] , $linkImage);			        
			        $startChapIndex = 0;
			        $endChapIndex = strpos($nameChapArray[$i-1], " " , $startChapIndex);
			        $ChapIndex = substr($nameChapArray[$i-1], $startChapIndex, $endChapIndex - $startChapIndex);
			        $ChapName = substr($nameChapArray[$i-1], $endChapIndex + 1);

			        $linkImage = substr($linkImage, 0, -1);  // Delete lastest char
			        $sqlUpdate = "INSERT INTO Manga".$_POST['tableid']." (ImageLink, cName, cID) VALUES ('".$linkImage."', '".$ChapName."', '".$ChapIndex."')";
			        $resultUpload = mysqli_query($database, $sqlUpdate);			        
			        if ($resultUpload == FALSE) {
			        	$resultLock = 0;			        	
			        }   			           
			    }
			    if ($resultLock == 1) {
			    	echo "<script>alert('Upload Succeeded!');</script>";
			    }else {
			    	echo "<script>alert('Upload Failed!');</script>";
			    }
			}
			// $database = mysqli_connect("localhost","u739163159_sonvu","iloveyou","u739163159_manga");				
		}
	}

	function getlink($link, &$linkImage){
        $content = file_get_contents($link);
        while (1) { 
            $start  = strpos($content, "img class=\"lazy img-responsive img-thumbnail\" data-original=\"" , $startContinue);
            if ($start == FALSE) {
                break;
            }
            $end    = strpos($content, "\"", $start + 61);
            $result = substr($content, $start + 61, $end - $start - 61);
            $startContinue = $end;
            $linkImage .= $result."#";
        }
    }

    function getlinkChap($link, &$linkChapArray, &$nameChapArray){
        $content = file_get_contents($link);      
        while (1) { 
            $start  = strpos($content, "<td><a class=\"active\" href=" , $startContinue);
            if ($start == FALSE) {          
                break;
            }
            $end    = strpos($content, "\"", $start + 30);          
            $linkChap = substr($content, $start + 28, $end - $start - 28);

            $startName = $end + 15;
            $endName = strpos($content, "</a>", $startName);
            $nameChap = substr($content, $startName, $endName - $startName);

            $linkChapArray[] = $linkChap;
            $nameChapArray[] = $nameChap;
            $startContinue = $end;
        }
    }
?>

