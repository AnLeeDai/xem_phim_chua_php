<?php

require_once PATH_CONTROLLER_CLIENT . 'HomeController.php';
require_once PATH_CONTROLLER_CLIENT . 'AuthController.php';
require_once PATH_CONTROLLER_CLIENT . 'PurchaseController.php';
require_once PATH_CONTROLLER_CLIENT . 'WatchController.php';
require_once PATH_CONTROLLER_CLIENT . 'DownloadController.php';
require_once PATH_CONTROLLER_CLIENT . 'UserController.php';

$action = $_GET['action'] ?? '/';

match ($action) {
    '/' => (new HomeController)->home(),
    'buy-movie' => (new PurchaseController)->buyMovie(),
    'watch' => (new WatchController)->watch(),
    'download' => (new DownloadController)->download(),
    'purchase-history' => (new UserController)->purchaseHistory(),
    'edit-profile' => (new UserController)->editProfile(),
    'top-up' => (new UserController)->topUp(),
    'sign-in' => (new AuthController)->signIn(),
    'sign-up' => (new AuthController)->signUp(),
    'sign-out' => (new AuthController)->signOut(),
    default => (new HomeController)->home()
};
