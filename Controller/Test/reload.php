<?php
	include('Helper/config.php');
	ClickHandler('http://mangareader.info/mangafox/sword-art-online-progressive', 16, $database);
	function ClickHandler($dataLink, $mangaID, $database) {
		$linkChapArray = [];
		$nameChapArray = [];
		getlinkChap($dataLink, $linkChapArray, $nameChapArray);
		$resultLock = 1;
		for ($i = count($linkChapArray) - 14 ; $i > 0 ; $i--) {
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
			$sqlUpdate = "INSERT INTO Manga$mangaID (ImageLink, cName, cID) VALUES ('$linkImage', '$ChapName', '$ChapIndex')";
			$resultUpload = $database->query($sqlUpdate);		        
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
        // for ($i=1; $i < 5; $i++) { 
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