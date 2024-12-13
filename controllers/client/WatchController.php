<?php
require_once PATH_MODEL . 'MoviesModal.php';
require_once PATH_MODEL . 'PurchasesModal.php';

class WatchController
{
    public function watch()
    {
        // Lấy movie_id từ URL
        $movieId = $_GET['movie_id'] ?? null;

        // Kiểm tra người dùng đã đăng nhập
        $currentUserId = $_SESSION['user_id'] ?? null;
        if (!$currentUserId) {
            header('Location: ?action=sign-in');
            exit;
        }

        // Khởi tạo model
        $moviesModal = new MoviesModal();
        $purchasesModal = new PurchasesModal();

        // Tìm phim
        $movie = $moviesModal->find('*', 'movie_id = :movie_id', ['movie_id' => $movieId]);

        if (!$movie) {
            // Phim không tồn tại
            header('Location: ?action=/&msg=movie_not_found');
            exit;
        }

        // Kiểm tra xem user đã mua phim chưa
        if (!$purchasesModal->hasPurchased($currentUserId, $movieId)) {
            // Chưa mua phim, không được xem
            header('Location: ?action=/&msg=need_to_buy');
            exit;
        }

        // Nếu đã mua, hiển thị trang xem phim
        // Giả sử đã có cột video_url trong DB movies, chứa đường dẫn file video
        // Nếu chưa có, bạn phải thêm cột này vào DB và cập nhật giá trị cho từng phim
        $pageTitle = 'Xem Phim: ' . htmlspecialchars($movie['title']);
        $viewName = 'watch/watch';

        require_once PATH_VIEW_CLIENT . 'layouts/main.php';
    }
}
