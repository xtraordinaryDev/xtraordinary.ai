<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject = strip_tags(trim($_POST["subject"]));
    $message = trim($_POST["message"]);

    if (empty($name) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($subject) || empty($message)) {
        echo "Please fill out all fields correctly.";
        exit;
    }

    $recipient = "xtraordinaryDev@outlook.com"; // Replace with your email
    $email_subject = "New Contact Form Submission: $subject";
    $email_body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

    $headers = "From: $name <$email>\r\nReply-To: $email\r\n";

    if (mail($recipient, $email_subject, $email_body, $headers)) {
        echo "success";
    } else {
        echo "Error sending message. Please try again.";
    }
} else {
    echo "Invalid request.";
}
?>
