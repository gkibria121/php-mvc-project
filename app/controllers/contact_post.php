<?php



$errors = [];
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

if (!isValidMail($email)) {
    $errors['email'] = "Please provide a valid email!";
}
if (empty($name)) {
    $errors['name'] = "Name is required!";
}
if (empty($message)) {
    $errors['message'] = "Message is required!";
}


if (count($errors)) {

    setFlashMessage('error', $errors);
    redirect("/contact");
}



$db = connectDB();

$inserted = insertMessage($db, $name, $email, $message);
if (!$inserted) {
    serverError("Something went wrong");
}


setFlashMessage('success', ['message' => "Thank you for your message!"]);


redirect('/contact');




function isValidMail(string $email)
{


    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
