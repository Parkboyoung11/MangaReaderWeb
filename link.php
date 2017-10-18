<?php
    $database = mysqli_connect("localhost","u739163159_sonvu","iloveyou","u739163159_manga");
    if (!$database) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $linkChapArray = [];
    $nameChapArray = [];
    getlinkChap('http://mangareader.info/mangafox/guilty-crown');
    for ($i = count($linkChapArray) ; $i > 0 ; $i--) {
        $linkImage = "";
        getlink($linkChapArray[$i-1] , $linkImage);
        $startChapIndex = 0;
        $endChapIndex = strpos($nameChapArray[$i-1], " " , $startChapIndex);
        $ChapIndex = substr($nameChapArray[$i-1], $startChapIndex, $endChapIndex - $startChapIndex);
        $ChapName = substr($nameChapArray[$i-1], $endChapIndex + 1);

        $linkImage = substr($linkImage, 0, -1);  // Delete lastest char
        $sqlUpdate = "INSERT INTO Manga0009 (ImageLink, cName, cID) VALUES ('".$linkImage."', '".$ChapName."', '".$ChapIndex."')";
        $resultUpdate = mysqli_query($database, $sqlUpdate);
        echo $resultUpdate;           
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

    function getlinkChap($link){
        $content = file_get_contents($link);   
        Global $linkChapArray;  
        Global $nameChapArray;   
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



