<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require ('vendor/autoload.php');
require ('functions.php');
require ( "fpdf/fpdf.php" );
require ('fpdfClass.php');

function SendIt($pdf, $customer) {
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
//*****Username to use for SMTP authentication - use full email address for gmail*****
    $mail->Username = "nerdlifedesigns@gmail.com";
//*****Password to use for SMTP authentication*****
    $mail->Password = "Romeoray02";
//*****Set who the message is to be sent from*****
    $mail->setFrom('nerdlifedesigns@gmail.com', 'Heartland Seamless Gutters LLC');
//*****Set an alternative reply-to address*****
    $mail->addReplyTo('heartlandseamless@gmail.com', 'Heartland Seamless');
//*****Set who the message is to be sent to*****
//        $mail->addAddress('l.wetzel900@gmail.com', 'Loren Wetzel');
    $mail->addAddress($customer['email'], $customer['name']);

//    $mail->addCC('heartlandseamless@gmail.com');
    $mail->addCC('lwetzel90@gmail.com');
//*****Set the subject line*****
    $mail->Subject = 'Heartland Seamless Gutters Bid';
//*****Read an HTML message body from an external file, convert referenced images to embedded,*****
//*****convert HTML into a basic plain-text alternative body*****
// *****       $mail->msgHTML(file_get_contents('contents.html'), __DIR__);*****
    $mail->Body = $customer['name'] . "<br><br>" . 'Here is your bid';

//*****Replace the plain text body with one created manually*****
    $mail->AltBody = $customer['name'] . '\n\r' . 'Here is your bid';

//*****Attach an image file*****
    $doc = $pdf->Output('S');
    $mail->AddStringAttachment($doc, 'bid.pdf', 'base64', 'application/pdf');
//  *****      $mail->addAttachment('images/phpmailer_mini.png');*****
//send the message, check for errors
    if (!$mail->send()) {
        phpAlert("Mailer Error: " . $mail->ErrorInfo);
//            echo "Mailer Error: " . $mail->ErrorInfo;
        return FALSE;
    } else {
        phpAlert("Message sent!");
//            echo "Message sent!";
        return TRUE;
        //*****Section 2: IMAP*****
        //*****Uncomment these to save your message in the 'Sent Mail' folder.*****
//            if (save_mail($mail)) {
//                echo "Message saved!";
//            }
    }
//Section 2: IMAP
//IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
//Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
//You can use imap_getmailboxes($imapStream, '/imap/ssl', '*' ) to get a list of available folders or labels, this can
//be useful if you are trying to get this working on a non-Gmail IMAP server.
//        function save_mail($mail) {
//            //You can change 'Sent Mail' to any other folder or tag
//            $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";
//            //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
//            $imapStream = imap_open($path, $mail->Username, $mail->Password);
//            $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
//            imap_close($imapStream);
//            return $result;
//        }//end of save_mail
}

//end of sendit()

function phpAlert($msg) {
//    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
//    echo '<div class="alert alert-dark" role="alert">"' . $msg . '"</div>';
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">'
    . '<strong>' . $msg . '</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></div>';
}

