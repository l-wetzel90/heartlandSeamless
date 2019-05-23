<?php

//session set to one day
session_set_cookie_params(600, '/');
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require ('vendor/autoload.php');

require ( "fpdf/fpdf.php" );
require ('fpdfClass.php');
//require('wordwrap/wordwrap.php');

$action = filter_input(INPUT_POST, 'action');

if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'home';
    }
}
$parts = "Gutter,Downspout,Elbows A,Elbows B,Inside Miters,Outside Miters,End Caps L,End Caps R,Inside Bay Miter,Outside Bay Miter,Outlets,Hinge,Drain Tile Adaptor,Fascia,Soffit,Other";
$gParts = explode(",", $parts);
$gPForm = array();
foreach ($gParts as $g) {
    $gPForm[] = lcfirst(str_replace(' ', '', $g));
}
$gCount = count($gParts);
$gParts2 = array();

switch ($action) {

    case'home':
        if (!isset($other)) {
            $other = "";
        }
        if (!isset($cName)) {
            $cName = "";
        }
        if (!isset($company)) {
            $company = "";
        }
        if (!isset($address)) {
            $address = "";
        }
        if (!isset($phone)) {
            $phone = "";
        }
        if (!isset($email)) {
            $email = "";
        }
        if (!isset($gutter)) {
            $gutter = "";
        }
        if (!isset($downspout)) {
            $downspout = "";
        }
        if (!isset($elbowsA)) {
            $elbowsA = "";
        }
        if (!isset($elbowsB)) {
            $elbowsB = "";
        }
        if (!isset($insideMiters)) {
            $insideMiters = "";
        }
        if (!isset($outsideMiters)) {
            $outsideMiters = "";
        }
        if (!isset($endCapsL)) {
            $endCapsL = "";
        }
        if (!isset($endCapsR)) {
            $endCapsR = "";
        }
        if (!isset($insideBayMiter)) {
            $insideBayMiter = "";
        }
        if (!isset($outsideBayMiter)) {
            $outsideBayMiter = "";
        }
        if (!isset($outlets)) {
            $outlets = "";
        }
        if (!isset($hinge)) {
            $hinge = "";
        }
        if (!isset($drainTileAdaptor)) {
            $drainTileAdaptor = "";
        }
        if (!isset($fascia)) {
            $fascia = "";
        }
        if (!isset($soffit)) {
            $soffit = "";
        }
        if (!isset($total)) {
            $total = "";
        }
        include ('home.php');
        break;

    case'results':
        $other = filter_input(INPUT_POST, 'other', FILTER_VALIDATE_INT);
        $gutter = filter_input(INPUT_POST, 'gutter', FILTER_VALIDATE_INT);
        $gutter2 = filter_input(INPUT_POST, 'gutter2', FILTER_DEFAULT);
        $downspout = filter_input(INPUT_POST, 'downspout', FILTER_VALIDATE_INT);
        $elbowsA = filter_input(INPUT_POST, 'elbowsA', FILTER_VALIDATE_INT);
        $elbowsB = filter_input(INPUT_POST, 'elbowsB', FILTER_VALIDATE_INT);
        $insideMiters = filter_input(INPUT_POST, 'insideMiters', FILTER_VALIDATE_INT);
        $outsideMiters = filter_input(INPUT_POST, 'outsideMiters', FILTER_VALIDATE_INT);
        $endCapsL = filter_input(INPUT_POST, 'endCapsL', FILTER_VALIDATE_INT);
        $endCapsR = filter_input(INPUT_POST, 'endCapsR', FILTER_VALIDATE_INT);
        $insideBayMiter = filter_input(INPUT_POST, 'insideBayMiter', FILTER_VALIDATE_INT);
        $outsideBayMiter = filter_input(INPUT_POST, 'outsideBayMiter', FILTER_VALIDATE_INT);
        $outlets = filter_input(INPUT_POST, 'outlets', FILTER_VALIDATE_INT);
        $hinge = filter_input(INPUT_POST, 'hinge', FILTER_VALIDATE_INT);
        $drainTileAdaptor = filter_input(INPUT_POST, 'drainTileAdaptor', FILTER_VALIDATE_INT);
        $fascia = filter_input(INPUT_POST, 'fascia', FILTER_VALIDATE_INT);
        $soffit = filter_input(INPUT_POST, 'soffit', FILTER_VALIDATE_INT);

        $cName = filter_input(INPUT_POST, 'cName');
        $company = filter_input(INPUT_POST, 'company');
        $address = filter_input(INPUT_POST, 'address');
        $email = filter_input(INPUT_POST, 'email');
        $phone = filter_input(INPUT_POST, 'phone');

        $customer = array("name" => $cName, "company" => $company, "address" => $address, "email" => $email, "phone" => $phone);
        $_SESSION['customer'] = $customer;

        $_SESSION['gParts'] = $gParts;

        if ($other === FALSE) {
            $other = 0;
        }
        if ($gutter === FALSE) {
            $gutter = 0;
        } else {
            $gutter = $gutter * $gutter2;
        }

        if ($downspout === FALSE) {
            $downspout = 0;
        } else {
            $downspout = $downspout * filter_input(INPUT_POST, 'downspout2', FILTER_DEFAULT);
        }

        if ($elbowsA === FALSE) {
            $elbowsA = 0;
        } else {
            $elbowsA = $elbowsA * filter_input(INPUT_POST, 'elbowsA2', FILTER_DEFAULT);
        }

        if ($elbowsB === FALSE) {
            $elbowsB = 0;
        } else {
            $elbowsB = $elbowsB * filter_input(INPUT_POST, 'elbowsB2', FILTER_DEFAULT);
        }

        if ($insideMiters === FALSE) {
            $insideMiters = 0;
        } else {
            $insideMiters = $insideMiters * filter_input(INPUT_POST, 'insideMiters2', FILTER_DEFAULT);
        }

        if ($outsideMiters === FALSE) {
            $outsideMiters = 0;
        } else {
            $outsideMiters = $outsideMiters * filter_input(INPUT_POST, 'outsideMiters2', FILTER_DEFAULT);
        }

        if ($endCapsL === FALSE) {
            $endCapsL = 0;
        } else {
            $endCapsL = $endCapsL * filter_input(INPUT_POST, 'endCapsL2', FILTER_DEFAULT);
        }

        if ($endCapsR === FALSE) {
            $endCapsR = 0;
        } else {
            $endCapsR = $endCapsR * filter_input(INPUT_POST, 'endCapsR2', FILTER_DEFAULT);
        }

        if ($insideBayMiter === FALSE) {
            $insideBayMiter = 0;
        } else {
            $insideBayMiter = $insideBayMiter * filter_input(INPUT_POST, 'insideBayMiter2', FILTER_DEFAULT);
        }

        if ($outsideBayMiter === FALSE) {
            $outsideBayMiter = 0;
        } else {
            $outsideBayMiter = $outsideBayMiter * filter_input(INPUT_POST, 'outsideBayMiter2', FILTER_DEFAULT);
        }

        if ($outlets === FALSE) {
            $outlets = 0;
        } else {
            $outlets = $outlets * filter_input(INPUT_POST, 'outlets2', FILTER_DEFAULT);
        }

        if ($hinge === FALSE) {
            $hinge = 0;
        } else {
            $hinge = $hinge * filter_input(INPUT_POST, 'hinge2', FILTER_DEFAULT);
        }

        if ($drainTileAdaptor === FALSE) {
            $drainTileAdaptor = 0;
        } else {
            $drainTileAdaptor = $drainTileAdaptor * filter_input(INPUT_POST, 'drainTileAdaptor2', FILTER_DEFAULT);
        }

        if ($fascia === FALSE) {
            $fascia = 0;
        } else {
            $fascia = $fascia * filter_input(INPUT_POST, 'fascia2', FILTER_DEFAULT);
        }

        if ($soffit === FALSE) {
            $soffit = 0;
        } else {
            $soffit = $soffit * filter_input(INPUT_POST, 'soffit2', FILTER_DEFAULT);
        }

        $parts2 = "$gutter $downspout $elbowsA $elbowsB $insideMiters $outsideMiters $endCapsL $endCapsR $insideBayMiter $outsideBayMiter $outlets $hinge $drainTileAdaptor $fascia $soffit $other";
        $gParts2 = explode(" ", $parts2);

        $partsTogether = array_combine($gPForm, $gParts2);

//        $_SESSION['gParts2'] = $partsTogether;
//        $_SESSION['gParts2'] = $gParts2;
        $total = 0;
        foreach ($gParts2 as $g2) {
            $total += $g2;
        }
        $total = '$ ' . number_format($total);

//        $_SESSION['total'] = $total;

        include ('results.php');
        break;
    case 'read':
        $other = filter_input(INPUT_POST, 'other', FILTER_VALIDATE_INT);
        $gutter = filter_input(INPUT_POST, 'gutter', FILTER_VALIDATE_INT);
        $gutter2 = filter_input(INPUT_POST, 'gutter2', FILTER_DEFAULT);
        $downspout = filter_input(INPUT_POST, 'downspout', FILTER_VALIDATE_INT);
        $elbowsA = filter_input(INPUT_POST, 'elbowsA', FILTER_VALIDATE_INT);
        $elbowsB = filter_input(INPUT_POST, 'elbowsB', FILTER_VALIDATE_INT);
        $insideMiters = filter_input(INPUT_POST, 'insideMiters', FILTER_VALIDATE_INT);
        $outsideMiters = filter_input(INPUT_POST, 'outsideMiters', FILTER_VALIDATE_INT);
        $endCapsL = filter_input(INPUT_POST, 'endCapsL', FILTER_VALIDATE_INT);
        $endCapsR = filter_input(INPUT_POST, 'endCapsR', FILTER_VALIDATE_INT);
        $insideBayMiter = filter_input(INPUT_POST, 'insideBayMiter', FILTER_VALIDATE_INT);
        $outsideBayMiter = filter_input(INPUT_POST, 'outsideBayMiter', FILTER_VALIDATE_INT);
        $outlets = filter_input(INPUT_POST, 'outlets', FILTER_VALIDATE_INT);
        $hinge = filter_input(INPUT_POST, 'hinge', FILTER_VALIDATE_INT);
        $drainTileAdaptor = filter_input(INPUT_POST, 'drainTileAdaptor', FILTER_VALIDATE_INT);
        $fascia = filter_input(INPUT_POST, 'fascia', FILTER_VALIDATE_INT);
        $soffit = filter_input(INPUT_POST, 'soffit', FILTER_VALIDATE_INT);
        $total = filter_input(INPUT_POST, 'total');

        $cName = filter_input(INPUT_POST, 'cName');
        $company = filter_input(INPUT_POST, 'company');
        $address = filter_input(INPUT_POST, 'address');
        $email = filter_input(INPUT_POST, 'email');
        $phone = filter_input(INPUT_POST, 'phone');

        $customer = array("name" => $cName, "company" => $company, "address" => $address, "email" => $email, "phone" => $phone);

        $parts2 = "$gutter $downspout $elbowsA $elbowsB $insideMiters $outsideMiters $endCapsL $endCapsR $insideBayMiter $outsideBayMiter $outlets $hinge $drainTileAdaptor $fascia $soffit $other";
        $gParts2 = explode(" ", $parts2);

        $pdf = new PDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetFillColor(211, 211, 211);
        $x2 = $pdf->GetPageWidth();
        $pdf->Line(10, 50, ($x2 - 10), 50);
        $pdf->SetXY(30, 75);
        for ($i = 0; $i < $gCount; $i++) {
            if ($i % 2) {
                $pdf->Cell(40, 6, "$gParts[$i]:", 0, 2, 'R');
            } else {
                $pdf->Cell(40, 6, "$gParts[$i]:", 0, 2, 'R', true);
            }
        }
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(40, 6, "Total:", 0, 2, 'R', true);
        $pdf->SetFont('');
        $pdf->SetXY(70, 75);
        for ($i = 0; $i < $gCount; $i++) {
            if ($i % 2) {
                if ($gParts2[$i] != 0) {
                    $pdf->Cell(30, 6, number_format($gParts2[$i]), 0, 2, 'C');
                } else {
                    $pdf->Cell(30, 6, "", 0, 2, 'C');
                }
            } else {
                if ($gParts2[$i] != 0) {
                    $pdf->Cell(30, 6, number_format($gParts2[$i]), 0, 2, 'C', true);
                } else {
                    $pdf->Cell(30, 6, "", 0, 2, 'C', true);
                }
            }
        }
        $pdf->Cell(30, 6, $total, 0, 2, 'C', true);
        $pdf->SetXY(110, 75);
        $pdf->Cell(20, 6, 'Notes:', 0, 2, 'L');
        $pdf->MultiCell(80, 80, '', 1, 'L');
        
//        $pdf->Output();
//            header("Location: .");
        
        if (SendIt($pdf,$customer)) {
//            header("Location: .");
            include ('home.php');
        } else {
//            $_SERVER['PHP_SELF'];
            include ('results.php');
        }

        break;
};

function phpAlert($msg) {
//    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
//    echo '<div class="alert alert-dark" role="alert">"' . $msg . '"</div>';
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">'
    . '<strong>' . $msg . '</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></div>';
}

function SendIt($pdf,$customer) {
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
    $mail->Body = $customer['name']."<br><br>".'Here is your bid';

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
