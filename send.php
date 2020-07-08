<script src='https://www.google.com/recaptcha/api.js'></script>
<?php

if(isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response']) {
	$secret = '6Lf4TMIUAAAAAJEbmfnepYC8ZoPHifB4idtI-uUk';
	$ip = $_SERVER['REMOTE_ADDR'];
	$response = $_POST['g-recaptcha-response'];
	$rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$ip");
	$arr = json_decode($rsp, TRUE);
	if($arr['success']){

$imie = $_POST['imie'];
$email = $_POST['email'];
$telefon = $_POST['telefon'];
$data = $_POST['data'];
$wiadomosc = $_POST['wiadomosc'];

$kawiarnia = "kawiarniatlen@gmail.com";

$imie = htmlspecialchars($imie);
$imie = urldecode($imie);
$imie = trim($imie);
$email = htmlspecialchars($email);
$email = urldecode($email);
$email = trim($email);
$telefon = htmlspecialchars($telefon);
$telefon = urldecode($telefon);
$telefon = trim($telefon);
$data = htmlspecialchars($data);
$data = urldecode($data);
$data = trim($data);
$wiadomosc = htmlspecialchars($wiadomosc);
$wiadomosc = urldecode($wiadomosc);
$wiadomosc = trim($wiadomosc);

$totalmessage = "
Imie i nazwisko: $imie \n
Email: $email \n
Telefon: $telefon \n
Data: $data \n
Wiadomość: $wiadomosc \n";


if (mail($kawiarnia, $totalmessage, "From: $email"))
{     
 
echo '<script>alert("Wiadomość zostła wysłana"), location.replace("http://kawiarniatlen.pl")</script>';

} else { 
  header('Refresh: 0; URL=http://kawiarniatlen.pl');
    echo '<script>alert("Wiadomość nie została wysłana, prosze o kontakt telefoniczny")</script>';
}
    }}

else {
    echo '<script>alert("Nie poprawna Captcha"), location.replace("http://kawiarniatlen.pl")</script>';


}




?>