<?php
//初始化
require("../config.php");

if (isset($_POST['name'])) {
    $tagName = $_POST['name'];
} else {
    echo "标签名称不能为空";
    exit;
}

//关联标签
$associationTags = selectAssociationTags($tagName);
//链接
$links = selectLinks($tagName);
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
    <div id="fold_{{ link.tagId }}" class="row collapse show">
        <?php foreach ($links as $link): ?>
            <?php if (!empty($link['name']) && !empty($link['href'])): ?>
                <div class="col-lg-3">
                    <div class="card m-2 border shadow-sm user-select-none">
                        <div class="card-body text-truncate">
                            <?php if (!empty($link['icon'])): ?>
                                <img src="<?= $link['icon'] ?>" alt="<?= $link['name'] ?>">
                            <?php endif; ?>
                            <a href="<?= $link['href'] ?>" class="text-decoration-none" target="_blank" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" title="<?= $link['name'] ?> <?= $link['href'] ?>">
                                <?= $link['name'] ?>
                            </a>
                        </div>
                        <div class="card-footer">
                            <?php foreach ($link['tags'] as $tag): ?>
                                <button type="button" class="btn badge bg-info" onclick="sendTagByName('<?= $tag ?>')">
                                    <?= $tag ?>
                                </button>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>

<?php
// 获取缓冲区内容并清除缓冲
$content = ob_get_clean();
echo $content;
?>