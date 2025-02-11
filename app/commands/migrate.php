<?php

require_once __DIR__ . "/../../bootstrap/bootstrap.php";

$sql_file_path = __DIR__ . '/../../database/schema.sql';


$sqlQuery = file_get_contents($sql_file_path);

$db = connectDB();
$db->exec($sqlQuery);
echo "Successfully migrated!";
