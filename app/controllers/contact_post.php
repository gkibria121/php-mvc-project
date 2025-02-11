<?php


if (isset($_SESSION['errors'])) {
    unset($_SESSION['errors']);
}

$errors = [];

if (!validate($_POST, $errors)) {
    $_SESSION['errors'] = $errors;
    header("Location: contact");
}


$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$db = connectDB();


$db = connectDB();

$stmt = $db->prepare("INSERT INTO messages(name, email, message) VALUES (:name, :email, :message)");

$stmt->execute([
    ":name" => $name,
    ":email" => $email,
    ":message" => $message
]);

$_SESSION['sucess'] = "Thank you for your message!";

redirect('contact');


function validate(array $data, array &$errors = []): bool
{

    $email = $data['email'] ?? '';

    if (!isValidMail($email)) {
        $errors['email'] = "Please provide a valid email!";
    }
    if (empty($data['name'])) {
        $errors['name'] = "Name is required!";
    }
    if (empty($data['message'])) {
        $errors['message'] = "Message is required!";
    }

    return !count($errors);
}

function isValidMail(string $email)
{


    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
