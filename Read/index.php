<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php  
        $mangaName = $_GET['name'];
        $mangaID = $_GET['id'];
        $chapterID = $_GET['cid'];
        echo "<title>$mangaName Chap $chapterID</title>";
    ?>
    <link type="text/css" rel="stylesheet" href="../View/read.css">
    <link rel="icon" href="../Image/iconPage.gif" type="image/gif" >
</head>
<body>
    <header>
        <div class="reading-control">
            <form action="../" method="post">
                <input type="submit" title="Home" class="homeBtn">
                <select class="selectChap" id="chap" <?php echo "onchange=\"javascript:window.location.href='?name=".$mangaName."&id=".$mangaID."&cid=' + this.options[this.selectedIndex].value + '';\""; ?>>
                    <?php
                        include('../Helper/config.php');
                        $sqlChaps = "SELECT cname, cid FROM chapter where mid=$mangaID  order by cid asc";

                        $resultChaps = $database->query($sqlChaps);
                        $resultChaps->setFetchMode(PDO::FETCH_ASSOC);

                        $cidArray = array();

                        while($rowChaps = $resultChaps->fetch()) {
                            $cid = $rowChaps["cid"];
                            $cidArray[] = $cid;
                            if ($cid != $chapterID) {
                                echo "<option value=\"".$cid."\">Chap ".$cid." : ".$rowChaps["cname"]."</option>";
                            }else {
                                echo "<option value=\"\" selected=\"true\">Chap ".$cid." : ".$rowChaps["cname"]."</option>";
                            }    
                        }

                        $endIndex = count($cidArray) - 1;
                        $firstChap = $cidArray[0];
                        $endChap = $cidArray[$endIndex];

                        $currentIndex = array_search($chapterID, $cidArray);
                        $previousIndex = $currentIndex ? $currentIndex - 1 : $currentIndex;
                        $nextIndex = ($currentIndex != $endIndex) ? $currentIndex + 1 : $currentIndex;

                        $previousChap = $cidArray[$previousIndex];
                        $nextChap = $cidArray[$nextIndex];

                        $previousHref = "?name=$mangaName&id=$mangaID&cid=$previousChap";
                        $nextHref = "?name=$mangaName&id=$mangaID&cid=$nextChap";            
                    ?>
                </select>
            </form> 
        </div>
    </header>
    <div class="readingDetail">
        <?php
            $sql = "SELECT imagelink FROM chapter where mid=$mangaID and cid=$chapterID" ;
            
            $result = $database->query($sql);
            
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $row = $result->fetch();
            $link = explode("#",$row["imagelink"]);
            foreach($link as $value) {
                 echo "<div class=\"pageImage\"><img src=\"".$value."\"/></div>";    
            }
        ?>
    </div>
    <div class="controlPart">
        <a href="<?php echo $previousHref ?>" id="previousChap" <?php if($firstChap == $chapterID){echo 'style="opacity: 0.3; pointer-events: none"';}  ?>></a>
        <a href="<?php echo $nextHref ?>" id="nextChap" <?php if($endChap == $chapterID){echo 'style="opacity: 0.3; pointer-events: none"';}  ?>></a>
    </div>
    <script type="text/javascript" src="../Helper/js/jquery.js"></script>
    <script type="text/javascript" src="../Helper/js/jquery-ui.js"></script>
    <script type="text/javascript" src="../Helper/js/scrollHideHeader.js"></script>
</body>
</html>