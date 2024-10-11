<?php
//作者
const AUTHOR = 'Ptw-cwl';

//网站名称
const SITE_NAME = 'Ptw-cwl的导航网站';

//页脚内容
const FOOTER_CONTENT = '版权所属: ' . AUTHOR;

//载入sql操作
require("data/dao.php");

//标签信息
$tags = selectTag();