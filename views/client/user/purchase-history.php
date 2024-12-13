<div id="purchase-history-container">
    <h1>Lịch sử phim đã mua</h1>

    <?php if (!empty($movies)) : ?>
        <div id="movie-grid">
            <?php foreach ($movies as $movie): ?>
                <?php
                $bannerPath = !empty($movie['banner'])
                    ? PATH_ASSETS_UPLOAD . $movie['banner']
                    : (PATH_ASSETS_UPLOAD . '/imgs/poster-placeholder.png');
                ?>
                <div id="movie-item">
                    <img style="height: 300px;" src="<?= htmlspecialchars($bannerPath) ?>" alt="Poster Phim">
                    <h3><?= htmlspecialchars($movie['title'] ?? 'Chưa rõ tên') ?></h3>
                    <p>Thể loại: <?= htmlspecialchars($movie['genre_name'] ?? 'Không xác định') ?></p>
                    <p>Ngày phát hành: <?= htmlspecialchars($movie['release_date'] ?? 'Không xác định') ?></p>
                    <p>Giá: <?= htmlspecialchars($movie['price'] ?? 0) ?> Coin</p>
                    <div id="action-buttons">
                        <a href="?action=download&movie_id=<?= $movie['movie_id'] ?>" id="btn-download" class="btn btn-small">Tải Xuống</a>
                        <a href="?action=watch&movie_id=<?= $movie['movie_id'] ?>" id="btn-watch" class="btn btn-small">Xem Phim</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <p>Bạn chưa mua bất kỳ phim nào.</p>
    <?php endif; ?>
</div>