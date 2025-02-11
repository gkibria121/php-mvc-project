<?php

$errors = $_SESSION['errors'] ?? [];
$sucess = $_SESSION['sucess'] ?? null;
if ($sucess) {
    unset($_SESSION['sucess']);
}
if ($errors) {
    unset($_SESSION['errors']);
}
renderView('contact', ['errors' => $errors, 'success' =>  $sucess]);
