<?php
/**
 * Created by IntelliJ IDEA.
 * User: 520Cloud
 * Date: 2017/11/7
 * Time: 14:24
 */

include "utils/ImageUtils.php";
include "utils/CyLang.php";
//
//SCALE= 2;
define("SCALE",2);

$config = file_get_contents("./config.json");
define("CONFIG",$config);
function start(){
    $data=file_get_contents("./data.json");
    $data = json_decode($data);
    $image = new ImageUtils(375*SCALE,10000,Array(255,255,255),"./sources/font/PingFang_Bold.ttf");
    drawHead($data,$image);
    $image->save("1.png");
//    $config[""];

}

function getColor($key){
    $config = json_decode(CONFIG,true);
    return hex2rgb($config["colors"][$key]);
}

function drawHead($data,$image){
    if(false){
        $image = new ImageUtils();
    }
    $typeInfo = $data->type;
    $icon = $typeInfo->icon;
    $name = $typeInfo->name;
    $desc = $typeInfo->desc;
    $key = $typeInfo->key;
    $color = getColor($key);
    $iconPath = "./sources/icon/".$icon;
//    $iconImage=imagecreatefrompng($iconPath);
    $dx = 100;
    $dy = 49.6*SCALE;
    $width=160;
    $height=160;
    $fontSize=16*SCALE;
    $scale = 32.5*SCALE/$width;
    list($desWidth,$desHeight)=$image->drawImage($iconPath,$dx,$dy,0,0,$width,$height,true,$scale);
    $image->drawText($name,$fontSize,$color,null,null,$image->currentY);
}


function getProperty($detail,$key){
    return isset($detail[$key])?$detail[$key]:null;
}

function draw(){
    $data_json=json_decode(file_get_contents("data.json"),true);
    $config_json=json_decode(file_get_contents("config.json"),true);
    $detail=file_get_contents("detail.json");
    $json = array_merge($data_json,$config_json);
    $cy = new CyLang($json);
    $result = $cy->parseAll($detail);
    $detail = json_decode($result,true);
    var_dump( $detail);
    $image = new ImageUtils(375*SCALE,10000,Array(255,255,255),"./sources/font/PingFang_Bold.ttf",2);
    foreach($detail as $d){
        $type = getProperty($d,"type");
        switch ($type){
            case "image":
                $image->drawImageByDetail($d);
                break;
            case "text":
                $image->drawTextByDetail($d);
                break;
            case "list":
                $image->drawBar($d);
                break;
            default:
                break;
        }
    }
    $image->save("2.png");
}


//
//function parseImage($detail){
//    $content = property_exists($detail,"content")?$detail->content:null;
//    $width = property_exists($detail,"width")?$detail->width:null;
//    $height =  property_exists($detail,"height")?$detail->height:null;
//    $color = property_exists($detail,"color")?$detail->color:null;
//    $marginTop = property_exists($detail,"marginTop")?$detail->marginTop:null;
//    $fontSize = property_exists($detail,"fontSize")?$detail->fontSize:null;
//}

draw();