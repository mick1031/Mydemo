<?php
require 'vendor/autoload.php';

use OTPHP\TOTP;

// 從請求中獲取用戶輸入的 OTP
$userOtp = $_POST['otp'] ?? '';

// 創建與生成 OTP 時相同的 TOTP 物件
$secret = 'PW3F4TL76MYJEDLYXMDSZFYRPVAK3C674HGUECZDG2SRC6AK3MRJ4SUFSRR4E7OMRS6GIUL3ST4EH3P37WVQIKUO37GBMUWJJIO23SY';
$totp = TOTP::create($secret);
$totp->setLabel('MickTest');
$totp->setIssuer('MickTestIssuer');

// 驗證用戶輸入的 OTP
if ($totp->verify($userOtp)) {
    echo 'OTP 驗證成功';
} else {
    echo 'OTP 驗證失敗';
}
?>


<form action="login.php" method="post">
    <label for="otp">輸入 OTP:</label>
    <input type="text" id="otp" name="otp">
    <button type="submit">驗證</button>
</form>