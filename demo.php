<?php
include "wechat.class.php";
$options = array(
        'token'=>'lalala' //填写你设定的key
    );
$weObj = new Wechat($options);

// $echoStr = $weObj->valid($return = true);
// echo $echoStr;

$type = $weObj->getRev()->getRevType();


switch($type) {
    case Wechat::MSGTYPE_TEXT:
            // $weObj->text("hello, I'm wechat")->reply();
            $newsData = array(
                array(
                    'Title'=>'点击查看今日菜谱',
                    'Description'=>'',
                    'PicUrl'=>'http://www.welifemall.com/Upload/20131204101750foc.jpg',
                    'Url'=>'http://www.welifemall.com/'
                    )
            );
            $weObj->news($newsData)->reply();
            exit;
            break;
    case Wechat::MSGTYPE_EVENT:
            break;
    case Wechat::MSGTYPE_IMAGE:
            break;
    default:
            $weObj->text("help info")->reply();
}

// //获取菜单操作:
// $menu = $weObj->getMenu();
// //设置菜单
// $newmenu =  array(
//   "button"=>
//       array(
//           array('type'=>'click','name'=>'最新消息','key'=>'MENU_KEY_NEWS'),
//           array('type'=>'view','name'=>'我要搜索','url'=>'http://www.baidu.com'),
//           )
// );
// $result = $weObj->createMenu($newmenu);