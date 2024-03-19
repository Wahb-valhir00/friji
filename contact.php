<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Recipient email address
    $to = 'wahbounallah00@gmail.com';

    // Email headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        // Email sent successfully
        echo json_encode(array('status' => 'success', 'message' => 'Your message has been sent.'));
    } else {
        // Error sending email
        echo json_encode(array('status' => 'error', 'message' => 'Unable to send message. Please try again later.'));
    }
} else {
    // Not a POST request
    echo json_encode(array('status' => 'error', 'message' => 'Invalid request.'));
}
?>
