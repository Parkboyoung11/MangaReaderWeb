<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php  
        echo "<title>Kattobi Itto Chap ".$_GET['cid']."</title>";
    ?>
    <link type="text/css" rel="stylesheet" href="http://sonvuhong.com/MangaReaderWeb/Detail/read.css">
</head>
<body>
    <header>
        <div class="reading-control">
            <form action="http://sonvuhong.com/MangaReaderWeb/" method="get">
                <input type="submit" title="Home" name="home" class="homeBtn" value="Search">
                <select name="chap" class="selectChap" id="chap" onchange="javascript:window.location.href='read.php?id=0007&cid=' + this.options[this.selectedIndex].value + '';">
                    <?php
                        $database = mysqli_connect("localhost","u739163159_sonvu","iloveyou","u739163159_manga");
                        if (!$database) {
                            die("Connection failed: " . mysqli_connect_error());
                        }
                        $sqlChaps = "SELECT cName, cID FROM Manga".$_GET['id'];
                        $resultChaps = mysqli_query($database, $sqlChaps);
                        while($rowChaps = mysqli_fetch_assoc($resultChaps)) {
                            if ($rowChaps["cID"] != $_GET['cid']) {
                                echo "<option value=\"".$rowChaps["cID"]."\">Chap ".$rowChaps["cID"]." : ".$rowChaps["cName"]."</option>";
                            }else {
                                echo "<option value=\"\" selected=\"true\">Chap ".$rowChaps["cID"]." : ".$rowChaps["cName"]."</option>";
                            }    
                        }
                    ?>
                </select>
            </form> 
        </div>
    </header>
    <div class="readingDetail">
        <?php
            $sql = "SELECT ImageLink  FROM Manga".$_GET['id']." WHERE cID = ".$_GET['cid'];
            $result = mysqli_query($database, $sql);
            $row = mysqli_fetch_assoc($result);
            $link = explode("#",$row["ImageLink"]);
            foreach($link as $value) {
                 echo "<div class=\"pageImage\"><img src=\"".$value."\"/></div>";    
            }
        ?>
    </div>
</body>
</html>