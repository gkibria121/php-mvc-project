<?php

require_once __DIR__ . "/../bootstrap/bootstrap.php";

session_start();
dispatch($_SERVER["REQUEST_URI"], $_SERVER["REQUEST_METHOD"]);
