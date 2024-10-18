<div class="container user-select-none">
    <div class="row user-select-none mb-3">
        <div class="col user-select-none">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-center align-items-center">
                        <h3 class="me-2"><?= $tagName ?></h3>
                        <div class="d-flex flex-column">
                            <span class="badge rounded-pill bg-primary">链接数 <?= count($links) ?></span>
                            <span class="badge rounded-pill bg-info mt-1">
                                关联标签 <?= count($associationTags) ?>
                            </span>
                        </div>
                    </div>
                </div>
                <?php if (!empty($associationTags)): ?>
                    <div class="card-footer">

                        <?php if (count($associationTags) > $groupNumber): ?>
                            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <?php foreach ($groupAssociationTags as $index => $groupAssociationTag): ?>
                                        <div class="carousel-item <?= $index === 0 ? 'active' : ''; ?>">
                                            <div class="d-flex justify-content-center">
                                                <?php foreach ($groupAssociationTag as $associationTag): ?>
                                                    <button type="button" class="btn badge bg-info m-1"
                                                        onclick="sendTagByName('<?= htmlspecialchars($associationTag, ENT_QUOTES) ?>')">
                                                        <?= htmlspecialchars($associationTag, ENT_QUOTES) ?>
                                                    </button>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon bg-dark bg-opacity-75"></span>
                                    <span class="visually-hidden">上一组</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                    <span class="carousel-control-next-icon bg-dark bg-opacity-75"></span>
                                    <span class="visually-hidden">下一组</span>
                                </button>
                            </div>
                        <?php else: ?>
                            <div class="d-flex justify-content-center">
                                <?php foreach ($associationTags as $associationTag): ?>
                                    <button type="button" class="btn badge bg-info m-1"
                                        onclick="sendTagByName('<?= htmlspecialchars($associationTag, ENT_QUOTES) ?>')">
                                        <?= htmlspecialchars($associationTag, ENT_QUOTES) ?>
                                    </button>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php
    if (empty($links)) {
        include_once(BASE_URL . "includes/empty.php");
        exit;
    }
    ?>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3 user-select-none">
        <?php foreach ($links as $link): ?>

            <?php
            if (empty($link['name']) || empty($link['href'])) {
                continue;
            }
            ?>
            
            <div class="col user-select-none">
                <div class="card border shadow-sm user-select-none">

                    <div class="card-body d-flex align-items-center">
                        <?php if (!empty($link['icon'])): ?>
                            <img src="<?= $link['icon'] ?>" alt="<?= $link['name'] ?>" class="me-2">
                        <?php endif; ?>
                        <a href="<?= $link['href'] ?>" class="text-decoration-none flex-grow-1 text-truncate" target="_blank"
                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?= $link['name'] ?> <?= $link['href'] ?>">
                            <?= $link['name'] ?>
                        </a>
                    </div>

                    <div class="card-footer d-flex flex-wrap">
                        <?php foreach ($link['tags'] as $tag): ?>
                            <button type="button" class="btn badge bg-info me-1 mb-1"
                                onclick="<?php if ($tag === $tagName) {
                                                echo "scrollToTop('main')";
                                            } else {
                                                echo "sendTagByName('{$tag}')";
                                            } ?>">
                                <?= $tag ?>
                            </button>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>