<?php



function exceptionHandler(Throwable $exception)
{
    $message = "Uncaught exception (" . get_class($exception) . "): " .
        $exception->getMessage() . " in file : " . $exception->getFile() . "on line : " . $exception->getLine();

    error_log($message);
    http_response_code(500);
    serverError("An unexpected errro occurred. Please try agian later.");
}


function errorHandler(
    int $errno,
    string $errstr,
    string $errfile,
    int $errline
): bool {
    $message = "Uncaught exception ($errstr) in file: $errfile on line: $errline";

    error_log($message);
    http_response_code(500);
    serverError("An unexpected error occurred. Please try again later.");
    return true;
}
