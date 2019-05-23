<?php

//require('fpdf/fpdf.php');

class PDF extends FPDF {

// Page header
    public function Header() {
        $cName = filter_input(INPUT_POST, 'cName');
        $company = filter_input(INPUT_POST, 'company');
        $address = filter_input(INPUT_POST, 'address');
        $email = filter_input(INPUT_POST, 'email');
        $phone = filter_input(INPUT_POST, 'phone');

        $w = (210 / 3) - 10;
        $this->SetFont('Arial', '', 10);
        $this->MultiCell($w, 6, "Serving Southeast Nebraska \nContact Us \nJonathan Wagner 402.413.0092 \nJunior Reyes 402.309.4913\n(Se Habla Espanol)\nheartlandseamless@gmail.com", 0, 'C');
//    $this->MultiCell($w, $h, $txt);
        $x = (210 - 70) / 2;
        // Logo
        $this->Image('images/UpdatedLogoBackground.png', $x, 10, 70);
        $w2 = ($w * 2) + 20;
        $this->SetXY($w2, 10);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(50, 5, 'Customer Info', 0, 1, 'C');
        $this->SetFont('');
        $this->SetXY($w2, 15);
        $this->MultiCell(20, 6, "Name:\nCompany:\nAddress:\nE-mail:\nPhone:", 0, 'R');
        $this->SetXY(($w2 + 20), 15);
        $this->MultiCell(40, 6, "$cName\n$company\n$address\n$email\n$phone");

        // Line break
        $this->Ln(30);
    }

    function WordWrap(&$text, $maxwidth) {
        $text = trim($text);
        if ($text === '')
            return 0;
        $space = $this->GetStringWidth(' ');
        $lines = explode("\n", $text);
        $text = '';
        $count = 0;
        foreach ($lines as $line) {
            $words = preg_split('/ +/', $line);
            $width = 0;
            foreach ($words as $word) {
                $wordwidth = $this->GetStringWidth($word);
                if ($wordwidth > $maxwidth) {
                    // Word is too long, we cut it
                    for ($i = 0; $i < strlen($word); $i++) {
                        $wordwidth = $this->GetStringWidth(substr($word, $i, 1));
                        if ($width + $wordwidth <= $maxwidth) {
                            $width += $wordwidth;
                            $text .= substr($word, $i, 1);
                        } else {
                            $width = $wordwidth;
                            $text = rtrim($text) . "\n" . substr($word, $i, 1);
                            $count++;
                        }
                    }
                } elseif ($width + $wordwidth <= $maxwidth) {
                    $width += $wordwidth + $space;
                    $text .= $word . ' ';
                } else {
                    $width = $wordwidth + $space;
                    $text = rtrim($text) . "\n" . $word . ' ';
                    $count++;
                }
            }
            $text = rtrim($text) . "\n";
            $count++;
        }
        $text = rtrim($text);
        return $count;
    }

}

//end of class
