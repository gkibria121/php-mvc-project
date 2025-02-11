<?php



function serverError(string $message): void
{


    echo $message;
    die(500);
}




function renderView(string $filePath, array $data = [])
{

    extract($data);

    require_once VIEW_DIR . "/includes/_header.php";
    require_once VIEW_DIR . "/" . $filePath . ".php";
    require_once VIEW_DIR . "/includes/_footer.php";
}
