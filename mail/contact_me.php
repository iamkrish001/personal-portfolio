<?php
// Check for empty fields
if(empty($_POST['name']) ||
   empty($_POST['email']) ||
   empty($_POST['phone']) ||
   empty($_POST['message']) ||
   !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
   echo "No arguments Provided!";
   return false;
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Create the email and send the message
$to = 'bhurtelkrish123@gmail.com'; // Your email address here
$email_subject = "Website Contact Form: $name";
$email_body = "You have received a new message from your website contact form.\n\n" .
              "Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: $email_address\n"; // The sender's email address
$headers .= "Reply-To: $email_address";

// Send the email
$mail_success = mail($to, $email_subject, $email_body, $headers);

// Check if mail sending was successful
if($mail_success) {
    echo "Mail sent successfully!";
} else {
    echo "Failed to send mail!";
}
?>
