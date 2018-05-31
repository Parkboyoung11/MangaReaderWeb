<?php
  $sqlHomePage = "SELECT name, id, coverimage, status from manga limit 12";
  $result = $database->query($sqlHomePage);
  $result->setFetchMode(PDO::FETCH_ASSOC);
?>
<div id="wrap">
  <div id="contents" class="clearfix color-new">
    <div id="mainContent">
      <div class="innerType-top">
        <dl class="tileListWrap">
          <dd>
            <ul class="tileList clearfix">
              <?php
                while ($row = $result->fetch()) {
                  $name = $row['name'];
                  $id = $row['id'];
                  $coverimage = $row['coverimage'];
                  $href = "?choose=overview&id=$id";
                  $status = $row['status'];
              ?>
              <li>
                <a title="<?php echo $name ?>" href="<?php echo $href ?>" class="" style="background-color:#ffffff;">
                  <h2><span><?php echo $name ?></span></h2>
                  <div class="pic"><img class="" src="<?php echo $coverimage ?>" alt="<?php echo $name ?> Cover Loading ..."></div>
                  <div class="overlay"><img src="https://c1.staticflickr.com/5/4470/37064393673_5a5473af8a_o.png" alt=""></div>
                  <div class="tileBadge <?php echo $status ? "completed" : "onGoing" ?>"></div>
                  <div class="bgHover"></div>
                </a>
              </li>
              <?php
                }
              ?>
            </ul>
          </dd>
        </dl>
      </div>
    </div>
  </div>
</div>