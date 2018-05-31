  <?php 
    $username = $_COOKIE['userSignIn'];
    $sql = "SELECT avatar, uid from users where username='$username' limit 1";
    $userInfor = $database->query($sql);
    $userInfor->setFetchMode(PDO::FETCH_ASSOC);

    $row = $userInfor->fetch();
    $avatar = $row['avatar'];
    $uid = $row['uid'];
  ?>
  <ul class="d-flex list-style-none">
    <li class="dropdown">
      <details>
        <summary>
                <img class="avatar float-left mr-1" src="<?php $timeStamp = time(); if ($avatar == ''){ echo 'Image/defaultAvatar.jpg';}else{ echo $avatar.'?'.$timeStamp;} ?>" height="35" width="35">
        </summary>
        <ul class="dropdown-menu dropdown-menu-sw">
          <li class="dropdown-header header-nav-current-user css-truncate">
                  Signed in as <strong class="css-truncate-target"><?php echo $username; ?></strong>
          </li>
          <li class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="?choose=profile" data-ga-click="Header, go to help, text:help">
                  Your Profile
                </a></li>
          <li><a class="dropdown-item" href="?choose=subscribe" data-ga-click="Header, go to settings, icon:settings">
                  Subscribes 
                </a></li>
          <li>
            <form action="Controller/signout.php" method="post" enctype="multipart/form-data">
            <input type="submit" class="dropdown-item dropdown-signout" name="signout" value="Sign out"/>
            </form>
          </li>
        </ul>
      </details>
    </li>
  </ul>