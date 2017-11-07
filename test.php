<?php
/**
 * Created by IntelliJ IDEA.
 * User: 520Cloud
 * Date: 2017/11/5
 * Time: 22:44
 */
define("DEBUG",1);
include "utils/ImageUtils.php";
//list($width,$height) = getimagesize("./fire_bg.png");
//$im = imagecreate($width*2,$height);
$src = imagecreatefrompng("./sources/bg/huo_yang.png");
//list($width,$height) = getimagesize("./source/huo_yang.png");
//imagecopymerge($im,$src,0,0,0,0,$width,$height,100);
//imagecopymerge($im,$src,$width,0,0,0,$width,$height,100);
//$color = Array(255,255,255);
//$params = array_merge(Array($im),$color);
//$fontColor = call_user_func_array("imagecolorallocate",$params);
//imagepng($im,"fire_bg11.png");

$imageUtils = new ImageUtils("./sources/font/PingFang_Regular.ttf",750,1000,Array(255,255,255));
//$imageUtils->drawImage($src,0,0,0,0,750,1000);
//$imageUtils->drawText("Joker的五行小分析",14,Array(255,255,255),null,30,40,"./font/PingFang_Regular.ttf");
$imageUtils->drawRect(20,10,200,500,Array(0,0,0));
$imageUtils->drawRect(100,100,200,500,Array(0,255,0));
$imageUtils->drawTextAutoSpace("五行喜金，与庚金/辛金型朋友相处能显著提升自身运气，适合穿白.金色衣物（内衣",30,Array(255,255,255),20,30,200);
$imageUtils->save("text1.png");
