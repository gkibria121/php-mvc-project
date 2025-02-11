<?php



function serverError(string $message): void
{


    echo $message;
    die(500);
}


function redirect(string $location)
{
    header("Location: $location");
}

function renderView(string $filePath, array $data = [])
{

    extract($data);

    require_once VIEW_DIR . "/includes/_header.php";
    require_once VIEW_DIR . "/" . $filePath . ".php";
    require_once VIEW_DIR . "/includes/_footer.php";
}


function getFlashMessage(string $type)
{

    $values = $_SESSION['flash'][$type] ?? [];
    unset($_SESSION['flash'][$type]);
    return $values;
}

function setFlashMessage(string $type, array $data)
{

    $_SESSION['flash'][$type]  = $data;
}
