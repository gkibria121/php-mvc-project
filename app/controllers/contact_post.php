<?php



$errors = [];
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$token = $_POST['_csrf'] ?? '';
[$currentToken] = getCurrentCSRF();
setCSRFToken(null);



if (!isValidMail($email)) {
    $errors['email'] = "Please provide a valid email!";
}
if (empty($name)) {
    $errors['name'] = "Name is required!";
}
if (empty($message)) {
    $errors['message'] = "Message is required!";
}


if (!hash_equals($token, $currentToken)) {
    $errors['others'] = 'Please try agian later';
}

if (count($errors)) {

    setFlashMessage('error', $errors);
    redirect("/contact");
} else {

    setFlashMessage('success', ['message' => "Thank you for your message!"]);
}

$db = connectDB();

$inserted = insertMessage($db, $name, $email, $message);
if (!$inserted) {
    serverError("Something went wrong");
}



redirect('/contact');




function isValidMail(string $email)
{


    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
