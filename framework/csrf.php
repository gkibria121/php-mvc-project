<?php

const CSRF_TOKEN_LENGTH = 32;
const CSRF_TOKEN_DURATION = 60 * 30;

function generateCSRF()
{
    $token = random_bytes(CSRF_TOKEN_LENGTH);

    $tokenStr = bin2hex($token);
    $creation_date  = setCSRFToken($tokenStr);

    return [$tokenStr, $creation_date];
}


function getCurrentCSRF()
{

    $token = $_SESSION['csrf_token'] ?? null;
    $time = $_SESSION['csrf_token_time'] ?? null;


    if (empty($token) || empty($time) || isTokenExpired($time)) {
        [$token, $time] = generateCSRF();
    }

    return [$token, $time];
}

function setCSRFToken(?string $token)
{
    if (empty($token)) {
        unset($_SESSION['csrf_token']);
        unset($_SESSION['csrf_token_time']);
        return;
    }
    $_SESSION['csrf_token'] = $token;
    $_SESSION['csrf_token_time'] = time();
    return $_SESSION['csrf_token_time'];
}


function isTokenExpired(string $time): bool
{


    return (time() - $time) > CSRF_TOKEN_DURATION;
}
