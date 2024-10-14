<?php
//初始化
require("../config.php");

if (isset($_POST['name'])) {
    $tagName = $_POST['name'];
} else {
    echo "标签名称不能为空";
    exit;
}

$associationTags = selectAssociationTags($tagName);
// 开启输出缓冲
ob_start();
?>

<div class="container-fluid user-select-none">
    <div class="row">

        <div class="col-12 py-5">
            <h3 class="border shadow-sm p-4" data-bs-toggle="collapse">
                <?= $tagName ?>
            </h3>
            <button type="button" class="btn btn-outline-secondary shadow-sm position-relative"
                href="#associationTags" data-bs-toggle="collapse">
                关联标签
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info">
                    <?= count($associationTags) ?>
                </span>
            </button>
            <div id="associationTags" class="collapse shadow-sm p-2">
                <?php foreach ($associationTags as $associationTag): ?>
                    <button type="button" class="btn badge bg-info" onclick="sendTagByName('<?= $associationTag ?>')">
                        <?= $associationTag ?>
                    </button>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid user-select-none">

</div>  

<?php
// 获取缓冲区内容并清除缓冲
$content = ob_get_clean();
echo $content;
?>