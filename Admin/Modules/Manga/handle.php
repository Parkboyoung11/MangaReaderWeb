<?php  
	include('../../../Helper/config.php');
	session_start();
	if(!isset($_SESSION['login'])){
		header('location:../../login.php');
	}

	$name = $_POST['name'];
	// $nChapters = $_POST['nChapters'];
	$release = $_POST['release'];
	$genre = $_POST['genre'];
	$status = $_POST['status'];
	$author = $_POST['author'];
	$summary = summaryFix($_POST['summary']);
	$coverImage = $_POST['coverImage'];
	$dataLink = $_POST['dataLink'];


	if(isset($_POST['add'])){
		$sqlAdd = "INSERT into manga (name, `release`, genre, `status`, summary, author, coverimage, mangareaderinfolink) values ('$name', $release, '$genre', $status, '$summary', '$author', '$coverImage', '$dataLink')";
		$rs = $database->query($sqlAdd);
		if ($rs !== FALSE) {
			$ID = $database->lastInsertId();
			ClickHandler($dataLink, $ID, $database, 0);
		}

		$sqlEndPage = "SELECT id from manga";
    	$resultEndPage = $database->query($sqlEndPage);
    	$countPage = $resultEndPage->rowCount();
    	$itemInAPage = 8;
    	$_SESSION['mPageNumber'] = ceil($countPage / $itemInAPage);
		header("location:../../?choose=manga&ac=list&mpage=$_SESSION[mPageNumber]");
	}elseif(isset($_POST['edit'])){
	  	$sqlEdit = "UPDATE manga set name='$name', `release`=$release, genre='$genre', `status`=$status, summary='$summary', author='$author', coverimage='$coverImage', mangareaderinfolink='$dataLink' where id='$_GET[id]'";
		$database->query($sqlEdit);
		if (isset($_GET['searchManga'])) {
			header("location:../../?choose=manga&ac=list&mpage=$_SESSION[mPageNumber]&searchManga=$_GET[searchManga]");
		}else {
			header("location:../../?choose=manga&ac=list&mpage=$_SESSION[mPageNumber]");
		}

	}elseif($_GET['ac'] == "delete") {
		$sqlDeleteManga = "DELETE from manga where id = $_GET[id]";
		$database->query($sqlDeleteManga);

		if (isset($_GET['searchManga'])) {
			header("location:../../?choose=manga&ac=list&mpage=$_SESSION[mPageNumber]&searchManga=$_GET[searchManga]");
		}else {
			header("location:../../?choose=manga&ac=list&mpage=$_SESSION[mPageNumber]");
		}

	}elseif($_GET['ac'] == "updateLink") {
		$ID = $_GET['id'];

		$sql = "SELECT mangareaderinfolink from manga where id=$ID";
		$result = $database->query($sql);
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$row = $result->fetch();
		$dataLink = $row['mangareaderinfolink'];

		$sqlLastChap = "SELECT cid from chapter where mid=$ID order by cid desc limit 1";
		$results = $database->query($sqlLastChap);
		$results->setFetchMode(PDO::FETCH_ASSOC);
		$rows = $results->fetch();
		$lastChapter = $rows['cid'];

		ClickHandler($dataLink, $ID, $database, $lastChapter);
		if (isset($_GET['searchManga'])) {
			header("location:../../?choose=manga&ac=list&mpage=$_SESSION[mPageNumber]&searchManga=$_GET[searchManga]");
		}else {
			header("location:../../?choose=manga&ac=list&mpage=$_SESSION[mPageNumber]");
		}
	}

	function summaryFix($summaryOrigin) {
		return str_replace("'", "''", $summaryOrigin);
	}

	function ClickHandler($dataLink, $mangaID, $database, $lastChapter) {
		$linkChapArray = [];
		$nameChapArray = [];
		getlinkChap($dataLink, $linkChapArray, $nameChapArray, $lastChapter);
		$resultLock = 1;
		for ($i = count($linkChapArray) ; $i > 0 ; $i--) {
		    $linkImage = "";
		    getlink($linkChapArray[$i-1] , $linkImage);			        
		    $startChapIndex = 0;
		    $endChapIndex = strpos($nameChapArray[$i-1], " " , $startChapIndex);

		    if ($endChapIndex == FALSE) {
                $ChapIndex = $nameChapArray[$i-1];
                $ChapName = 'No Name';
            }else {
                $ChapIndex = substr($nameChapArray[$i-1], $startChapIndex, $endChapIndex - $startChapIndex);
                $ChapName = substr($nameChapArray[$i-1], $endChapIndex + 1);
            }

			$linkImage = substr($linkImage, 0, -1);  // Delete lastest char
			$sqlUpdate = "INSERT INTO chapter (imagelink, cname, cid, mid) VALUES ('$linkImage', '$ChapName', '$ChapIndex', $mangaID)";
			$resultUpload = $database->query($sqlUpdate);	
			if ($i === 1) {
		   		$nChapters = floor($ChapIndex);
				$updateNChapter = "UPDATE manga set numberofchapter=$nChapters where id=$mangaID";
				$database->query($updateNChapter);
			}	        
			if ($resultUpload == FALSE) {
	     		$resultLock = 0;			        	
		   	}else {
		   		
		   	}			           
		}

		if ($resultLock == 1) {
			echo "<script>alert('Upload Succeeded!');</script>";
		}else {
			echo "<script>alert('Upload Failed!');</script>";
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

    function getlinkChap($link, &$linkChapArray, &$nameChapArray, $lastChapter){
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

            if ($lastChapter != 0) {
            	$startChapIndex = 0;
			    $endChapIndex = strpos($nameChap, " " , $startChapIndex);

			    if ($endChapIndex == FALSE) {
	                $chapIndex = $nameChap;        
	            }else {
	                $chapIndex = substr($nameChap, $startChapIndex, $endChapIndex - $startChapIndex);                
	            }

	            if ($chapIndex == $lastChapter) {
	            	break;
	            }
            } 

            $linkChapArray[] = $linkChap;
            $nameChapArray[] = $nameChap;
            $startContinue = $end;
        }
    }
?>
