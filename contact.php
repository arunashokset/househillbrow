<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Receiver's email address
    $email_to = "househillbrow@gmail.com";
    $email_subject = "HILLBROW - New Enquiry";

    // Validation: Check required fields
    if (
        empty($_POST['name']) ||
        empty($_POST['email']) ||
        empty($_POST['phone']) ||
        empty($_POST['location']) ||
        empty($_POST['message'])
    ) {
        die('Error: All fields are required.');
    }

    // Assign POST values
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email_from = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    $location = filter_var($_POST['location'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    // Validate email
    if (!filter_var($email_from, FILTER_VALIDATE_EMAIL)) {
        die('Error: Invalid email address.');
    }

    // Prepare the email content
    $email_message = "New enquiry details:\n\n";
    $email_message .= "Name: " . $name . "\n";
    $email_message .= "Email: " . $email_from . "\n";
    $email_message .= "Phone: " . $phone . "\n";
    $email_message .= "Location: " . $location . "\n";
    $email_message .= "Message: " . $message . "\n";

    // Email headers
    $headers = "From: " . $email_from . "\r\n" .
               "Reply-To: " . $email_from . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Send the email
    if (@mail($email_to, $email_subject, $email_message, $headers)) {
        // Redirect to a thank-you page upon success
        header('Location: thank-you.html');
        exit;
    } else {
        echo "<p style='color: red;'>Oops, something went wrong. Please try again later.</p>";
    }
} else {
    die('Error: Invalid request method.');
}
?>
