<?php  
  $itemInAPage = 8;
  if(isset($_GET['mpage'])){
    $mPage=$_GET['mpage'];
  }else{
    $mPage=''; 
  }

  if($mPage == '' || $mPage == '1'){
    $mPageTmp = 0;
  }else{
    $mPageTmp = ($mPage * $itemInAPage) - $itemInAPage;
  }

  $_SESSION['mPageNumber'] = $mPage;

  if (isset($_GET['searchManga'])) {
    if ($_GET['searchManga'] == 'completed') {
      $sqlManga = "SELECT * from manga where name ilike '%$_GET[searchManga]%' or author ilike '%$_GET[searchManga]%' or status=1 order by id asc limit $itemInAPage offset $mPageTmp";
    }elseif ($_GET['searchManga'] == 'on going') {
      $sqlManga = "SELECT * from manga where name ilike '%$_GET[searchManga]%' or author ilike '%$_GET[searchManga]%' or status=0 order by id asc limit $itemInAPage offset $mPageTmp";
    }else {
      $sqlManga = "SELECT * from manga where name ilike '%$_GET[searchManga]%' or author ilike '%$_GET[searchManga]%' order by id asc limit $itemInAPage offset $mPageTmp";
    }
  }else {
    $sqlManga = "SELECT * from manga order by id asc limit $itemInAPage offset $mPageTmp";
  }

  $listManga = $database->query($sqlManga);
  $listManga->setFetchMode(PDO::FETCH_ASSOC);
?>
<div class="searchAndAdd">
  <div class="button_themsp">
    <a href="?choose=manga&ac=add">+</a> 
  </div>
  <form name="searchForm" action="Modules/Manga/searchManga.php" style="width: 35%; float: right; margin-right: 20px; " id="searchFormHeader" method="get">
      <input name="searchManga" class="keywordBox" value="<?php echo $_GET['searchManga'] ?>" type="text" placeholder="Search Manga ....">
  </form>
</div>
<table width="100%" border="1">
  <tr>
    <td class="subTitle">ID</td>
    <td class="subTitle">Manga</td>
    <td class="subTitle">Release</td>
    <td class="subTitle">Author</td>
    <td class="subTitle">Chapters</td>
    <td class="subTitle">Status</td>
    <td colspan="3" class="subTitle">Manage</td>
  </tr>
  <?php
  $i=1;
  while($row = $listManga->fetch()){
    ?>
      <tr>
        <td class="contentTable"><?php  echo $row['id']; ?></td>
        <td class="contentTable" style="max-width: 300px;"><?php echo $row['name']; ?></td>
        <td class="contentTable"><?php echo $row['release']; ?></td>
        <td class="contentTable"><?php echo $row['author']; ?></td>
        <td class="contentTable"><?php echo $row['numberofchapter']; ?></td>
        <td class="contentTable"><?php
          if (!$row['status']) {
                echo "On Going";
              }else {
                echo "Completed";
              }
        ?></td>
        <td class="manageTool"><a href="?choose=manga&<?php if($_GET['searchManga'] != ''){echo "searchManga=$_GET[searchManga]&";}?>ac=edit&id=<?php echo $row['id'] ?>" ><center><img src="../Image/edit.png" width="30" height="30" /></center></a></td>
        <td class="manageTool"><a href="Modules/Manga/handle.php?<?php if($_GET['searchManga'] != ''){echo "searchManga=$_GET[searchManga]&";}?>ac=delete&id=<?php echo $row['id']?>" class="delete_manga"><center><img src="../Image/delete.png" width="30" height="30"   /></center></a></td>
        <td class="manageTool"><a href="Modules/Manga/handle.php?<?php if($_GET['searchManga'] != ''){echo "searchManga=$_GET[searchManga]&";}?>ac=updateLink&id=<?php echo $row['id']?>" class="update_manga"><center><img src="../Image/reset.png" width="30" height="30"   /></center></a></td>
      </tr>
    <?php
    $i++;
  }
  ?>
</table>
<div class="page">
  Page :
  <?php
    if (isset($_GET['searchManga'])) {
      if ($_GET['searchManga'] == 'completed') {
        $sqlSearch = "SELECT id from manga where name ilike '%$_GET[searchManga]%' or author ilike '%$_GET[searchManga]%' or status=1";
      }elseif ($_GET['searchManga'] == 'on going') {
        $sqlSearch = "SELECT id from manga where name ilike '%$_GET[searchManga]%' or author ilike '%$_GET[searchManga]%' or status=0";
      }else {
        $sqlSearch = "SELECT id from manga where name ilike '%$_GET[searchManga]%' or author ilike '%$_GET[searchManga]%'";
      }
    }else {
      $sqlSearch = "SELECT id from manga";
    }

    $result = $database->query($sqlSearch);
    $countPage = $result->rowCount();

    $a = ceil($countPage / $itemInAPage);   // lam tron len 4.3->5
    for($b = 1 ; $b <= $a ; $b++){
      if ($mPage == $b){
        if (isset($_GET['searchManga'])) {
          echo '<a href="?choose=manga&ac=list&searchManga='.$_GET['searchManga'].'&mpage='.$b.'" style="text-decoration:underline;color:white;">'.$b.' ' .'</a>';
        }else {
          echo '<a href="?choose=manga&ac=list&mpage='.$b.'" style="text-decoration:underline;color:white;">'.$b.' ' .'</a>';
        }
      }else{
        if (isset($_GET['searchManga'])) {
          echo '<a href="?choose=manga&ac=list&searchManga='.$_GET['searchManga'].'&mpage='.$b.'" style="text-decoration:none;color:darkorange;">'.$b.' ' .'</a>';
        }else {
          echo '<a href="?choose=manga&ac=list&mpage='.$b.'" style="text-decoration:none;color:darkorange;">'.$b.' ' .'</a>';
        }      
      }
    }
  ?>
</div>
