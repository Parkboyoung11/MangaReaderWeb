<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Onegai Teacher - おねがい☆ティーチャー</title>
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
			<div class="innerType-lower">
				<div class="divide-UIType-2colum clearfix">
					<div class="divideLeft">
						<?php  
							$database = mysqli_connect("localhost","u739163159_sonvu","iloveyou","u739163159_manga");
						  	if (!$database) { 
						    	exit();
						  	}
						  	$sql = "SELECT MainTable.* FROM MainTable WHERE ID=".$_GET['id'];
						 	$result = mysqli_query($database, $sql);
						  	if (mysqli_num_rows($result) <= 0) {
						  		exit();
						  	}
						  	$row = mysqli_fetch_assoc($result);
						  	echo "<div class=\"detail_img\"><img src=\"".$row['CoverImage']."\" width=\"398\" alt=\"Doraemon Cover Loading...\"></div>";
						?>						
					</div>
					<div class="divideRight">
						<section id="detailInfoBox">
							<?php
								echo "<h1 class=\"bookTitle\">".$row['Name']."</h1>";
							?>							
							<div id="detailInfoInner" class="clearfix">
								<div class="detail_info">
									<table class="mangaInformation">										
							            <?php
							                echo "<tr>";
					        				echo "<th >Release</th>";
						        			echo "<td>";
						        			echo $row["Release"];
						        			echo "</td>";	
						        			echo "</tr>";
						        			echo "<tr>";
						        			echo "<th>Genre(s)</th>";	
						        			echo "<td>";	
						        			echo $row["Genre"];
						        			echo "</td>";	
						        			echo "</tr>";
						        			echo "<tr>";
						        			echo "<th>Author(s)</th>";	
						        			echo "<td>";	
						        			echo $row["Author"];
						        			echo "</td>";	
						        			echo "</tr>";
						        			echo "<tr>";
						        			echo "<th>Chapter(s)</th>";	
						        			echo "<td>";	
						        			echo $row["NumberOfChapter"];		
						        			echo "</td>";	
						        			echo "</tr>";
						        			echo "<tr>";
						        			echo "<th>Status</th>";	
						        			echo "<td>";
						        			if 	($row["Status"] == 1) {
						        				echo "Completed";
						        			} else {
						        				echo "On Going";
						        			}
						        			echo "</td>";	
						        			echo "</tr>";						   
						        			echo "<tr>";
						        			echo "<th>Summary</th>";	
						        			echo "<td>";	
						        			echo $row["Summary"];		
						        			echo "</td>";	
						        			echo "</tr>";			   				           	
										?>					        	
									</table>
									<div class="settingBtnBox">
										<div class="settingBtnBoxLeft">
											<?php
												echo "<a title=\"Click to read manga !\" href=\"read.php?id=".$_GET['id']."&cid=1\">Read Manga<i class=\"arrowRight-w\"></i><i class=\"myMagazineFlag_off\"></i></a>";
											?>
										</div>
										<div class="settingBtnBoxMid">
											<a title="Subscribe this manga !" href="">Subscribe Manga<i class="arrowRight-w"></i></a>
										</div>
										<div class="settingBtnBoxRight">
											<a title="Vote this manga !" href="">Vote Manga<i class="arrowRight-w"></i></a>
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>
				</div>
			</div>
		</div>
	</div>					
</div>
</body>
</html>
