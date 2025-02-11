<?php

declare(strict_types=1);
const INDEX_URI = '/';
const INDEX_NAME = 'index';
const ALLOWED_METHODS = ['GET', 'POST'];

function normalizeUri(string $uri)
{

    return $uri === INDEX_URI ? INDEX_NAME : $uri;
}



function notFound()
{
    http_response_code(404);
    echo "Not found!";
    die(404);
}

function getFilePath(string $uri, string $method)
{
    $normalizedUri = normalizeUri($uri);
    $normalizedMethod = strtolower($method);
    return CONTROLLER_DIR . "/$normalizedUri" . '_' . "$normalizedMethod" . ".php";
}
function dispatch(string $uri, string $method): void
{


    if (!in_array(strtoupper($method), ALLOWED_METHODS)) {
        notFound();
    }

    $filePath = getFilePath($uri, $method);
    if (!file_exists($filePath)) {
        notFound();
    }

    require_once  $filePath;
}
