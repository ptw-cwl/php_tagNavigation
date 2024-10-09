<div class="modal fade" id="tags">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content user-select-none">

            <div class="modal-header">
                <div class="input-group">
                    <h1 class="me-5">标签导航</h1>
                    <input id="searchInput" type="search" autocomplete="false" placeholder="请输入要搜索的标签" aria-label="搜索标签" list="tagList">
                    <datalist id="tagList">
                        <?php foreach ($tags as $tag): ?>
                            <option value="<?= htmlspecialchars($tag) ?>"><?= htmlspecialchars($tag) ?></option>
                        <?php endforeach; ?>
                    </datalist>
                    <button id="searchTag" type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                        onclick="searchTag()">搜索</button>
                </div>
            </div>

            <div class="modal-body">
                <?php foreach ($tags as $tag): ?>
                    <button type="button" class="btn btn-outline-primary shadow m-1" data-bs-dismiss="modal"
                        onclick="jump(<?= htmlspecialchars($tag) ?>)">
                        <?= htmlspecialchars($tag) ?>
                    </button>
                <?php endforeach; ?>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">关闭</button>
            </div>

        </div>
    </div>
</div>