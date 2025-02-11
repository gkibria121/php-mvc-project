<?php

declare(strict_types=1);


const ROUTE_DIR = __DIR__ . "/../routes";
const VIEW_DIR = __DIR__ . "/../views";
const CONTROLLER_DIR = __DIR__ . "/../app/controllers";
const HELPER_DIR = __DIR__ . "/../app/helpers";
const DATABASE_DIR = __DIR__ . "/../database";
require_once  ROUTE_DIR . "/route.php";
require_once  HELPER_DIR . "/helpers.php";
require_once  DATABASE_DIR . "/db.php";
