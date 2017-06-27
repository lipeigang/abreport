<?php
error_reporting(0);
// 域名
$domain = "guanchan.123xiaomi.com";
// $domain = "gc.cn";
// 端口
$port = 80;
// 每次并发数
$c = 100;
// 请求次数
$n = 5000;
// 请求头信息
$t = " 'application/json' ";
// ab 命令
$ab = "ab -n $n -c $c -T $t -k ";
// 每次命令执行完的睡眠时间(s)
$sleepTime = 5;
// 压测报告保存目录
$outputFileDir = "./report/";
// 配置文件保存目录
$iniDir = "./ini/";
// api接口列表
$apiList = require('./apiList.php');
// 例外接口地址 example: "/api.php?c=user&a=login"
$exceptionApi = array('/api.php?c=user&a=login');

// 如果有例外接口。说明只测试单个接口
if( !empty( $exceptionApi ) ){
  c_Api( $exceptionApi, $apiList );
  die("执行完毕1");
}

c_apiList( $apiList );
die("执行完毕2");

// 特定接口压测
function c_Api($exceptionApi = array(), $apiList = array()){
   $tem = array();
   foreach($apiList as $api){
     if( in_array( $api['api'],$exceptionApi ) ){
          $tem[] = $api;
     }
   }

   c_apiList( $tem, false );
}

// 批量接口压测
function c_apiList($apiList = array(), $isCheckTest = true){
  foreach ($apiList as $api){
      if( !$api['isTest'] && $isCheckTest == true ){
            continue;
      }

      // 配置文件
      $iniFile    = $GLOBALS['iniDir'].$api['iniFile'];
      // ab 命令
      $system     = $GLOBALS['ab'];
      // 域名
      $url        = $GLOBALS['domain'].$api['api'];
      // 压测输出文件
      $outputFile = $GLOBALS['outputFileDir'].$api['name'].".txt";

      if( $api['iniFile'] && is_file( $iniFile ) ){
        $system  .= " -p ".$iniFile;
      }

      $system    .= " '".$url."' > ". $outputFile ; 
      echo $system.PHP_EOL;
      _c( $system );
  }
}

// 执行压测命令
function _c($exec){
    if( empty( $exec ) ){
       die("压测命令为空");
    }
    
    shell_exec( $exec );
    // 休眠
    sleep( $GLOBALS['sleepTime'] );
}

