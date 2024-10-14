<?php
const BASE_URL = "../";

//初始化
require(BASE_URL . "config.php");

if (empty($_POST['name'])) {
    include_once(BASE_URL . "includes/empty.php");
    exit;
}

$tagName = $_POST['name'];

//关联标签
$associationTags = selectAssociationTags($tagName);
//分组后的关联标签
$groupAssociationTags = array_chunk($associationTags, 10);
//链接
$links = selectLinks($tagName);

include_once(BASE_URL . "includes/links.php");
?>