<?php


function connectDB(): PDO
{
    $databasePath = DATABASE_DIR . '/db.db';

    $dsn = "sqlite:$databasePath";

    $pdo = new PDO($dsn);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
}


function insertMessage(PDO $dbconnection, string $name, string $email, string $message)
{

    $stmt = $dbconnection->prepare("INSERT INTO messages(name, email, message) VALUES (:name, :email, :message)");

    $stmt->execute([
        ":name" => $name,
        ":email" => $email,
        ":message" => $message
    ]);
    return true;
}


function getMessages(PDO $dbconnection): array
{

    $sql = "SELECT * FROM messages";

    $stmt = $dbconnection->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
