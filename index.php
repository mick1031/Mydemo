<?php
require 'vendor/autoload.php';

use OTPHP\TOTP;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

// 生成 TOTP
$secret = 'PW3F4TL76MYJEDLYXMDSZFYRPVAK3C674HGUECZDG2SRC6AK3MRJ4SUFSRR4E7OMRS6GIUL3ST4EH3P37WVQIKUO37GBMUWJJIO23SY';
$totp = TOTP::create($secret);
$totp->setLabel('MickTest');
$totp->setIssuer('MickTestIssuer');
$otpUri = $totp->getProvisioningUri();

$secret = $totp->getSecret();
echo 'Secret: ' . $secret . '<br>';
echo 'otpUri: ' . $otpUri . '<br>';

// 生成 QR code
$qrCode = new QrCode($otpUri);
$writer = new PngWriter();
$result = $writer->write($qrCode);

// 將 QR code 以 base64 編碼顯示在網頁上
$base64 = base64_encode($result->getString());
echo '<img src="data:image/png;base64,' . $base64 . '">';
?>

