<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Search Manga</title>
  <link type="text/css" rel="stylesheet" href="http://sonvuhong.com/MangaReaderWeb/styles.css">
</head>

<body>
<header>
    <div class="inner clearfix">
      <div id="headeLeftBox">
        <p>Welcome you！</p>
        <p id="h1logo"><a href="http://sonvuhong.com/MangaReaderWeb"><img src="https://c1.staticflickr.com/5/4486/23840709338_b3a6bc985a_o.png" alt="Sorry, can't load image :("><img class="logoSmall" src="https://i.imgur.com/ReGCjfN.png" alt=""></a></p>
      </div>
      <div id="headeRightBox" class="clearfix">
        <div id="searchFormHeaderWrap">
          <form name="searchForm" id="searchFormHeader" method="get" action="http://sonvuhong.com/MangaReaderWeb/Search">
            <input name="q" class="keywordBox" value="" type="text" placeholder="Search Manga ....">
            <input type="submit" title="Search" name="s" class="searchBtn" value="Search">
          </form>
        </div>
        <ul id="userMenu" class="clearfix">
          <li class="userMenu_lang">
            <a href="">Language</a>
          </li>
        </ul>
      </div>
    </div>
</header>
<div id="wrap" class="lowerPage">
  <div id="contents" class="clearfix">
    <div id="mainContent">
      <div class="innerType-lowTop comicPage">
        <dl class="tileListWrap">
          <dt><h2 class="article_head">Search Results</h2></dt>
          <?php
            echo "<div class=\"serchSubhead\">";
            if ($_GET['q'] === ""){
              echo "Search result for「」: <span class=\"searchResultNum\">0 </span>item";
              echo "</div>";
              echo "<div id=\"searchResult_list\">You are idot. ahihi =)))</div>";
            } else {
              $database = mysqli_connect("localhost","u739163159_sonvu","iloveyou","u739163159_manga");
              if (!$database) {
                echo "Search result for「」: <span class=\"searchResultNum\">0 </span>item";
                echo "</div>";
                echo "<div id=\"searchResult_list\">Sorry, Have a error when connect to database :(</div>";
                exit();
              }
              $sql = "SELECT ID, Name, CoverImage FROM MainTable WHERE Name LIKE '%".$_GET['q']."%'";
              $result = mysqli_query($database, $sql);
              if (mysqli_num_rows($result) > 0) {
                echo "Search result(s) for「<span>".$_GET['q']."</span>」: <span class=\"searchResultNum\">".mysqli_num_rows($result)." </span>item(s)";
                echo "</div>";
                echo "<ul class=\"tileList clearfix\">";
                while($row = mysqli_fetch_assoc($result)) {
                  echo "<li>";
                  echo "<a href=\"http://sonvuhong.com/MangaReaderWeb/Detail/?name=".$row["Name"]."&id=".$row["ID"]."\">";
                  echo "<h2><span>".$row["Name"]."</span></h2>";        
                  echo "<div class=\"pic\"><img src=\"".$row["CoverImage"]."\" alt=\"Sorry, can't load image\"></div>";
                  echo "<div class=\"overlay\"><img src=\"https://c1.staticflickr.com/5/4470/37064393673_5a5473af8a_o.png\"></div>";
                  echo "<div class=\"tileBadge icon-latest\"></div>";
                  echo "<div class=\"bgHover\"></div>";
                  echo "</a>";   
                  echo "</li>";
                }
                echo "</ul>";
              } else {
                echo "Search result(s) for「<span>".$_GET['q']."</span>」: <span class=\"searchResultNum\">0 </span>item(s)";
                echo "</div>";
                echo "<div id=\"searchResult_list\">Search result(s) with specified keyword was not found. Please change keywordand search again!</div>";
              }
            }
          ?>
        </dl>
      </div><!-- /.innerType-lower -->
    </div><!-- /#mainContent -->
  </div><!-- /#contents -->
</div><!-- /#wrap -->
</body>
</html>
