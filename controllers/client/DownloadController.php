<?php
require_once PATH_MODEL . 'MoviesModal.php';
require_once PATH_MODEL . 'PurchasesModal.php';

class DownloadController
{
    public function download()
    {
        $movieId = $_GET['movie_id'] ?? null;
        $currentUserId = $_SESSION['user_id'] ?? null;

        // Kiểm tra đăng nhập
        if (!$currentUserId) {
            header('Location: ?action=sign-in');
            exit;
        }

        $moviesModal = new MoviesModal();
        $purchasesModal = new PurchasesModal();

        // Lấy thông tin phim
        $movie = $moviesModal->find('*', 'movie_id = :movie_id', ['movie_id' => $movieId]);

        if (!$movie) {
            // Phim không tồn tại
            header('Location: ?action=/&msg=movie_not_found');
            exit;
        }

        // Kiểm tra đã mua chưa
        if (!$purchasesModal->hasPurchased($currentUserId, $movieId)) {
            // Chưa mua
            header('Location: ?action=/&msg=need_to_buy');
            exit;
        }

        // Kiểm tra download_url
        if (empty($movie['download_url'])) {
            header('Location: ?action=/&msg=no_download_available');
            exit;
        }

        // Đường dẫn tuyệt đối tới file trên server
        $filePath = PATH_ASSETS_UPLOAD . $movie['download_url'];

        if (!file_exists($filePath)) {
            header('Location: ?action=/&msg=file_not_found');
            exit;
        }

        // Gửi header tải xuống file
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
        header('Content-Length: ' . filesize($filePath));
        header('Pragma: public');
        flush();

        readfile($filePath);
        exit;
    }
}
