<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? "Home Page" ?></title>
    <link rel="stylesheet" href="<?= PATH_ASSETS_STYLES . 'global.css' ?>">
    <link rel="stylesheet" href="<?= PATH_ASSETS_STYLES . 'theme.css' ?>">
    <link rel="stylesheet" href="<?= PATH_ASSETS_STYLES . 'button.css' ?>">
    <link rel="stylesheet" href="<?= PATH_ASSETS_STYLES . 'input.css' ?>">
</head>

<body>
    <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <div style="background: #fff; padding: 24px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); width: 100%; max-width: 400px;">
            <?php
            if (!empty($viewName)) {
                require_once PATH_VIEW_CLIENT . $viewName . '.php';
            }
            ?>
        </div>

    </div>
</body>

</html>