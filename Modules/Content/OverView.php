<div id="wrap" class="lowerPage"> 	
	<div id="contents" class="clearfix"> 
		<div id="mainContent">
			<div class="innerType-lower">
				<div class="divide-UIType-2colum clearfix">
					<div class="divideLeft">
						<?php 
							$mid = $_GET['id'];						
						  	$sql = "SELECT * FROM manga WHERE id=$mid";

						  	if (isset($_COOKIE['userID'])) {
								$uid = $_COOKIE['userID'];
								$sqlCheckSubscribe = "SELECT smid from subscribe where smid=$mid and suid=$uid";
								$resultCheckSubscribe = $database->query($sqlCheckSubscribe);
								$countCheckSubscribe = $resultCheckSubscribe->rowCount();
								if ($countCheckSubscribe > 0) {
									$subscribed = true;
								}

								$sqlUserCheckRate = "SELECT rate from vote where vmid=$mid and vuid=$uid";
								$resultUserCheckRate = $database->query($sqlUserCheckRate);
								$resultUserCheckRate->setFetchMode(PDO::FETCH_ASSOC);
								$countUserCheckRate = $resultUserCheckRate->rowCount();
								if ($countUserCheckRate > 0) {
									$rowUserCheckRate = $resultUserCheckRate->fetch();
									$userrate = $rowUserCheckRate['rate'];
								}
							}

							$sqlCheckRate = "SELECT rate from vote where vmid=$mid";
							$resultCheckRate = $database->query($sqlCheckRate);
							$resultCheckRate->setFetchMode(PDO::FETCH_ASSOC);
							$countCheckRate = $resultCheckRate->rowCount();
							if ($countCheckRate > 0) {
								$rate = 0;
								while($rowCheckRate = $resultCheckRate->fetch()) {
									$eachRate = $rowCheckRate['rate'];
									$rate += $eachRate;
								}
								$rate /= $countCheckRate;
								$rate = round($rate, 1);						
							}

						  	$result = $database->query($sql);
                        	$result->setFetchMode(PDO::FETCH_ASSOC);

							$row = $result->fetch();
							$mangaName = $row['name'];

						  	echo "<div class=\"detail_img\"><img src=\"".$row['coverimage']."\" width=\"398\" alt=\"Doraemon Cover Loading...\" style=\"max-height: 616px;\"></div>";

						  	$sqlCheckStart = "SELECT cid FROM chapter WHERE mid=$mid order by cid asc limit 1";
						  	$results = $database->query($sqlCheckStart);
                        	$results->setFetchMode(PDO::FETCH_ASSOC);

							$rowStart = $results->fetch();
							$cidStart = $rowStart['cid'];


						?>						
					</div>
					<div class="divideRight">
						<section id="detailInfoBox">
							<?php
								if (isset($rate)) {
									echo '<div class="bookTitle">';
									echo "<span style=\"display: inline-flex;\">$mangaName<h2 class=\"ratingLabel\">&nbsp;&nbsp;&nbsp;Rating : $rate star(s)</h2></span>";
									echo '</div>';
								}else {
									echo "<h1 class=\"bookTitle\">$mangaName</h1>";
								}								
							?>							
							<div id="detailInfoInner" class="clearfix">
								<div class="detail_info">
									<table class="mangaInformation">										
							            <?php
							                echo "<tr>";
					        				echo "<th >Release</th>";
						        			echo "<td>";
						        			echo $row["release"];
						        			echo "</td>";	
						        			echo "</tr>";
						        			echo "<tr>";
						        			echo "<th>Genre(s)</th>";	
						        			echo "<td>";	
						        			echo $row["genre"];
						        			echo "</td>";	
						        			echo "</tr>";
						        			echo "<tr>";
						        			echo "<th>Author(s)</th>";	
						        			echo "<td>";	
						        			echo $row["author"];
						        			echo "</td>";	
						        			echo "</tr>";
						        			echo "<tr>";
						        			echo "<th>Chapter(s)</th>";	
						        			echo "<td>";	
						        			echo $row["numberofchapter"];		
						        			echo "</td>";	
						        			echo "</tr>";
						        			echo "<tr>";
						        			echo "<th>Status</th>";	
						        			echo "<td>";
						        			if 	($row["status"] == 1) {
						        				echo "Completed";
						        			} else {
						        				echo "On Going";
						        			}
						        			echo "</td>";	
						        			echo "</tr>";						   
						        			echo "<tr>";
						        			echo "<th>Summary</th>";	
						        			echo '<td style="overflow: overlay"><div style="max-height: 260px;">';	
						        			echo $row["summary"];		
						        			echo "</div></td>";	
						        			echo "</tr>";			   				           	
										?>					        	
									</table>
									<div class="settingBtnBox">
										<div class="settingBtnBoxLeft"> 
											<?php
												echo "<a title=\"Click to read manga !\" href=\"Read/?name=".$row['name']."&id=".$mid."&cid=".$cidStart."\">Read Manga<i class=\"arrowRight-w\"></i><i class=\"myMagazineFlag_off\"></i></a>";
											?>
										</div>
										<div class="settingBtnBoxMid">
											<?php 
												if (isset($subscribed)) {
													echo "<a style=\"color:darkblue\" title=\"Unsubscribe this manga !\" href=\"Controller/subscribeHandle.php?mid=$mid&ac=unsub\">Subscribed<i class=\"arrowRight-w\"></i></a>";
												}else {
													echo "<a title=\"Subscribe this manga !\" href=\"Controller/subscribeHandle.php?mid=$mid&ac=sub\">Subscribe Manga<i class=\"arrowRight-w\"></i></a>";
												}
											?>										
										</div>
										<div class="settingBtnBoxRight">
											<?php
												if (isset($userrate)) {
													echo "<a title=\"Vote this manga !\" href=\"javascript:void(0)\"  class=\"buttonVote\">Voted : $userrate star(s)</a>";
												}else {
													echo "<a title=\"Vote this manga !\" href=\"javascript:void(0)\"  class=\"buttonVote\">Vote Manga</a>";
												}
											?>
										</div>
									</div>
									<x-star-rating value="10" number="10" id="rating"></x-star-rating>
								</div>
							</div>
						</section>
					</div>
				</div>
			</div>
		</div>
	</div>					
</div>
<div class="showMangaID" style="display: none;" mangaid="<?php echo $mid ?>"></div>


<?php
	if (isset($_GET['error'])) {
		if ($_GET['error'] == 'notsignin') {
			echo '<script>alert("Sign in to subscribe this manga!");</script>';
		}else {
			echo '<script>alert("An error has occurred. Please try again!");</script>';
		}		
	}elseif (isset($_GET['noti'])) {
		if ($_GET['noti'] == 'successSub') {
			echo '<script>alert("Subscribe Successful !");</script>';
		}elseif ($_GET['noti'] == 'successUnSub') {
			echo '<script>alert("Unsubscribe Successful !");</script>';
		}
		
	}
?>