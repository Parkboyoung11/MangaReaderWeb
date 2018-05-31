<header> 
    <div class="inner clearfix">
      <div id="headeLeftBox">
        <p>Welcome <?php echo isset($_COOKIE['userSignIn']) ? $_COOKIE['userSignIn'] : "you" ?>！</p>
        <p id="h1logo"><a href="http://9fury.cf"><img src="https://c1.staticflickr.com/5/4486/23840709338_b3a6bc985a_o.png" alt="Sorry, can't load image :("><img class="logoSmall" src="https://i.imgur.com/ReGCjfN.png" alt=""></a></p>
      </div>
      <div id="headeRightBox" class="clearfix"> 
        <div id="searchFormHeaderWrap">
          <form name="searchForm" id="searchFormHeader" method="get" action="">
            <input name="q" autofocus="autofocus" class="keywordBox" value="<?php echo $_GET['q']?>" type="text" placeholder="Search Manga ....">
            <input type="submit" title="Search" name="choose" class="searchBtn" value="search">
          </form>
        </div>
        <?php
          if (isset($_COOKIE['userSignIn'])) {
            include('Modules/Content/ShowTableInfor.php');
          }else{
            echo '<ul id="userMenu" class="clearfix">';
            echo   '<li class="userMenu_lang">';
            echo    '<a href="SignInUp/signin.php">Sign in</a>';
            echo   '</li>';
            echo '</ul>';
          }
        ?>
      </div>
    </div>
</header>