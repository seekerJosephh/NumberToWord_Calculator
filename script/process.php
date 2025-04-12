<?php

include 'config.php';

$english_words = $khmer_words = $usd_amount = $error_message = $file_contents = '';
$riel_amount = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $riel_amount_input = trim($_POST["riel_amount"] ?? '');
    processRielAmount($riel_amount_input, $riel_amount, $english_words, $khmer_words, $usd_amount, $error_message, $file_contents);

    $result_html = '';
    if ($error_message) {
        $result_html .= $error_message;
    } else {
        $result_html .= "<h3>Entered Data: " . number_format($riel_amount) . " Riel</h3>";
        $result_html .= "<p><strong>a. English:</strong> " . $english_words . " Riel</p>";
        $result_html .= "<p><strong>b. Khmer:</strong> " . $khmer_words . "រៀល</p>";
        $result_html .= "<p><strong>c. US Dollars:</strong> $" . $usd_amount . "</p>";
        if ($file_contents) {
            $result_html .= "<h3>File Contents (Projects.txt):</h3>";
            $result_html .= "<pre>" . htmlspecialchars($file_contents) . "</pre>";
        }
    }

    echo $result_html; // Send the result back to index.html
}
?>