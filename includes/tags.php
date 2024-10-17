<div class="modal fade" id="tags">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content user-select-none">

            <div class="modal-header user-select-none">
                <div class="input-group">
                    <h1 class="me-5">标签导航</h1>
                    <input id="searchTagInput" type="search" autocomplete="false" placeholder="请输入要搜索的标签" aria-label="搜索标签" list="tagList">
                    <datalist id="tagList">
                        <?php foreach ($tags as $tag): ?>
                            <option value="<?= $tag['name'] ?>"><?= $tag['name'] ?></option>
                        <?php endforeach; ?>
                    </datalist>
                    <button id="searchTag" type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" onclick="sendTagByInput()">搜索</button>
                </div>
            </div>

            <div class="modal-body user-select-none">
                <div class="container user-select-none">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-2">
                        <?php foreach ($tags as $tag): ?>
                            <div class="col user-select-none">
                                <button type="button" class="btn btn-outline-primary shadow w-100 d-flex justify-content-between align-items-center"
                                    data-bs-dismiss="modal" onclick="sendTagByName('<?= $tag['name'] ?>')">
                                    <div class="text-truncate flex-grow-1 text-center"><?= $tag['name'] ?> </div>
                                    <span class="badge bg-info flex-shrink-0"><?= $tag['count'] ?></span>
                                </button>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>

            <div class="modal-footer user-select-none">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">关闭</button>
            </div>

        </div>
    </div>
</div>