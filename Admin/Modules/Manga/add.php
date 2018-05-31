<div class="button_themsp"> 
  <a href="?quanly=department&ac=lietke"><center><img src="../Image/list.png" width="40" height="40" /></center></a>
</div>
<form action="Modules/Manga/handle.php" method="post" enctype="multipart/form-data">
  <h3>&nbsp;</h3>
  <table width="600" border="1">
    <tr>
      <td colspan="2" style="text-align:center; font-size:45px; background-color: rgba(0,0,0,0.9); font-weight: bold; color: red; border: 2px solid gray">Add Manga</td>
    </tr>
    <tr>
      <td width="230" class="tdAdd">Name</td>
      <td class="inputTD"><input type="text" name="name" required="required" class="inputCSS"></td>     
    </tr>
    <tr>
      <td class="tdAdd">Release</td>
      <td class="inputTD"><input type="number" min="1900" max="2020" name="release" required="required" class="inputCSS"></td>
    </tr>
    <tr>
      <td class="tdAdd">Genre</td>
      <td class="inputTD"><input type="text" name="genre" required="required" class="inputCSS"></td>
    </tr>
    <tr>
      <td class="tdAdd">Status</td>
      <td class="selectPosition">
        Completed <input type="radio" name="status" value="1" style="width: 10%; height: 20px;">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;On Going <input type="radio" name="status" value="0" checked="checked" style="width: 10%; height: 20px;">
      </td>
    </tr>
    <tr>
      <td class="tdAdd">Author</td>
      <td class="inputTD"><input type="text" name="author" required="required" class="inputCSS"></td>
    </tr>
    <tr>
      <td class="tdAdd">Summary</td>
      <td class="inputTD"><textarea name="summary" cols="40" rows="10" class="inputCSS"></textarea></td>
    </tr>
    <tr>
      <td class="tdAdd">CoverImage</td>
      <td class="inputTD"><input type="text" name="coverImage" required="required" class="inputCSS"></td>
    </tr>
    <tr>
      <td class="tdAdd">DataLink</td>
      <td class="inputTD"><input type="text" name="dataLink" required="required" class="inputCSS"></td>
    </tr>
    <tr>
      <td colspan="2" class="creatButtonTD"><div align="center">
        <input type="submit" name="add" value="Add" class="creatButton">
      </div></td>
    </tr>
  </table>
  <div>
    &nbsp;
  </div>
</form>