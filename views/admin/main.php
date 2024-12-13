<?php
function isActive($expectedMode, $expectedAction = null, $queryParams = [])
{
    $mode = $queryParams['mode'] ?? '';
    $action = $queryParams['action'] ?? null;

    if ($expectedAction === null) {
        return ($mode === $expectedMode && empty($action)) ? 'active' : '';
    }

    return ($mode === $expectedMode && $action === $expectedAction) ? 'active' : '';
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? "Admin Dashboard" ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>

<body>

    <ul class="nav nav-pills nav-justified mx-3 mt-2">
        <!-- Nạp tiền -->
        <li class="nav-item">
            <a class="nav-link <?= isActive('admin', null, $_GET) ?>" href="<?= BASE_URL_ADMIN ?>">Nạp tiền</a>
        </li>

        <!-- Thêm Thể Loại -->
        <li class="nav-item">
            <a class="nav-link <?= isActive('admin', 'add-genre', $_GET) ?>" href="<?= BASE_URL_ADMIN . "&action=add-genre" ?>">Thêm Thể Loại</a>
        </li>

        <!-- Thêm Mới Phim -->
        <li class="nav-item">
            <a class="nav-link <?= isActive('admin', 'manage-movies', $_GET) ?>" href="<?= BASE_URL_ADMIN . "&action=manage-movies" ?>">QL phim</a>
        </li>
    </ul>

    <div class="container-xxl mt-5">
        <?php
        if (!empty($viewName)) {
            require_once PATH_VIEW_ADMIN . $viewName . '.php';
        }
        ?>
    </div>
</body>

</html>