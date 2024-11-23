<?php

if (isset($_POST['email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "househillbrow@gmail.com";
    $email_subject = "HILLBROW - New Enquiry";

    function died($error) {
        // Error message display
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below:<br /><br />";
        echo $error . "<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }

    // Validation: Expected data exists
    if (
        !isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['phone']) ||
        !isset($_POST['location']) ||
        !isset($_POST['message'])
    ) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');
    }

    $name = $_POST['name']; // Required
    $email_from = $_POST['email']; // Required
    $phone = $_POST['phone']; // Required
    $location = $_POST['location']; // Required
    $message = $_POST['message']; // Required

    $error_message = "";

    // Validate email format
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
    if (!preg_match($email_exp, $email_from)) {
        $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
    }

    // Validate name
    $string_exp = "/^[A-Za-z .'-]+$/";
    if (!preg_match($string_exp, $name)) {
        $error_message .= 'The Name you entered does not appear to be valid.<br />';
    }

    // Validate message length
    if (strlen($message) < 2) {
        $error_message .= 'The Message you entered does not appear to be valid.<br />';
    }

    // Stop execution if errors exist
    if (strlen($error_message) > 0) {
        died($error_message);
    }

    // Clean input strings
    function clean_string($string) {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    // Prepare email content
    $email_message = "Form details below.\n\n";
    $email_message .= "Name: " . clean_string($name) . "\n";
    $email_message .= "Email: " . clean_string($email_from) . "\n";
    $email_message .= "Phone: " . clean_string($phone) . "\n";
    $email_message .= "Location: " . clean_string($location) . "\n";
    $email_message .= "Message: " . clean_string($message) . "\n";

    // Email headers
    $headers = 'From: ' . $email_from . "\r\n" .
               'Reply-To: ' . $email_from . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    // Send email
    if (@mail($email_to, $email_subject, $email_message, $headers)) {
        header('Location: thank-you.html');
    } else {
        echo "<p style='color: red;'>Oops, something went wrong. Please try again later.</p>";
    }
}
?>
