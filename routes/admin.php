<?php

require_once PATH_CONTROLLER_ADMIN . 'AdminController.php';
require_once PATH_CONTROLLER_ADMIN . 'AdminAuthController.php';

$action = $_GET['action'] ?? '/';

$adminController = new AdminController();
$adminAuthController = new AdminAuthController();

match ($action) {
    '/' => $adminController->manageTopUpRequests(),
    'sign-in' => $adminAuthController->signIn(),
    'add-genre' => $adminController->addGenre(),
    'add-movie' => $adminController->addMovie(),
    'edit-movie' => $adminController->editMovie(),
    'delete-movie' => $adminController->deleteMovie(),
    'manage-movies' => $adminController->manageMovies(),
};
