<div id="home-container">
    <div id="home-header">
        <h1>Chào mừng đến với XemPhimChua</h1>
        <p>Khám phá danh sách các bộ phim hấp dẫn.</p>
    </div>

    <div id="movie-grid">
        <?php foreach ($movies as $movie): ?>
            <?php
            $bannerPath = !empty($movie['banner'])
                ? PATH_ASSETS_UPLOAD . $movie['banner']
                : (PATH_ASSETS_UPLOAD . '/imgs/poster-placeholder.png');

            $hasPurchased = $movie['hasPurchased'] ?? false;
            $userBalance = $user['coin_balance'] ?? 0;
            $canBuy = !$hasPurchased && $userBalance >= ($movie['price'] ?? 0);
            ?>

            <div id="movie-item">
                <img style="height: 300px;" src="<?= htmlspecialchars($bannerPath) ?>" alt="Poster Phim">
                <h3><?= htmlspecialchars($movie['title'] ?? 'Chưa rõ tên') ?></h3>
                <p id="movie-genre">Thể loại: <?= htmlspecialchars($movie['genre_name'] ?? 'Không xác định') ?></p>
                <p>Ngày phát hành: <?= htmlspecialchars($movie['release_date'] ?? 'Không xác định') ?></p>
                <p>Giá: <?= htmlspecialchars($movie['price'] ?? 0) ?> Coin</p>

                <?php if ($hasPurchased): ?>
                    <div id="action-buttons">
                        <a href="?action=download&movie_id=<?= $movie['movie_id'] ?>" id="btn-download" class="btn btn-small">Tải Xuống</a>
                        <a href="?action=watch&movie_id=<?= $movie['movie_id'] ?>" id="btn-watch" class="btn btn-small">Xem Phim</a>
                    </div>
                <?php elseif ($canBuy): ?>
                    <div id="action-buttons">
                        <form action="?action=buy-movie" method="post">
                            <input type="hidden" name="movie_id" value="<?= $movie['movie_id'] ?>">
                            <button type="submit" id="btn-buy" class="btn btn-small">Mua Phim</button>
                        </form>
                    </div>
                <?php else: ?>
                    <div id="action-buttons">
                        <button id="btn-disabled" class="btn btn-small" disabled>Không đủ coin</button>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>

    <div id="pagination">
        <?php if ($currentPage > 1): ?>
            <a href="?page=<?= $currentPage - 1 ?>" id="prev">« Trước</a>
        <?php else: ?>
            <span id="prev" class="disabled">« Trước</span>
        <?php endif; ?>

        <div id="pages">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <?php if ($i == $currentPage): ?>
                    <span id="page-active"><?= $i ?></span>
                <?php else: ?>
                    <a id="page" href="?page=<?= $i ?>"><?= $i ?></a>
                <?php endif; ?>
            <?php endfor; ?>
        </div>

        <?php if ($currentPage < $totalPages): ?>
            <a href="?page=<?= $currentPage + 1 ?>" id="next">Tiếp »</a>
        <?php else: ?>
            <span id="next" class="disabled">Tiếp »</span>
        <?php endif; ?>
    </div>
</div>