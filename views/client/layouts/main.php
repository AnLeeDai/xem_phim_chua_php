<?php
require_once PATH_CONTROLLER_CLIENT . 'GenresController.php';
require_once PATH_CONTROLLER_CLIENT . 'AuthController.php';

$genresController = new GenresController();
$genres = $genresController->getGenres();

$user = null;
if (isset($_SESSION['user_id'])) {
    $authModel = new AuthModal();
    $user = $authModel->find('*', 'user_id = :user_id', ['user_id' => $_SESSION['user_id']]);
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? "Home Page" ?></title>

    <!-- style -->
    <link rel="stylesheet" href="<?= PATH_ASSETS_STYLES . 'global.css' ?>">
    <link rel="stylesheet" href="<?= PATH_ASSETS_STYLES . 'theme.css' ?>">
    <link rel="stylesheet" href="<?= PATH_ASSETS_STYLES . 'header.css' ?>">
    <link rel="stylesheet" href="<?= PATH_ASSETS_STYLES . 'home.css' ?>">
    <link rel="stylesheet" href="<?= PATH_ASSETS_STYLES . 'purchaseHistory.css' ?>">
    <link rel="stylesheet" href="<?= PATH_ASSETS_STYLES . 'editProfile.css' ?>">
    <link rel="stylesheet" href="<?= PATH_ASSETS_STYLES . 'top-up.css' ?>">
    <link rel="stylesheet" href="<?= PATH_ASSETS_STYLES . 'button.css' ?>">
    <link rel="stylesheet" href="<?= PATH_ASSETS_STYLES . 'input.css' ?>">
    <link rel="stylesheet" href="<?= PATH_ASSETS_STYLES . 'select.css' ?>">

    <!-- script -->
    <script src="<?= PATH_ASSETS_JS . 'header.js' ?>"></script>
    <script src="<?= PATH_ASSETS_JS . 'togglePaymentInfo.js' ?>"></script>
</head>

<body>
    <header>
        <!-- Logo -->
        <a href="<?= BASE_URL_CLIENT ?>" class="logo">XemPhimChua</a>

        <!-- Search Bar -->
        <form action="<?= BASE_URL_CLIENT ?>" method="get" class="search-bar">
            <input type="text" name="search" class="input input-medium" placeholder="Tìm kiếm phim..." value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
        </form>

        <!-- Dropdown Genres -->
        <div class="dropdown">
            <button id="dropdown-button" class="btn btn-primary btn-medium">Thể Loại</button>
            <ul id="dropdown-menu">
                <li><a href="<?= BASE_URL_CLIENT ?>">Tất cả</a></li>
                <?php foreach ($genres as $genre) : ?>
                    <li><a href="<?= BASE_URL_CLIENT . '?genre=' . $genre['genre_id'] ?>"><?= htmlspecialchars($genre['genre_name']) ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- User Info -->
        <div class="user-info">
            <?php if ($user) : ?>
                <div class="user-dropdown">
                    <div class="user-avatar">
                        <?= strtoupper($user['username'][0]) ?>
                    </div>

                    <ul class="user-dropdown-menu">
                        <li><span style="padding: 0; padding-bottom: 10px;"><?= htmlspecialchars($user['username']) ?> (<?= htmlspecialchars($user['coin_balance']) ?> coin)</span></li>
                        <li><a href="<?= BASE_URL_CLIENT . '?action=edit-profile' ?>">Chỉnh sửa thông tin</a></li>
                        <li><a href="<?= BASE_URL_CLIENT . '?action=purchase-history' ?>">Lịch sử phim đã mua</a></li>
                        <li><a href="<?= BASE_URL_CLIENT . '?action=top-up' ?>">Nạp tiền</a></li>
                        <li><a href="<?= BASE_URL_CLIENT . '?action=sign-out' ?>">Đăng xuất</a></li>
                    </ul>
                </div>
            <?php else : ?>
                <a class="btn btn-secondary btn-medium" href="<?= BASE_URL_CLIENT . '?action=sign-in' ?>">Đăng nhập</a>
            <?php endif; ?>
        </div>
    </header>

    <div>
        <?php
        if (!empty($viewName)) {
            require_once PATH_VIEW_CLIENT . $viewName . '.php';
        }
        ?>
    </div>
</body>

</html>