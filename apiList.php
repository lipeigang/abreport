<?php
/** example **/
// array(
//     'name' => '登陆接口', // 名称，也用于压测报告名称
//     'api' => '/api.php?c=user&a=login',// 接口地址
//     'iniFile' => 'login.json',// 配置文件
//     'isTest' => true // 是否接受压测
//   ),
return 
array( 
   array(
    'name' => '登陆接口',  
    'api' => '/api.php?c=user&a=login', 
    'iniFile' => 'login.json', 
    'isTest' => true
  ),
  array(
    'name' => '大师回放列表',  
    'api' => '/api.php?c=My&a=repeatPlayList', 
    'iniFile' => 'repeatPlayList.json', 
    'isTest' => true
  ),
  array(
    'name' => '直播间信息',  
    'api' => '/api.php?c=live&a=initInfo', 
    'iniFile' => 'initInfo.json', 
    'isTest' => true
  ),
  array(
    'name' => '首页大师、广场列表',  
    'api' => '/api.php?c=My&a=personList', 
    'iniFile' => '', 
    'isTest' => true
  ),
  array(
    'name' => '获取指定主播的详细信息',  
    'api' => '/api.php?c=Live&a=server&la=GetUserInfo', 
    'iniFile' => 'getUserInfo.json', 
    'isTest' => true
  ),
  array(
    'name' => '通知业务服务器有群成员进入',  
    'api' => '/api.php?c=Live&a=server&la=EnterGroup', 
    'iniFile' => 'enterGroup.json', 
    'isTest' => true
  ),
  array(
    'name' => '通知业务服务器有群成员退出',  
    'api' => '/api.php?c=Live&a=server&la=QuitGroup', 
    'iniFile' => 'QuitGroup.json', 
    'isTest' => true
  ),
  array(
    'name' => '拉取群成员列表',  
    'api' => '/api.php?c=Live&a=server&la=FetchGroupMemberList', 
    'iniFile' => 'fetchGroupMemberList.json', 
    'isTest' => true
  ),
  array(
    'name' => '直播间赠送礼物金额排行',  
    'api' => '/api.php?c=Live&a=server&la=topGift', 
    'iniFile' => 'topGift.json', 
    'isTest' => true
  ),
  array(
    'name' => '礼物列表',  
    'api' => '/api.php?c=Gift&a=gList', 
    'iniFile' => 'gList.json', 
    'isTest' => true
  ),
  array(
    'name' => '送礼物',  
    'api' => '/api.php?c=Gift&a=gGive', 
    'iniFile' => 'gGive.json', 
    'isTest' => true
  ),
  array(
    'name' => '关注、取消关注',  
    'api' => '/api.php?c=My&a=attention', 
    'iniFile' => 'attention.json', 
    'isTest' => true
  ),
  array(
    'name' => '关闭、开启某个聊天室聊天标记',  
    'api' => '/api.php?c=TimRest&a=groupForbidAll', 
    'iniFile' => 'groupForbidAll.json', 
    'isTest' => true
  ),
);