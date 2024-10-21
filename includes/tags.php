<div class="modal fade" id="tags">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content user-select-none">

            <div class="modal-header">
                <div class="row g-3 w-100 align-items-center">
                    <div class="col-auto">
                        <h1 class="mb-0">标签导航</h1>
                    </div>
                    <div class="col-auto">
                        <div class="input-group">
                            <input id="searchTagInput" type="search" autocomplete="off" placeholder="请输入要搜索的标签" aria-label="搜索标签" list="tagList" class="form-control">
                            <datalist id="tagList">
                                <?php foreach ($tags as $tag): ?>
                                    <option value="<?= htmlspecialchars($tag['name'], ENT_QUOTES) ?>"><?= htmlspecialchars($tag['name'], ENT_QUOTES) ?></option>
                                <?php endforeach; ?>
                            </datalist>
                            <button id="searchTag" type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" onclick="sendTagByInput()">搜索</button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal-body">
                <div class="container">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-2">
                        <?php foreach ($tags as $tag): ?>
                            <div class="col">
                                <button type="button" class="btn btn-outline-primary shadow w-100 d-flex justify-content-between align-items-center"
                                    data-bs-dismiss="modal" onclick="sendTagByName('<?= htmlspecialchars($tag['name'], ENT_QUOTES) ?>')">
                                    <div class="text-truncate flex-grow-1 text-center"><?= htmlspecialchars($tag['name'], ENT_QUOTES) ?></div>
                                    <span class="badge bg-info flex-shrink-0"><?= $tag['count'] ?></span>
                                </button>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">关闭</button>
            </div>

        </div>
    </div>
</div>