<?php
  $srcImg = $_POST['srcImg'];
  $cropStartX = $_POST['cropStartX'];
  $cropStartY = $_POST['cropStartY'];
  $cropToolWidth = $_POST['cropToolWidth'];
  $cropToolHeight = $_POST['cropToolHeight'];
  $ratio = $_POST['ratio'];
  $username = $_POST['username'];

  $dst_x = 0;
  $dst_y = 0;
  $src_x = $cropStartX * $ratio; // crop start x
  $src_y = $cropStartY * $ratio; // crop start y
  $dst_w = $cropToolWidth * $ratio; // thumb width
  $dst_h = $cropToolHeight * $ratio; // thumb height
  $src_w = $dst_w;
  $src_h = $dst_h;

  $dst_image = imagecreatetruecolor($dst_w, $dst_h);
  $src_image = imagecreatefromjpeg($srcImg);
  imagecopyresampled($dst_image, $src_image, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);
  imagejpeg($dst_image, "../Image/Avatar/$username.png");
?>