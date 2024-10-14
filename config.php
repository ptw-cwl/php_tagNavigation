<?php
//作者
const AUTHOR = 'Ptw-cwl';

//网站名称
const SITE_NAME = 'Ptw-cwl的导航网站';

//载入sql操作
require("data/dao.php");

//标签信息
$tags = selectTag();