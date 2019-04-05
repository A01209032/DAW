<?php
    require '../vendor/autoload.php';
    //require_once('controller/mails.php');
    use Mailgun\Mailgun;
    $mailgun = new Mailgun('4ccf820586b1f03b54d04d6de13937aa-2416cf28-43481fa8', new \Http\Adapter\Guzzle6\Client());
    include('index.html');
    




?>
