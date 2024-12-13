<?php

// base config
// const BASE_URL = 'http://localhost/app_name/';
// const PATH_ROOT = __DIR__ . '/../';

// admin config url
const BASE_URL_ADMIN = 'http://localhost/xem_phim_chua/?mode=admin';

// client config url
const BASE_URL_CLIENT = 'http://localhost/xem_phim_chua/';

// view path config
const PATH_VIEW_ADMIN = 'views/admin/';
const PATH_VIEW_CLIENT = 'views/client/';

// assets path config
const PATH_ASSETS_ADMIN = 'assets/admin/';
const PATH_ASSETS_CLIENT = 'assets/client/';
const PATH_ASSETS_UPLOAD = 'assets/uploads/';
const PATH_ASSETS_STYLES = 'assets/styles/';
const PATH_ASSETS_UI = 'assets/ui/';
const PATH_ASSETS_JS = 'assets/js/';

// controller path config
const PATH_CONTROLLER_ADMIN = 'controllers/admin/';
const PATH_CONTROLLER_CLIENT = 'controllers/client/';

// model path config
const PATH_MODEL = 'modals/';

// route admin config
const PATH_ROUTE_ADMIN = 'routes/admin.php';

// route client config
const PATH_ROUTE_CLIENT = 'routes/client.php';

// database config
const DB_HOST = 'localhost';
const DB_PORT = '3306';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'xem_phim_chua_schema';
const DB_OPTIONS = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];
