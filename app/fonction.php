<?php
/*use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once 'PHPMailer/Exception.php';
require_once 'PHPMailer/PHPMailer.php';
require_once 'PHPMailer/SMTP.php';*/

 function VerifInput($var){
    $var = trim($var);
    $var = htmlspecialchars($var);
    $var = stripcslashes($var);
    return $var;
}

function IsEmail($var){
   $var = filter_var($var,FILTER_VALIDATE_EMAIL);
return $var;
}

function IsPhone($var){
    $var = preg_match('/^[0-9]{10}$/',$var);
return  $var;
}


/*function Mailing($to_email, $from_name, $from_email, $subject, $message, $reply_to_business)
{
    $headers ='From: "'.$from_name.'"<'.$from_email.'>'."\n";
    $headers .='Reply-To: '.$reply_to_business.''."\n";
    $headers .='Content-Type: text/html; charset="utf-8"'."\n";
    $headers .='MIME-Version: 1.0'."\n";
    $headers .='Content-Transfer-Encoding: 8bit';

    mail($to_email, $subject, $contenu, $headers);
}*/


function Mailing($to_email, $from_name, $from_email, $subject, $message, $reply_to_business)
{
    $headers ='From: "'.$from_name.'"<'.$from_email.'>'."\n";
    $headers .='Reply-To: '.$reply_to_business.''."\n";
    $headers .='Content-Type: text/html; charset="utf-8"'."\n";
    $headers .='MIME-Version: 1.0'."\n";
    $headers .='Content-Transfer-Encoding: 8bit';

    if(mail($to_email, $subject, $message, $headers))
    {
        echo 'true';
    }
}


/*function PhpMailer($to_email, $from_name, $from_email, $subject, $body, $reply_to_business)
{ 
    $email = new PHPMailer(true);
    try{
    $email->SMTPDebug = SMTP::DEBUG_SERVER;                
    $email->isSMTP();                                            
    $email->Host       = 'mail51.lwspanel.com';                     
    $email->SMTPAuth   = true;                                   
    $email->Username   = 'info@emeis-agency.site';                     
    $email->Password   = 'emeisagencY@1';                               
    $email->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $email->Port       = 587;                                   
    
    $email->CharSet = 'utf-8';

    $email->SetFrom($from_email, $from_name); 
    $email->isHTML(true);  
    $email->Subject   = $subject;
    $email->Body      = $body;
    $email->AddAddress($to_email);
    $email->addReplyTo($reply_to_business);

    return $email->Send();

    echo "Mail envoyé";

    }catch(Exception){

         echo "Message non envoyé. Error {$email->ErrorInfo}";

    }
}*/

function DisplayExperience($value)
{
    $resut = '';

    if( (int) $value == 0)
    {
      $resut = 'Non';

    }else{

      $resut = 'Oui';

    }
    return $resut;
}
