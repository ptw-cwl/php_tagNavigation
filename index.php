<?php
// 设置响应的内容类型为 HTML，并指定字符编码为 UTF-8，以确保正确处理中文字符
header("content-Type: text/html; charset=Utf-8");

//载入配置文件
require("config.php");

//载入主页
include_once("controller/main.php");
