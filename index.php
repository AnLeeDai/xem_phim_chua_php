<?php

session_start();

require_once 'configs/env.php';
require_once 'configs/helper.php';

$mode = $_GET['mode'] ?? 'client';

if ($mode === 'admin') {
    require_once PATH_ROUTE_ADMIN;
} else {
    require_once PATH_ROUTE_CLIENT;
}
