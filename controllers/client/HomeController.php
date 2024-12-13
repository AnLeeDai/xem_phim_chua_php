<?php

require_once PATH_MODEL . 'MoviesModal.php';
require_once PATH_MODEL . 'PurchasesModal.php';

class HomeController
{
    public function home()
    {
        $moviesModal = new MoviesModal();
        $purchasesModal = new PurchasesModal();

        $currentPage = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 21;

        $currentUserId = $_SESSION['user_id'] ?? null;

        $search = $_GET['search'] ?? '';
        $genreId = $_GET['genre'] ?? '';

        $offset = ($currentPage - 1) * $perPage;

        // Lấy phim qua modal
        $movies = $moviesModal->getMoviesWithFilters($search, $genreId, $offset, $perPage);

        // Đếm tổng số phim
        $totalMovies = $moviesModal->countMoviesWithFilters($search, $genreId);
        $totalPages = ceil($totalMovies / $perPage);

        foreach ($movies as &$movie) {
            $movie['hasPurchased'] = $currentUserId ? $purchasesModal->hasPurchased($currentUserId, $movie['movie_id']) : false;
        }

        $viewName = 'home/home';
        $pageTitle = 'Trang chủ';

        require_once PATH_VIEW_CLIENT . 'layouts/main.php';
    }
}
