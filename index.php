<?php

//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;

require ('vendor/autoload.php');
//require ('functions.php');
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
$parts = "Gutter,Downspout,Elbows A,Elbows B,Offset,Inside Miters,";
$parts .= "Outside Miters,End Caps L,End Caps R,Inside Bay Miter,Outside Bay Miter,";
$parts .= "Outlets,Hinge,Drain Tile Adaptor,";
$parts .= "Hangers,Zips,Screen,Gutter Screws,Fascia,Soffit,Other,Another,Yet Another";
$gParts = explode(",", $parts);

$gPForm = array();
foreach ($gParts as $g) {
    $gPForm[] = lcfirst(str_replace(' ', '', $g));
}
$gCount = count($gParts);
$gParts2 = array();

switch ($action) {

    case'home':
        if (!isset($hangers)) { $hangers = ""; } 
        if (!isset($hangers2)) {
            $hangers2 = "";
        }
        if (!isset($zips)) {
            $zips = "";
        } if (!isset($zips2)) {
            $zips2 = "";
        }
        if (!isset($screen)) {
            $screen = "";
        } if (!isset($screen2)) {
            $screen2 = "";
        }
        if (!isset($gutterScrews)) {
            $gutterScrews = "";
        } if (!isset($gutterScrews2)) {
            $gutterScrews2 = "";
        }
        if (!isset($cName)) {
            $cName = "";
        } if (!isset($cName2)) {
            $cName2 = "";
        }
        if (!isset($company)) {
            $company = "";
        } if (!isset($company2)) {
            $company2 = "";
        }
        if (!isset($address)) {
            $address = "";
        } if (!isset($address2)) {
            $address2 = "";
        }
        if (!isset($phone)) {
            $phone = "";
        } if (!isset($phone2)) {
            $phone2 = "";
        }
        if (!isset($email)) {
            $email = "";
        } if (!isset($email2)) {
            $email2 = "";
        }
        if (!isset($yetAnother)) {
            $yetAnother = "";
        }if (!isset($yetAnother2)) {
            $yetAnother2 = "";
        }
        if (!isset($another)) {
            $another = "";
        }
        if (!isset($another2)) {
            $another2 = "";
        }
        if (!isset($other)) {
            $other = "";
        }
        if (!isset($other2)) {
            $other2 = "";
        }
        if (!isset($offset)) {
            $offset = "";
        }
        if (!isset($offset2)) {
            $offset2 = "";
        }
        if (!isset($gutter)) {
            $gutter = "";
            $gutter2 = "";
        }
        if (!isset($downspout)) {
            $downspout = "";
            $downspout2 = "";
        }
        if (!isset($elbowsA)) {
            $elbowsA = "";
            $elbowsA2 = "";
        }
        if (!isset($elbowsB)) {
            $elbowsB = "";
            $elbowsB2 = "";
        }
        if (!isset($insideMiters)) {
            $insideMiters = "";
            $insideMiters2 = "";
        }
        if (!isset($outsideMiters)) {
            $outsideMiters = "";
            $outsideMiters2 = "";
        }
        if (!isset($endCapsL)) {
            $endCapsL = "";
            $endCapsL2 = "";
        }
        if (!isset($endCapsR)) {
            $endCapsR = "";
            $endCapsR2 = "";
        }
        if (!isset($insideBayMiter)) {
            $insideBayMiter = "";
            $insideBayMiter2 = "";
        }
        if (!isset($outsideBayMiter)) {
            $outsideBayMiter = "";
            $outsideBayMiter2 = "";
        }
        if (!isset($outlets)) {
            $outlets = "";
            $outlets2 = "";
        }
        if (!isset($hinge)) {
            $hinge = "";
            $hinge2 = "";
        }
        if (!isset($drainTileAdaptor)) {
            $drainTileAdaptor = "";
            $drainTileAdaptor2 = "";
        }
        if (!isset($fascia)) {
            $fascia = "";
            $fascia2 = "";
        }
        if (!isset($soffit)) {
            $soffit = "";
            $soffit2 = "";
        }
        if (!isset($total)) {
            $total = "";
        }
        include ('home.php');
        break;

    case'results':
        $other = filter_input(INPUT_POST, 'other', FILTER_VALIDATE_INT);
        $other2 = filter_input(INPUT_POST, 'other2', FILTER_VALIDATE_INT);
        $gutter = filter_input(INPUT_POST, 'gutter', FILTER_VALIDATE_INT);
        $gutter2 = filter_input(INPUT_POST, 'gutter2', FILTER_VALIDATE_INT);
        $downspout = filter_input(INPUT_POST, 'downspout', FILTER_VALIDATE_INT);
        $downspout2 = filter_input(INPUT_POST, 'downspout2', FILTER_VALIDATE_INT);
        $elbowsA = filter_input(INPUT_POST, 'elbowsA', FILTER_VALIDATE_INT);
        $elbowsA2 = filter_input(INPUT_POST, 'elbowsA2', FILTER_VALIDATE_INT);
        $elbowsB = filter_input(INPUT_POST, 'elbowsB', FILTER_VALIDATE_INT);
        $elbowsB2 = filter_input(INPUT_POST, 'elbowsB2', FILTER_VALIDATE_INT);
        $insideMiters = filter_input(INPUT_POST, 'insideMiters', FILTER_VALIDATE_INT);
        $insideMiters2 = filter_input(INPUT_POST, 'insideMiters2', FILTER_VALIDATE_INT);
        $outsideMiters = filter_input(INPUT_POST, 'outsideMiters', FILTER_VALIDATE_INT);
        $outsideMiters2 = filter_input(INPUT_POST, 'outsideMiters2', FILTER_VALIDATE_INT);
        $endCapsL = filter_input(INPUT_POST, 'endCapsL', FILTER_VALIDATE_INT);
        $endCapsL2 = filter_input(INPUT_POST, 'endCapsL2', FILTER_VALIDATE_INT);
        $endCapsR = filter_input(INPUT_POST, 'endCapsR', FILTER_VALIDATE_INT);
        $endCapsR2 = filter_input(INPUT_POST, 'endCapsR2', FILTER_VALIDATE_INT);
        $insideBayMiter = filter_input(INPUT_POST, 'insideBayMiter', FILTER_VALIDATE_INT);
        $insideBayMiter2 = filter_input(INPUT_POST, 'insideBayMiter2', FILTER_VALIDATE_INT);
        $outsideBayMiter = filter_input(INPUT_POST, 'outsideBayMiter', FILTER_VALIDATE_INT);
        $outsideBayMiter2 = filter_input(INPUT_POST, 'outsideBayMiter2', FILTER_VALIDATE_INT);
        $outlets = filter_input(INPUT_POST, 'outlets', FILTER_VALIDATE_INT);
        $outlets2 = filter_input(INPUT_POST, 'outlets2', FILTER_VALIDATE_INT);
        $hinge = filter_input(INPUT_POST, 'hinge', FILTER_VALIDATE_INT);
        $hinge2 = filter_input(INPUT_POST, 'hinge2', FILTER_VALIDATE_INT);
        $drainTileAdaptor = filter_input(INPUT_POST, 'drainTileAdaptor', FILTER_VALIDATE_INT);
        $drainTileAdaptor2 = filter_input(INPUT_POST, 'drainTileAdaptor2', FILTER_VALIDATE_INT);
        $fascia = filter_input(INPUT_POST, 'fascia', FILTER_VALIDATE_INT);
        $fascia2 = filter_input(INPUT_POST, 'fascia2', FILTER_VALIDATE_INT);
        $soffit = filter_input(INPUT_POST, 'soffit', FILTER_VALIDATE_INT);
        $soffit2 = filter_input(INPUT_POST, 'soffit2', FILTER_VALIDATE_INT);
        $another = filter_input(INPUT_POST, 'another', FILTER_VALIDATE_INT);
        $another2 = filter_input(INPUT_POST, 'another2', FILTER_VALIDATE_INT);
        $yetAnother = filter_input(INPUT_POST, 'yetAnother', FILTER_VALIDATE_INT);
        $yetAnother2 = filter_input(INPUT_POST, 'yetAnother2', FILTER_VALIDATE_INT);
        $offset = filter_input(INPUT_POST, 'offset', FILTER_VALIDATE_INT);
        $offset2 = filter_input(INPUT_POST, 'offset2', FILTER_VALIDATE_INT);
        $hangers = filter_input(INPUT_POST, 'hangers', FILTER_VALIDATE_INT);
        $hangers2 = filter_input(INPUT_POST, 'hangers2', FILTER_VALIDATE_INT);
        $zips = filter_input(INPUT_POST, 'zips', FILTER_VALIDATE_INT);
        $zips2 = filter_input(INPUT_POST, 'zips2', FILTER_VALIDATE_INT);
        $gutterScrews = filter_input(INPUT_POST, 'gutterScrews', FILTER_VALIDATE_INT);
        $gutterScrews2 = filter_input(INPUT_POST, 'gutterScrews2', FILTER_VALIDATE_INT);
        $screen = filter_input(INPUT_POST, 'screen', FILTER_VALIDATE_INT);
        $screen2 = filter_input(INPUT_POST, 'screen2', FILTER_VALIDATE_INT);

        $cName = filter_input(INPUT_POST, 'cName');
        $company = filter_input(INPUT_POST, 'company');
        $address = filter_input(INPUT_POST, 'address');
        $email = filter_input(INPUT_POST, 'email');
        $phone = filter_input(INPUT_POST, 'phone');

        $customer = array("name" => $cName, "company" => $company, "address" => $address, "email" => $email, "phone" => $phone);

        if ($other === FALSE) {
            $other = 0;
        } else if ($other2 === FALSE) {
            $other2 = 0;
        } else {
            $other = $other * $other2;
        }
        if ($another === FALSE) {
            $another = 0;
        } else if ($another2 === FALSE) {
            $another2 = 0;
        } else {
            $another = $another * $another2;
        }
        if ($yetAnother === FALSE) {
            $yetAnother = 0;
        } else if ($yetAnother2 === FALSE) {
            $yetAnother2 = 0;
        } else {
            $yetAnother = $yetAnother * $yetAnother2;
        }
        if ($gutter === FALSE) {
            $gutter = 0;
        } else if ($gutter2 === FALSE) {
            $gutter2 = 0;
        } else {
            $gutter = $gutter * $gutter2;
        }

        if ($downspout === FALSE) {
            $downspout = 0;
        } else if ($downspout2 === FALSE) {
            $downspout2 = 0;
        } else {
            $downspout = $downspout * $downspout2;
        }

        if ($elbowsA === FALSE) {
            $elbowsA = 0;
        } else if ($elbowsA2 === FALSE) {
            $elbowsA2 = 0;
        } else {
            $elbowsA = $elbowsA * $elbowsA2;
        }

        if ($elbowsB === FALSE) {
            $elbowsB = 0;
        } else if ($elbowsB2 === FALSE) {
            $elbowsB2 = 0;
        } else {
            $elbowsB = $elbowsB * $elbowsB2;
        }

        if ($insideMiters === FALSE) {
            $insideMiters = 0;
        } else if ($insideMiters2 === FALSE) {
            $insideMiters2 = 0;
        } else {
            $insideMiters = $insideMiters * $insideMiters2;
        }

        if ($outsideMiters === FALSE) {
            $outsideMiters = 0;
        } else if ($outsideMiters2 === FALSE) {
            $outsideMiters2 = 0;
        } else {
            $outsideMiters = $outsideMiters * $outsideMiters2;
        }

        if ($endCapsL === FALSE) {
            $endCapsL = 0;
        } else if ($endCapsL2 === FALSE) {
            $endCapsL2 = 0;
        } else {
            $endCapsL = $endCapsL * $endCapsL2;
        }

        if ($endCapsR === FALSE) {
            $endCapsR = 0;
        } else if ($endCapsR2 === FALSE) {
            $endCapsR2 = 0;
        } else {
            $endCapsR = $endCapsR * $endCapsR2;
        }

        if ($insideBayMiter === FALSE) {
            $insideBayMiter = 0;
        } else if ($insideBayMiter2 === FALSE) {
            $insideBayMiter2 = 0;
        } else {
            $insideBayMiter = $insideBayMiter * $insideBayMiter2;
        }

        if ($outsideBayMiter === FALSE) {
            $outsideBayMiter = 0;
        } else if ($outsideBayMiter2 === FALSE) {
            $outsideBayMiter2 = 0;
        } else {
            $outsideBayMiter = $outsideBayMiter * $outsideBayMiter2;
        }

        if ($outlets === FALSE) {
            $outlets = 0;
        } else if ($outlets2 === FALSE) {
            $outlets2 = 0;
        } else {
            $outlets = $outlets * $outlets2;
        }

        if ($hinge === FALSE) {
            $hinge = 0;
        } else if ($hinge2 === FALSE) {
            $hinge2 = 0;
        } else {
            $hinge = $hinge * $hinge2;
        }

        if ($drainTileAdaptor === FALSE) {
            $drainTileAdaptor = 0;
        } else if ($drainTileAdaptor2 === FALSE) {
            $drainTileAdaptor2 = 0;
        } else {
            $drainTileAdaptor = $drainTileAdaptor * $drainTileAdaptor2;
        }

        if ($fascia === FALSE) {
            $fascia = 0;
        } else if ($fascia2 === FALSE) {
            $fascia2 = 0;
        } else {
            $fascia = $fascia * $fascia2;
        }

        if ($soffit === FALSE) {
            $soffit = 0;
        } else if ($soffit2 === FALSE) {
            $soffit2 = 0;
        } else {
            $soffit = $soffit * $soffit2;
        }

        if ($offset === FALSE) {
            $offset = 0;
        } else if ($offset2 === FALSE) {
            $offset2 = 0;
        } else {
            $offset = $offset * $offset2;
        }
        if ($hangers === FALSE) {
            $hangers = 0;
        } else if ($hangers2 === FALSE) {
            $hangers2 = 0;
        } else {
            $hangers = $hangers * $hangers2;
        }
        if ($screen === FALSE) {
            $screen = 0;
        } else if ($screen2 === FALSE) {
            $screen2 = 0;
        } else {
            $screen = $screen * $screen2;
        }
        if ($gutterScrews === FALSE) {
            $gutterScrews = 0;
        } else if ($gutterScrews2 === FALSE) {
            $gutterScrews2 = 0;
        } else {
            $gutterScrews = $gutterScrews * $gutterScrews2;
        }

        if ($zips === FALSE) {
            $zips = 0;
        } else if ($zips2 === FALSE) {
            $zips2 = 0;
        } else {
            $zips = $zips * $zips2;
        }
        $parts2 = "$gutter $downspout $elbowsA $elbowsB $offset $insideMiters $outsideMiters $endCapsL $endCapsR $insideBayMiter $outsideBayMiter $outlets $hinge $drainTileAdaptor $hangers $zips $screen $gutterScrews $fascia $soffit $other $another $yetAnother";
        $gParts2 = explode(" ", $parts2);

//        $partsTogether = array_combine($gPForm, $gParts2);

        $total = 0;
        foreach ($gParts2 as $g2) {
            $total += $g2;
        }
        $total = '$ ' . number_format($total);

        include ('results.php');
        break;
    case 'read':
        $gutter = filter_input(INPUT_POST, 'gutter', FILTER_VALIDATE_INT);
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
        $other = filter_input(INPUT_POST, 'other', FILTER_VALIDATE_INT);
        $another = filter_input(INPUT_POST, 'another', FILTER_VALIDATE_INT);
        $yetAnother = filter_input(INPUT_POST, 'yetAnother', FILTER_VALIDATE_INT);
        $offset = filter_input(INPUT_POST, 'offset', FILTER_VALIDATE_INT);
        $hangers = filter_input(INPUT_POST, 'hangers', FILTER_VALIDATE_INT);
        $zips = filter_input(INPUT_POST, 'zips', FILTER_VALIDATE_INT);
        $gutterScrews = filter_input(INPUT_POST, 'gutterScrews', FILTER_VALIDATE_INT);
        $screen = filter_input(INPUT_POST, 'screen', FILTER_VALIDATE_INT);
        $fascia = filter_input(INPUT_POST, 'fascia', FILTER_VALIDATE_INT);
        $soffit = filter_input(INPUT_POST, 'soffit', FILTER_VALIDATE_INT);
        $total = filter_input(INPUT_POST, 'total');

        $cName = filter_input(INPUT_POST, 'cName');
        $company = filter_input(INPUT_POST, 'company');
        $address = filter_input(INPUT_POST, 'address');
        $email = filter_input(INPUT_POST, 'email');
        $phone = filter_input(INPUT_POST, 'phone');

        $customer = array("name" => $cName, "company" => $company, "address" => $address, "email" => $email, "phone" => $phone);

        $parts2 = "$gutter $downspout $elbowsA $elbowsB $offset $insideMiters $outsideMiters $endCapsL $endCapsR $insideBayMiter $outsideBayMiter $outlets $hinge $drainTileAdaptor $hangers $zips $screen $gutterScrews $fascia $soffit $other $another $yetAnother";
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
        $pdf->Cell(40, 6, "Total:", 0, 2, 'R');
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
        $pdf->Cell(30, 6, $total, 0, 2, 'C');
        $pdf->SetXY(110, 75);
        $pdf->Cell(20, 6, 'Notes:', 0, 2, 'L');
        $pdf->MultiCell(80, 80, '', 1, 'L');

        $pdf->Output();
//            header("Location: .");
//        if (SendIt($pdf, $customer)) {
////            header("Location: .");
//            include ('home.php');
//        } else {
////            $_SERVER['PHP_SELF'];
//            include ('results.php');
//        }

        break;
};

function phpAlert($msg) {
//    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
//    echo '<div class="alert alert-dark" role="alert">"' . $msg . '"</div>';
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">'
    . '<strong>' . $msg . '</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></div>';
}

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
