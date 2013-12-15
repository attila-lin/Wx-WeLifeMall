<?php
include "wechat.class.php";
$options = array(
        'token'=>'lalala', //填写你设定的key
        'appid'=>'wx1efe5966178f5a9f', //填写高级调用功能的app id
        'appsecret'=>'fb152772bdd80a86e2a4117d482ed3d1', //填写高级调用功能的密钥
    );
$weObj = new Wechat($options);

// $echoStr = $weObj->valid($return=true);
// echo $echoStr;

$type = $weObj->getRev()->getRevType();
$user = $weObj->getRev()->getRevFrom();
$content = $weObj->getRev()->getRevContent();

switch($type) {
    case Wechat::MSGTYPE_TEXT:
            // $weObj->text("hello, I'm wechat")->reply();
            if($content == '点单'){
                $newsData = array(
                array(
                    'Title'=>'点击查看今日菜谱',
                    'Description'=>'',
                    'PicUrl'=>'http://www.welifemall.com/Upload/20131204101750foc.jpg',
                    'Url'=>'http://www.ingfs.com/today.php?user=' . $user,
                    )
                );
                $weObj->news($newsData)->reply();
            }
            else{
                $weObj->text("回复“点单”显示今日菜单")->reply();
            }
            exit;
            break;
    case Wechat::MSGTYPE_EVENT:
            $weObj->text("欢迎关注来福猫。回复'点单'显示今日菜单")->reply();
            break;
    case Wechat::MSGTYPE_IMAGE:
            break;
    default:
            $weObj->text("help info")->reply();
}

//获取菜单操作:
$menu = $weObj->getMenu();
//设置菜单
$newmenu =  array(
  "button"=>
      array(
          array('type'=>'click','name'=>'最新消息','key'=>'MENU_KEY_NEWS'),
          array('type'=>'view','name'=>'我要点单','url'=>'http://www.ingfs.com/today.php?user=' . $user),
          )
);
$result = $weObj->createMenu($newmenu);