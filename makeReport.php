<?php

/**  本脚本用于生成集成压测报告，需完压测报告后，执行本脚本 **/
/**  本脚本适用于 ab 2.3 Revision: 1706008 版本   **/
/**  author 李培刚 173417114@qq.com   **/

error_reporting(0);

// 报告文件名
$fileCsv   = "压测报告.csv";
// 压测报告保存目录
$reportDir = "./report/";

// csv 表头
$head      = array(
                    '服务器名称',
                    '域名',
                    '端口',
                    '接口地址',
                    '测试并发次数',
                    '总完成时间(s)',
                    '请求次数',
                    '失败次数',
                    '实际并发数',
                    '所有并发用户都请求一次的平均时间(ms)',
                    '50%',
                    '66%',
                    '75%',
                    '80%',
                    '90%',
                    '95%',
                    '98%',
                    '99%',
                    '100%'
            );

// 删除原压测报告
if( is_file( $fileCsv ) ){
  unlink( $fileCsv );
}

/** 压测报告需要通过本数组查找匹配的数据(不可更改) **/
$change = array(
                'Server Software:'        => '',
                'Server Hostname:'        => '',
                'Server Port:'            => '',
                'Document Path:'          => '',
                'Concurrency Level:'      => '',
                'Time taken for tests:'   => '',
                'Complete requests:'      => '',
                'Failed requests:'        => '',
                'Requests per second:'    => '',
                'Time per request:'       => '',
                '50%'                     => '',
                '66%'                     => '',
                '75%'                     => '',
                '80%'                     => '',
                '90%'                     => '',
                '95%'                     => '',
                '98%'                     => '',
                '99%'                     => '',
                '100%'                    => '' 
        );

/** 需要去除的文本字符(不可更改) **/
$strOff = array(
                'seconds'           =>'',
                '[#/sec] (mean)'    =>'',
                '[ms] (mean)'       =>'',
                '(longest request)' =>''
          );

/** 文本写入 **/
$fp = fopen($fileCsv,"a+");
fputcsv($fp, $head);

// 获取文件列表
$fileList = getFileList($reportDir);

foreach($fileList as $file){
  // 获取文件内容
    if($file == "." || $file == ".."){
      continue;
    }
    
    $contentArr = getFileContent($reportDir.$file);

    if(empty($contentArr)){
      die("文件内容为空，请检查：".$reportDir.$file);
    }

    fputcsv($fp,$contentArr);

}
fclose($fp);


// 列出文件夹内所有文件
function getFileList($dir){
  if(!is_dir($dir)){
    die("不存在的文件夹：{$dir}");
  }

  $file = scandir($dir);

  return $file;
}

// 获取文件内容
function getFileContent($file){
    if(!is_file($file)){
      die("不存在的文件：{$file}");
    }

    $str = file_get_contents($file);

    $change = $GLOBALS['change'];
    $strOff = $GLOBALS['strOff'];

    // 正则替换原型
    $rule = "#%s(.*)#";

    foreach($change as $k => $v){
        // 匹配数据
        preg_match(sprintf($rule,$k),$str,$result);
        // 剔除不需要的字符
        $arr[] = trim( strtr($result[1],$strOff) );
    }

    return $arr;
}

