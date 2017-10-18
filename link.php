<?php
    for ($i = 1 ; $i < 10 ; $i++) { 
        getlink('http://mangareader.info/manga/doraemon/'.$i);
        echo "<br>";
        echo $i;
        echo "<br>";
    }
    function getlink($link){
        $content = file_get_contents($link);
        $count = 0;
        while (1) { 
            $start  = strpos($content, "img class=\"lazy img-responsive img-thumbnail\" data-original=\"" , $startContinue);
            if ($start == FALSE) {
                echo "Number Image : ".$count;
                break;
            }
            $end    = strpos($content, "\"", $start + 61);
            $result = substr($content, $start + 61, $end - $start - 61);
            echo $result;
            echo "#";
            $startContinue = $end;
            $count++ ;
        }
    }
?>



