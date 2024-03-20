<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-6.9.1/src/Exception.php';
require 'PHPMailer-6.9.1/src/PHPMailer.php';

$mail = new PHPMailer(true);
$mail -> CharSet = 'UTF-8';
$mail -> setLanguage('uk', 'PHPMailer-6.9.1/language/');
$mail -> IsHTML(true);

// Від когового буде надіслано листа
$mail -> setFrom('vp6327conf@gmail.com', 'Vlad');
// Кому буде надіслано листа
$mail -> addAddress('vp6327@gmail.com');
$mail -> Subject = 'Form';

$body = '<h1>Hello post</h1>';
if (trim(!empty($_POST['name']))){
    $body .= '<p><strong>Name:</strong> ' . $_POST['name'] . '</p>';
}
if (trim(!empty($_POST['email']))){
    $body .= '<p><strong>Email:</strong> ' . $_POST['email'] . '</p>';
}
if (trim(!empty($_POST['message']))){
    $body .= '<p><strong>Message:</strong> ' . $_POST['message'] . '</p>';
}
if (trim(!empty($_POST['phone']))){
    $body .= '<p><strong>Phone:</strong> ' . $_POST['phone'] . '</p>';
}

$mail -> Body = $body;

if (!$mail -> send()){
    $message = 'Error';
}else{
    $message = 'Data sent';
}

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);
?>