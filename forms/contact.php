<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = htmlspecialchars($_POST['name']);
    $email   = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Your email
    $to = "manavvyas0205@gmail.com";  

    // Email subject
    $email_subject = "New Contact Form Submission: $subject";

    // Email body
    $email_body = "You have received a new message from your website contact form.\n\n".
                  "Name: $name\n".
                  "Email: $email\n".
                  "Subject: $subject\n".
                  "Message:\n$message\n";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $email_subject, $email_body, $headers)) {
        // Redirect to Thank You page
        header("Location: ../thankyou.html");
        exit();
    } else {
        echo "Email sending failed. Please try again.";
    }
}
?>