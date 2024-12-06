<?php 
if(isset($_POST['submit'])){
    $to = "arunchennangattussery@gmail.com";
    $from = $_POST['email']; 
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $location = $_POST['location'];
    $subject = "HouseHillbrow Enquiry";
    $message = $fullname . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message " . $fullname . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$phone,$email,$message,$headers);
    // mail($from,$subject2,$message2,$headers2); 
    echo "Mail Sent. Thank you " . $fullname . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }
?>
