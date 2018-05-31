<?php  
  $sql = "SELECT * from manga where id='$_GET[id]' ";
  $result = $database->query($sql);
  $result->setFetchMode(PDO::FETCH_ASSOC);
  $row = $result->fetch();

  $id = $_GET['id'];
  $name = $row['name'];
  $nChapters = $row['numberofchapter'];
  $release = $row['release'];
  $genre = $row['genre'];
  $status = $row['status'];
  $author = $row['author'];
  $summary = $row['summary'];
  $coverImage = $row['coverimage'];
  $dataLink = $row['mangareaderinfolink'];

?>
<div class="button_themsp">
  <a href="?<?php if($_GET['searchManga'] != ''){echo "searchManga=$_GET[searchManga]&";}?>choose=manga&ac=list"><center><img src="../Image/list.png" width="40" height="40" /></center></a>
</div>
<form action="Modules/Manga/handle.php?<?php if($_GET['searchManga'] != ''){echo "searchManga=$_GET[searchManga]&";}?>ac=edit&id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
  <h3>&nbsp;</h3>
  <table width="600" border="1">
    <tr>
      <td colspan="2" style="text-align:center; font-size:45px; background-color: rgba(0,0,0,0.9); font-weight: bold; color: red; border: 2px solid gray">Edit Manga</td>
    </tr>
    <tr>
      <td width="230" class="tdAdd">Name</td>
      <td class="inputTD"><input type="text" name="name" class="inputCSS" required="required" value="<?php echo $name ?>"></td>     
    </tr>
    <tr>
      <td class="tdAdd">Release</td>
      <td class="inputTD"><input type="number" min="1900" max="2020" name="release" required="required" value="<?php echo $release ?>" class="inputCSS"></td>
    </tr>
    <tr>
      <td class="tdAdd">Genre</td>
      <td class="inputTD"><input type="text" name="genre" required="required" value="<?php echo $genre ?>" class="inputCSS"></td>
    </tr>
    <tr>
      <td class="tdAdd">Status</td>
      <td class="selectPosition">
        <?php
          if ($status) {
            echo 'Completed <input type="radio" name="status" value="1" checked="checked" style="width: 10%; height: 20px;">';
            echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;On Going <input type="radio" name="status" value="0" style="width: 10%; height: 20px;">';
          }else {
            echo 'Completed <input type="radio" name="status" value="1" style="width: 10%; height: 20px;">';
            echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;On Going <input type="radio" name="status" value="0" checked="checked" style="width: 10%; height: 20px;">';
          }
        ?>
      </td>
    </tr>
    <tr>
      <td class="tdAdd">Author</td>
      <td class="inputTD"><input type="text" name="author" required="required" value="<?php echo $author ?>" class="inputCSS"></td>
    </tr>  
    <tr>
      <td class="tdAdd">Summary</td>
      <td class="inputTD"><textarea name="summary" cols="40" rows="10" class="inputCSS"><?php echo $summary ?></textarea></td>
    </tr> 
    <tr>
      <td class="tdAdd">CoverImage</td>
      <td class="inputTD"><input type="text" name="coverImage" required="required" value="<?php echo $coverImage ?>" class="inputCSS"></td>
    </tr> 
    <tr>
      <td class="tdAdd">DataLink</td>
      <td class="inputTD"><input type="text" name="dataLink" required="required" value="<?php echo $dataLink ?>" class="inputCSS"></td>
    </tr>  
    <tr>
      <td colspan="2" class="creatButtonTD"><div align="center">
        <input type="submit" name="edit" value="Edit Manga" class="creatButton">
      </div></td>
    </tr>
  </table>
</form>
<div>
  &nbsp;
</div>