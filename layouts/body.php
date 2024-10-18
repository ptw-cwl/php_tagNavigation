<main class="overflow-auto user-select-none p-3">

    <?php
    //标签信息
    $tags = selectTag();
    // 从大到小排序
    usort($tags, function ($a, $b) {
        return $b['count'] <=> $a['count'];
    });
    //标签模态框
    include_once("includes/tags.php");
    ?>

    <div id="content"></div>

</main>