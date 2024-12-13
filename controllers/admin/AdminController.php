<?php

require_once PATH_MODEL . 'RequestsModal.php';
require_once PATH_MODEL . 'UsersModal.php';
require_once PATH_MODEL . 'GenresModal.php';
require_once PATH_MODEL . 'MoviesModal.php';

class AdminController
{
    public function manageTopUpRequests()
    {
        $viewName = 'manage-top-up';
        $pageTitle = 'Quản lý nạp tiền';

        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 0) {
            header('Location: ' . BASE_URL_ADMIN . '&action=sign-in');
            exit;
        }

        $requestsModal = new RequestsModal();
        $requests = $requestsModal->getAllRequests();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_update_request_status'])) {
            $requestId = $_POST['request_id'];
            $status = $_POST['status'];

            $requestsModal = new RequestsModal();
            $userModal = new UsersModal();

            $pdo = $requestsModal->getPDO();
            $pdo->beginTransaction();

            try {
                $request = $requestsModal->getRequestById($requestId);

                if ($request) {
                    $requestsModal->updateRequestStatus($requestId, $status);

                    if ($status === 'approved') {
                        if (!$userModal->incrementUserCoins($request['user_id'], $request['amount'])) {
                            throw new Exception("Failed to increment coins for user_id: {$request['user_id']}");
                        }
                    }
                }

                $pdo->commit();

                header('Location: ' . BASE_URL_ADMIN);
                exit;
            } catch (Exception $e) {
                $pdo->rollBack();
                error_log("Error in updateRequestStatus: " . $e->getMessage());
                die("An error occurred while processing the request.");
            }
        }

        require_once PATH_VIEW_ADMIN . 'main.php';
    }

    public function addGenre()
    {
        $message = null;

        $viewName = 'add-genre';
        $pageTitle = 'Thêm Thể Loại';

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_add_genre_name'])) {
            $genreName = trim($_POST['genre_name']);

            if (!empty($genreName)) {
                $genresModal = new GenresModal();

                if ($genresModal->insertGenre($genreName)) {
                    $message = [
                        'type' => 'alert-success',
                        'text' => 'Thêm thể loại thành công!'
                    ];
                    header('location' . BASE_URL_ADMIN . '&action=add-genre');
                    exit;
                } else {
                    $message = [
                        'type' => 'alert-danger',
                        'text' => 'Lỗi khi thêm thể loại. Vui lòng thử lại!'
                    ];
                }
            } else {
                $message = [
                    'type' => 'alert-danger',
                    'text' => 'Tên thể loại không được để trống!'
                ];
            }
        }

        require_once PATH_VIEW_ADMIN . 'main.php';
    }

    public function addMovie()
    {
        $message = null;
        $genresModal = new GenresModal();
        $moviesModal = new MoviesModal();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = trim($_POST['title']);
            $genreId = $_POST['genre_id'];
            $releaseDate = $_POST['release_date'];
            $price = $_POST['price'];
            $description = trim($_POST['description']);
            $banner = $_FILES['banner'];
            $videoUrl = $_FILES['video_url'];
            $downloadUrl = $_FILES['download_url'];

            try {
                // Validate required fields
                if (empty($title) || empty($genreId)) {
                    throw new Exception('Tên phim và thể loại không được để trống!');
                }

                // Handle banner upload (required)
                if (!empty($banner['tmp_name'])) {
                    $bannerPath = upload_file('imgs', $banner);
                } else {
                    throw new Exception('Hình ảnh (Banner) là bắt buộc!');
                }

                // Handle video_url upload (optional)
                $videoPath = null;
                if (!empty($videoUrl['tmp_name'])) {
                    $videoPath = upload_file('vids', $videoUrl);
                }

                // Handle download_url upload (optional)
                $downloadPath = null;
                if (!empty($downloadUrl['tmp_name'])) {
                    $downloadPath = upload_file('vids', $downloadUrl);
                }

                // Prepare data for insertion
                $movieData = [
                    'title' => $title,
                    'genre_id' => $genreId,
                    'release_date' => $releaseDate,
                    'price' => $price,
                    'description' => $description,
                    'banner' => $bannerPath,
                    'video_url' => $videoPath ?: null, // Ensure null if no file uploaded
                    'download_url' => $downloadPath ?: null, // Ensure null if no file uploaded
                ];

                // Insert movie data into the database
                $moviesModal->insertMovie($movieData);

                // Success message
                $message = [
                    'type' => 'alert-success',
                    'text' => 'Thêm phim thành công!'
                ];

                // Redirect to manage movies page
                header('Location: ' . BASE_URL_ADMIN . '&action=manage-movies');
                exit;
            } catch (Exception $e) {
                // Handle any exceptions
                $message = [
                    'type' => 'alert-danger',
                    'text' => $e->getMessage()
                ];
            }
        }

        // Fetch genres for the form dropdown
        $genres = $genresModal->getAllGenres();
        $viewName = 'add-movie';
        $pageTitle = 'Thêm Mới Phim';
        require_once PATH_VIEW_ADMIN . 'main.php';
    }

    public function editMovie()
    {
        $moviesModal = new MoviesModal();
        $genresModal = new GenresModal();
        $message = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $movieId = $_POST['movie_id'];
            $title = trim($_POST['title']);
            $genreId = $_POST['genre_id'];
            $releaseDate = $_POST['release_date'];
            $price = $_POST['price'];
            $description = trim($_POST['description']);
            $banner = $_FILES['banner'];
            $videoUrl = $_FILES['video_url'];
            $downloadUrl = $_FILES['download_url'];

            try {
                if (empty($title) || empty($genreId)) {
                    throw new Exception('Tên phim và thể loại không được để trống!');
                }

                $currentMovie = $moviesModal->getMovieById($movieId);
                if (!$currentMovie) {
                    throw new Exception('Phim không tồn tại!');
                }

                $bannerPath = $currentMovie['banner'];
                if (!empty($banner['tmp_name'])) {
                    $bannerPath = upload_file('imgs', $banner);
                }

                $videoPath = $currentMovie['video_url'];
                if (!empty($videoUrl['tmp_name'])) {
                    $videoPath = upload_file('vids', $videoUrl);
                }

                $downloadPath = $currentMovie['download_url'];
                if (!empty($downloadUrl['tmp_name'])) {
                    $downloadPath = upload_file('downloads', $downloadUrl);
                }

                $updateData = [
                    'title' => $title,
                    'genre_id' => $genreId,
                    'release_date' => $releaseDate,
                    'price' => $price,
                    'description' => $description,
                    'banner' => $bannerPath,
                    'video_url' => $videoPath,
                    'download_url' => $downloadPath,
                ];

                $moviesModal->updateMovie($movieId, $updateData);

                $message = [
                    'type' => 'alert-success',
                    'text' => 'Cập nhật phim thành công!'
                ];

                header('Location: ' . BASE_URL_ADMIN . '&action=manage-movies');
                exit;
            } catch (Exception $e) {
                $message = [
                    'type' => 'alert-danger',
                    'text' => $e->getMessage()
                ];
            }
        }

        $movie = $moviesModal->getMovieById($_GET['movie_id']);
        $genres = $genresModal->getAllGenres();

        $viewName = 'edit-movie';
        $pageTitle = 'Sửa Phim';
        require_once PATH_VIEW_ADMIN . 'main.php';
    }



    public function manageMovies()
    {
        $moviesModal = new MoviesModal();
        $genresModal = new GenresModal();

        // Lấy giá trị tìm kiếm và thể loại từ GET
        $search = isset($_GET['search_movies_admin']) ? trim($_GET['search_movies_admin']) : '';
        $genreId = isset($_GET['form_filter_movies_admin']) ? trim($_GET['form_filter_movies_admin']) : '';

        // Xác định số phim trên mỗi trang
        $perPage = 13;

        // Lấy số trang hiện tại từ GET, mặc định là 1
        $currentPage = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($currentPage < 1) {
            $currentPage = 1;
        }

        // Tính offset
        $offset = ($currentPage - 1) * $perPage;

        // Lấy tổng số phim thỏa mãn bộ lọc
        $totalMovies = $moviesModal->countMoviesWithFilters($search, $genreId);

        // Tính tổng số trang
        $totalPages = ceil($totalMovies / $perPage);

        // Giới hạn số trang hiện tại không vượt quá tổng số trang
        if ($currentPage > $totalPages && $totalPages > 0) {
            $currentPage = $totalPages;
            $offset = ($currentPage - 1) * $perPage;
        }

        // Fetch movies dựa trên bộ lọc và phân trang
        $movies = $moviesModal->getMoviesWithFilters($search, $genreId, $offset, $perPage);

        // Lấy tất cả thể loại cho dropdown lọc
        $genres = $genresModal->getAllGenres();

        // Chuẩn bị dữ liệu phân trang
        $pagination = [
            'total' => $totalMovies,
            'per_page' => $perPage,
            'current_page' => $currentPage,
            'total_pages' => $totalPages,
            'has_previous' => $currentPage > 1,
            'has_next' => $currentPage < $totalPages,
            'previous_page' => $currentPage - 1,
            'next_page' => $currentPage + 1,
        ];

        $viewName = 'manage-movies';
        $pageTitle = 'Quản Lý Phim';

        // Truyền dữ liệu phân trang và các biến khác tới view
        require_once PATH_VIEW_ADMIN . 'main.php';
    }

    public function deleteMovie()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $movieId = $_POST['movie_id'];

            $moviesModal = new MoviesModal();

            try {
                if ($moviesModal->deleteMovie($movieId)) {
                    header('Location: ' . BASE_URL_ADMIN . '&action=manage-movies');
                    exit;
                } else {
                    throw new Exception('Không thể xóa phim này.');
                }
            } catch (Exception $e) {
                error_log("Error deleting movie: " . $e->getMessage());
                die('Lỗi khi xóa phim.');
            }
        }
    }
}
