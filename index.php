<?php
/*
   配置错误报告
   E_ALL：报告所有类型的错误
   ^：按位异或运算符，用于排除特定错误类型
   E_NOTICE：忽略通知错误，通常是轻微的，不会影响脚本执行
   E_WARNING：忽略警告错误，表示潜在的问题，但不会停止脚本执行
   E_DEPRECATED：忽略过时错误，表示使用了不推荐的功能 
*/
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_DEPRECATED);

// 设置响应的内容类型为 HTML，并指定字符编码为 UTF-8，以确保正确处理中文字符
header("content-Type: text/html; charset=Utf-8");

//载入配置文件
require("config.php");

//载入主页
include_once("controller/main.php");
