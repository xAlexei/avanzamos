<?php

date_default_timezone_set('America/Mexico_City');            
$horaActual = DATE("h:i:s");
$diaActual = date("d");
$mesActual = date("m");

echo $hora;


// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md
require __DIR__ . '\vendor\autoload.php';
require "_config.php";
$conn  = $link;


use Twilio\Rest\Client;
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$sid = $_ENV['TWILIO_ACCOUNT_SID'];
$token = $_ENV['TWILIO_AUTH_TOKEN'];

$twilio = new Client($sid, $token);
if($diaActual = 01 && $horaActual = ""){
    $twilio->messages->create("+523320659549", // to
        [
            "body" => "This is the ship that made the Kessel Run in fourteen parsecs?",
            "from" => "+17623091166"
        ]
    );
}



