<?php

$errors =  getFlashMessage('error');
$sucess = getFlashMessage('success');

renderView('contact', ['errors' => $errors, 'success' =>  $sucess]);
