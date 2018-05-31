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
              if (!$database) {
                echo "Search result for「」: <span class=\"searchResultNum\">0 </span>item";
                echo "</div>";
                echo "<div id=\"searchResult_list\">Sorry, Have a error when connect to database :(</div>";
                exit();
              }

              $sql = "SELECT id, name, coverimage FROM manga WHERE name like '%$_GET[q]%'";
              $result = $database->query($sql);
              $result->setFetchMode(PDO::FETCH_ASSOC);

              if ($result->rowCount() > 0) {
                echo "Search result(s) for「<span>".$_GET['q']."</span>」: <span class=\"searchResultNum\">".$result->rowCount()." </span>item(s)";
                echo "</div>";
                echo "<ul class=\"tileList clearfix\">";
                while($row = $result->fetch()) {
                  echo "<li>";
                  echo "<a href=\"?choose=overview&name=".$row["name"]."&id=".$row["id"]."\">";
                  echo "<h2><span>".$row["name"]."</span></h2>";        
                  echo "<div class=\"pic\"><img src=\"".$row["coverimage"]."\" alt=\"Sorry, can't load image\"></div>";
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