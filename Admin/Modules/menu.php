<div class="menu">
  <ul>
    <li><a href="?choose=manga&ac=list" id="manga">Manga</a></li>
    <li><a href="?choose=user&ac=list" id="user">Users</a></li>    
    <li><a href="?choose=password&ac=reset" id="password">Reset Pass</a></li>
    <form action="" method="post" enctype="multipart/form-data">
      <input type="submit" name="logout" value="Logout" style="background:#06F;color:#fff;height:40px;font-size: 20px;width: 147px;">
    </form>
  </ul>
</div>
<script type="text/javascript">
  if (window.location.href.indexOf('user') != -1) {
    document.getElementById('user').style.backgroundColor = 'rgba(33, 31, 31,0.3)';
    document.getElementById('user').style.color = '#000';
    document.getElementById('user').style.fontWeight = 'bolder';
  }else if (window.location.href.indexOf('password') != -1) {
    document.getElementById('password').style.backgroundColor = 'rgba(33, 31, 31,0.3)';
    document.getElementById('password').style.color = '#000';
    document.getElementById('password').style.fontWeight = 'bolder';
  }else {
    document.getElementById('manga').style.backgroundColor = 'rgba(33, 31, 31,0.3)';
    document.getElementById('manga').style.color = '#000';
    document.getElementById('manga').style.fontWeight = 'bolder';
  }
</script>