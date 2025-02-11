<?php


function connectDB(): PDO
{
    $databasePath = DATABASE_DIR . '/db.db';

    $dsn = "sqlite:$databasePath";

    $pdo = new PDO($dsn);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
}
