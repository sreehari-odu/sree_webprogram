<?php

require_once "vendor/autoload.php";

//PHPMailer Object

function sendEmail($to,$subject,$message){
    $email = new \SendGrid\Mail\Mail();
    $email->setFrom("sreeharithiriveedhi95@gmail.com");
    $email->setSubject($subject);
    $email->addTo($to, "User");
    $email->addContent(
        "text/html", $message
    );
    $sendgrid = new \SendGrid('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');
    try {
        $response = $sendgrid->send($email);
        if($response->statusCode()>=200 && $response->statusCode() <=300 ){
            return true;
        }else{
            return false;
        }
        //print $response->statusCode() . "\n";
        //print_r($response->headers());
        //print $response->body() . "\n";
    } catch (Exception $e) {
        echo 'Caught exception: '. $e->getMessage() ."\n";
    }
}
