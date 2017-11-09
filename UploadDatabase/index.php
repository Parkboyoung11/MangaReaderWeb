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
					<div class="manganame">
						<label id="tablelbl">Name</label>						<!--input name and manga url -->
						<input type="text" name="name" id="tabletxt"><br>
					</div>
					<div class="linkmanga">
						<label id="urllbl">MangaUrl</label>
						<input type="text" name="linkmanga" id="urltxt"><br>
					</div>
					<div class="addManga">
						<input type="submit" name="add" value="Add" id="uploadBtn">
					</div>
						<div class="letsupload">
						<label>Add Manga</label>
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
							<div class="manganame">
								<label id="tablelbl">Name</label>						<!--input name and manga url -->
								<input type="text" name="name" id="tabletxt"><br>
							</div>
							<div class="linkmanga">
								<label id="urllbl">MangaUrl</label>
								<input type="text" name="linkmanga" id="urltxt"><br>
							</div>
							<div class="addManga">
								<input type="submit" name="add" value="Add" id="uploadBtn">
							</div>
							<div class="letsupload">
								<label>Add Manga</label>
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
		if (isset($_POST['add'])) {
			if ($_POST['name'] == "" || $_POST['linkmanga'] == "") {
				echo "<script>alert('Please Fill All TextField!');</script>";
			}else {
				$name = $_POST['name'];
				$mangaUrl = $_POST['linkmanga'];
				if ($tableID && $mangaUrl) {
					$database = mysqli_connect("localhost","u739163159_sonvu","iloveyou","u739163159_manga");
					if (!$database) {
						die("Connection failed: " . mysqli_connect_error());
					}
				addManga($mangaUrl,$name);
				}
			}
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
    function addManga($link,$name){
    	$sauce = file_get_contents($link);   //get source
    	$begin = strpos($sauce,'<p class="summary">');
    	$end = strpos($sauce, "</p>",$begin);
    	$pAuthor =strpos($sauce, 'Author(s)');
    	//$pArtist = strpos($sauce, 'Artist(s)');
    	$pGenre = strpos($sauce, 'Genre(s)');
    	$pType= strpos($sauce, "Type",$pGenre);
		$summary = substr($sauce, $begin,$end-$begin);
		preg_match('\d\d\d\d(?=\<)', $sauce,$sth);
		$release=$sth[0];
		preg_match('(?<=\/c)[\d]{1,3}', $sauce,$sth);
		$chapter=$sth[0];
		preg_match('[\w -]{1,30}(?=\<)', substr($sauce, $pAuthor,$pGenre-$pAuthor),$sth);
		$Author=$sth[0];
		$Artist=$sth[1];
		if ($Author!=$Artist) {
			$Author=$Author.' ;'.$Artist;
		}
		preg_match('[\w ]{1,30}(?=\<\/\a)', substr($sauce, $pGenre,$pType-$pGenre),$sth);
		$genre = join(' ;',$sth);
		preg_match('https?:[-a-zA-Z0-9@:%_\+.~#?&=\/]*(?=" width=)', $sauce,$sth);
		$linkImage=$sth[0];
		if (strpos(substr($sauce, strpos($sauce, '<th>Status</th>',100)), 'Ongoing')) {
			$Status='0';
		} else {
			$Status='1';
		}
		preg_match('[\w -]{1,30}(?=)', $sauce,$sth);

		$addM = "INSERT INTO MainTable VALUES ('".$name."', '".$release."', '".$Genre."','".$Status."','".$chapter."','".$summary."','".$Author."','".$linkImage."')";
		print_r($addM);
		$query = mysqli_query($database, $sqlUpdate);
		$id = (string)mysql_insert_id();
		$newTable = "CREATE TABLE Manga".$id.'(
  `ImageLink` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  `cName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cID` varchar(4) COLLATE utf8_unicode_ci NOT NULL
)"';
    }


?>


