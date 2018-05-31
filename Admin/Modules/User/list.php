<?php
  $itemInAPage = 10;
  if(isset($_GET['upage'])){
    $upage=$_GET['upage'];
  }else{
    $upage=''; 
  }

  if($upage == '' || $upage == '1'){
    $upageTmp = 0;
  }else{
    $upageTmp = ($upage * $itemInAPage) - $itemInAPage;
  }

  $_SESSION['uPageNumber'] = $upage;

  if (isset($_GET['searchUser'])) {
    $sqlUser = "SELECT * from users where username ilike '%$_GET[searchUser]%' or email ilike '%$_GET[searchUser]%' or fullname ilike '%$_GET[searchUser]%' order by uid asc limit $itemInAPage offset $upageTmp";
  }else {
    $sqlUser = "SELECT * from users order by uid asc limit $itemInAPage offset $upageTmp";
  }

  $listUser = $database->query($sqlUser);
  $listUser->setFetchMode(PDO::FETCH_ASSOC);
?>
<div class="searchAndAdd">
  <form name="searchForm" action="Modules/User/searchUser.php" style="width: 35%; float: right; margin-right: 10px; " id="searchFormHeader" method="get">
      <input name="searchUser" class="keywordBox" value="<?php echo $_GET['searchUser'] ?>" type="text" placeholder="Search User   ....">
  </form>
</div>
<table width="100%" border="1">
  <tr>
    <td class="subTitle">ID</td>
    <td class="subTitle">Email</td>
    <td class="subTitle">Username</td>
    <td class="subTitle">Full Name</td>
    <td class="subTitle">Gender</td>
    <td class="subTitle">Status</td>
    <td colspan="2" class="subTitle">Manage</td>
  </tr>
  <?php
  $i=1;
  while($row = $listUser->fetch()){
    ?>
      <tr>
        <td class="contentTable"><?php  echo $row['uid']; ?></td>
        <td class="contentTable"><?php echo $row['email']; ?></td>
        <td class="contentTable"><?php echo $row['username']; ?></td>
        <td class="contentTable"><?php echo $row['fullname'] ?? 'N/A'; ?></td>
        <td class="contentTable"><?php
          if ($row['gender'] === NULL) {
                echo "N/A";
              }elseif ($row['gender'] == 1) {
                echo "Male";
              }else {
                echo "Female";
              }
        ?></td>
        <td class="contentTable"><?php
          if (!$row['isdisable']) {
            echo "Normal";
          }else {
            echo "Disabled";
          }
        ?></td>
        <td  class="manageTool" <?php if($row['isdisable'] == 1){echo 'style="opacity: 0.3; pointer-events: none"';}?>>
          <a href="Modules/User/handle.php?<?php if($_GET['searchUser'] != ''){echo "searchUser=$_GET[searchUser]&";}?>ac=delete&uid=<?php echo $row['uid']?>" class="delete_link"><center><img src="../Image/delete.png" width="30" height="30"/></center></a>
        </td>
        <td  class="manageTool" <?php if(!$row['isdisable']){echo 'style="opacity: 0.3; pointer-events: none"';}?>>
          <a href="Modules/User/handle.php?<?php if($_GET['searchUser'] != ''){echo "searchUser=$_GET[searchUser]&";}?>ac=reDelete&uid=<?php echo $row['uid']?>" class="update_link"><center><img src="../Image/reset.png" width="30" height="30"/></center></a>
        </td>
      </tr>
    <?php
    $i++;
  }
  ?>
</table>
<div class="page">
  Page :
  <?php
    if (isset($_GET['searchUser'])) {
      $sqlSearch = "SELECT uid from users where username ilike '%$_GET[searchUser]%' or email ilike '%$_GET[searchUser]%' or fullname ilike '%$_GET[searchUser]%'";
    }else {
      $sqlSearch = "SELECT uid from users";
    }

    $result = $database->query($sqlSearch);
    $countPage = $result->rowCount();

    $a = ceil($countPage / $itemInAPage);   // lam tron len 4.3->5
    for($b = 1 ; $b <= $a ; $b++){
      if ($upage == $b){
        if (isset($_GET['searchUser'])) {
          echo '<a href="?choose=user&ac=list&searchUser='.$_GET['searchUser'].'&upage='.$b.'" style="text-decoration:underline;color:white;">'.$b.' ' .'</a>';
        }else {
          echo '<a href="?choose=user&ac=list&upage='.$b.'" style="text-decoration:underline;color:white;">'.$b.' ' .'</a>';
        }
      }else{
        if (isset($_GET['searchUser'])) {
          echo '<a href="?choose=user&ac=list&searchUser='.$_GET['searchUser'].'&upage='.$b.'" style="text-decoration:none;color:darkorange;">'.$b.' ' .'</a>';
        }else {
          echo '<a href="?choose=user&ac=list&upage='.$b.'" style="text-decoration:none;color:darkorange;">'.$b.' ' .'</a>';
        }      
      }
    }
  ?>
</div>
