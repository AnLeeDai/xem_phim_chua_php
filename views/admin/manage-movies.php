<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-center">Quản Lý Phim</h2>
        <a href="<?= BASE_URL_ADMIN ?>&action=add-movie" class="btn btn-primary">Thêm Mới Phim</a>
    </div>

    <!-- Movie Table -->
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên Phim</th>
                <th>Thể Loại</th>
                <th>Giá</th>
                <th>Ngày Phát Hành</th>
                <th>Hành Động</th>
            </tr>
        </thead>

        <tbody>
            <?php if (count($movies) > 0): ?>
                <?php foreach ($movies as $movie): ?>
                    <tr>
                        <td><?= htmlspecialchars($movie['movie_id']) ?></td>
                        <td><?= htmlspecialchars($movie['title']) ?></td>
                        <td><?= htmlspecialchars($movie['genre_name']) ?></td>
                        <td><?= number_format($movie['price']) ?> Coin</td>
                        <td><?= htmlspecialchars($movie['release_date']) ?></td>
                        <td>
                            <a href="<?= BASE_URL_ADMIN ?>&action=edit-movie&movie_id=<?= $movie['movie_id'] ?>" class="btn btn-sm btn-warning">Sửa</a>
                            <form action="<?= BASE_URL_ADMIN ?>&action=delete-movie" method="post" style="display: inline-block;">
                                <input type="hidden" name="movie_id" value="<?= $movie['movie_id'] ?>">
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa phim này?');">Xóa</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">Không có phim nào được tìm thấy.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Phân trang -->
    <?php if ($pagination['total_pages'] > 1): ?>
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <!-- Nút trang đầu -->
                <li class="page-item <?= !$pagination['has_previous'] ? 'disabled' : '' ?>">
                    <a class="page-link" href="<?= BASE_URL_ADMIN ?>&action=manage-movies&page=1&search_movies_admin=<?= urlencode($search) ?>&form_filter_movies_admin=<?= urlencode($genreId) ?>">Đầu</a>
                </li>

                <!-- Nút trang trước -->
                <li class="page-item <?= !$pagination['has_previous'] ? 'disabled' : '' ?>">
                    <a class="page-link" href="<?= BASE_URL_ADMIN ?>&action=manage-movies&page=<?= $pagination['previous_page'] ?>&search_movies_admin=<?= urlencode($search) ?>&form_filter_movies_admin=<?= urlencode($genreId) ?>" tabindex="-1">Trước</a>
                </li>

                <!-- Các trang -->
                <?php
                // Hiển thị tối đa 5 trang gần nhất
                $start = max(1, $pagination['current_page'] - 2);
                $end = min($pagination['total_pages'], $pagination['current_page'] + 2);
                for ($i = $start; $i <= $end; $i++): ?>
                    <li class="page-item <?= $i == $pagination['current_page'] ? 'active' : '' ?>">
                        <a class="page-link" href="<?= BASE_URL_ADMIN ?>&action=manage-movies&page=<?= $i ?>&search_movies_admin=<?= urlencode($search) ?>&form_filter_movies_admin=<?= urlencode($genreId) ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>

                <!-- Nút trang sau -->
                <li class="page-item <?= !$pagination['has_next'] ? 'disabled' : '' ?>">
                    <a class="page-link" href="<?= BASE_URL_ADMIN ?>&action=manage-movies&page=<?= $pagination['next_page'] ?>&search_movies_admin=<?= urlencode($search) ?>&form_filter_movies_admin=<?= urlencode($genreId) ?>">Sau</a>
                </li>

                <!-- Nút trang cuối -->
                <li class="page-item <?= !$pagination['has_next'] ? 'disabled' : '' ?>">
                    <a class="page-link" href="<?= BASE_URL_ADMIN ?>&action=manage-movies&page=<?= $pagination['total_pages'] ?>&search_movies_admin=<?= urlencode($search) ?>&form_filter_movies_admin=<?= urlencode($genreId) ?>">Cuối</a>
                </li>
            </ul>
        </nav>
    <?php endif; ?>
</div>
