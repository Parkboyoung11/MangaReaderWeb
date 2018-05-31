 <?php
 	// session_start();
	$searchManga = $_GET['searchManga'];
	header("location: ../../?choose=manga&ac=list&searchManga=$searchManga");
?>