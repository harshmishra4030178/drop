<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Set email parameters
    $to = "support@qcclabsolutions.com"; 
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // HTML email body
    $email_template = "
        <html>
        <head>
            <style>
                .email-container {
                    max-width: 600px;
                    margin: 20px auto;
                    background: #fff;
                    padding: 20px;
                    border: 1px solid #ddd;
                    border-radius: 8px;
                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                }
                .email-header {
                    font-size: 18px;
                    margin-bottom: 20px;
                    color: #007BFF;
                }
                .email-body table {
                    width: 100%;
                    border-collapse: collapse;
                }
                .email-body table td {
                    padding: 10px;
                    border: 1px solid #ddd;
                }
            </style>
        </head>
        <body>
            <div class='email-container'>
                <div class='email-header'>
                    $name has sent message to you from contact us page.
                </div>
                <br/>
                <div class='email-body'>
                    <table>
                        <tr>
                            <td><strong>Name</strong></td>
                        </tr>
                        <tr>
                            <td>$name</td>
                        </tr>
                        <tr>
                            <td><strong>Email</strong></td>
                        </tr>
                        <tr>
                            <td>$email</td>
                        </tr>
                        <tr>
                            <td><strong>Message</strong></td>
                        </tr>
                        <tr>
                            <td>$message</td>
                        </tr>
                    </table>
                </div>
            </div>
        </body>
        </html>
        ";

    $email_subject = "$subject - Contact us page";

    // Send email
    if (mail($to, $email_subject, $email_template, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send the message. Please try again.";
    }
}
?>
