<?php
/**
 * Created by IntelliJ IDEA.
 * User: 520Cloud
 * Date: 2017/11/7
 * Time: 0:05
 */
function drawRating($rating) {
    $image = imagecreate(102,10);
    $back = ImageColorAllocate($image,0,0,0);
    echo $back;
    $border = ImageColorAllocate($image,0,0,0);
    $red = ImageColorAllocate($image,255,60,75);
    $fill = ImageColorAllocate($image,44,81,150);
    ImageFilledRectangle($image,0,0,101,9,$back);
//    ImageFilledRectangle($image,1,1,$rating,9,$fill);
//    ImageRectangle($image,0,0,101,9,$border);
    imagePNG($image,"aaa.png");
    imagedestroy($image);
}

//Header("Content-type: image/png");
//drawRating(1);
echo mb_strlen("（\r\n");