<?php
require_once 'fonction.php';
/*use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once 'PHPMailer/Exception.php';
require_once 'PHPMailer/PHPMailer.php';
require_once 'PHPMailer/SMTP.php';

 $email = new PHPMailer(true);*/


 /*$from_email = "info@emeis-agency.site";
 $from_name = "EGENCY";   
 $subject = "TEST";
 $message = "<p>TEST</p>";
 $to_email = "info@emeis-agency.site";
 $reply_to_business = "info@emeis-agency.site";*/

//try{
//Server settings
/*$email->SMTPDebug = SMTP::DEBUG_SERVER;                      
$email->isSMTP();                                            
$email->Host       = 'mail51.lwspanel.com';                    
$email->SMTPAuth   = true;                                   
$email->Username   = 'info@emeis-agency.site';                    
$email->Password   = 'emeisagencY@1';                             
$email->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
$email->Port       = 587;    */                               

/*$email->CharSet = 'utf-8';

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

}*/


try {

    $database = new PDO('mysql:host=185.98.131.177;dbname=emeis1988264','emeis1988264','nra05khkbr');
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $fetch_last_record = $database->query("SELECT * FROM clients WHERE id = (SELECT MAX(id) FROM clients)");
    $record = $fetch_last_record->fetch();    

   /* $headers ='From: "'.$from_name.'"<'.$from_email.'>'."\n";
    $headers .='Reply-To: '.$reply_to_business.''."\n";
    $headers .='Content-Type: text/html; charset="utf-8"'."\n";
    $headers .='MIME-Version: 1.0'."\n";
    $headers .='Content-Transfer-Encoding: 8bit';
    if (mail($to_email,$subject,$message,$headers))
    {
        echo "Parti";
    }else{

        echo "Pas parti";
    }*/


//$sender = 'someone@somedomain.tld';
//$recipient = 'gautier.tiehoule@gmail.com';
//$recipient = 'info@emeis-agency.site';

/*$subject = "php mail test";*/

$m = "<body marginheight=\"0\" topmargin=\"0\" marginwidth=\"0\" style=\"margin: 0px; background-color: #f2f3f8;\" leftmargin=\"0\">
<table cellspacing=\"0\" border=\"0\" cellpadding=\"0\" width=\"100%\" bgcolor=\"#f2f3f8\"
    style=\"@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;\">
    <tr>
        <td>
            <table style=\"background-color: #f2f3f8; max-width:670px; margin:0 auto;\" width=\"100%\" border=\"0\"
                align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
                <tr>
                    <td style=\"height:80px;\"></td>
                </tr>
            
                <tr>
                    <td style=\"text-align:center;\">
                      <a href=\"http://www.emeis-agency.ci\" title=\"logo\" target=\"_blank\">
                        <img width=\"170\" src=\"https://www.emeis-agency.site/assets/img/logo/logo_emeis.jpg\" title=\"logo\" alt=\"logo\">
                        
                      </a>
                    </td>
                </tr>
                <tr>
                    <td style=\"height:20px;\"></td>
                </tr>
                <tr>
                    <td>
                        <table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"
                            style=\"max-width:670px; background:#fff; border-radius:3px;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);padding:0 40px;\">
                            <tr>
                                <td style=\"height:40px;\"></td>
                            </tr>
                            <tr>
                                <td style=\"padding:0 15px; text-align:center;\">
                                    <h2 style=\"color:#1e1e2d; font-weight:70; margin:0;font-size:16px;font-family:'Rubik',sans-serif;\">
                                        Bonjour <strong> ". $record['nom_prenom'] ." </strong>, <br> Votre candidature à bien été prise en compte par notre service spécialisé et un retour vous sera fait dans un délais de 48h jours ouvrés. Merci!
                                    </h2>
                                    <span style=\"display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; 
                                    width:100px;\"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table cellpadding=\"0\" cellspacing=\"0\"
                                        style=\"width: 100%; border: 1px solid #ededed\">
                                        <tbody>
                                            <tr>
                                                <td
                                                    style=\"padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)\">
                                                    Genre:</td>
                                                <td
                                                    style=\"padding: 10px; border-bottom: 1px solid #ededed; color: #455056; font-weight: bold;\">
                                                    ". $record['genre'] ."</td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style=\"padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)\">
                                                    Nom et prénoms:</td>
                                                <td
                                                    style=\"padding: 10px; border-bottom: 1px solid #ededed; color: #455056; font-weight: bold;\">
                                                    ". $record['nom_prenom'] ."</td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style=\"padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)\">
                                                    Age:</td>
                                                <td
                                                    style=\"padding: 10px; border-bottom: 1px solid #ededed; color: #455056; font-weight: bold;\">
                                                    ". $record['age'] ." an(s)</td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style=\"padding: 10px; border-bottom: 1px solid #ededed;border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)\">
                                                    Taille:</td>
                                                <td
                                                    style=\"padding: 10px; border-bottom: 1px solid #ededed; color: #455056; font-weight: bold;\">
                                                    ". $record['taille'] ." mètre(s)</td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style=\"padding: 10px;  border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%;font-weight:500; color:rgba(0,0,0,.64)\">
                                                    Téléphone:</td>
                                                <td
                                                    style=\"padding: 10px; border-bottom: 1px solid #ededed; color: #455056; font-weight: bold;\">
                                                    +225 ". $record['telephone'] ."</td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style=\"padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%;font-weight:500; color:rgba(0,0,0,.64)\">
                                                    Whatsapp:</td>
                                                <td
                                                    style=\"padding: 10px; border-bottom: 1px solid #ededed; color: #455056; font-weight: bold; \">
                                                    +225 ". $record['whatsapp'] ."</td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style=\"padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%;font-weight:500; color:rgba(0,0,0,.64)\">
                                                    Email:</td>
                                                <td
                                                    style=\"padding: 10px; border-bottom: 1px solid #ededed; color: #455056; font-weight: bold; \">
                                                    ". $record['email'] ."</td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style=\"padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%;font-weight:500; color:rgba(0,0,0,.64)\">
                                                    Expérience:</td>
                                                <td
                                                    style=\"padding: 10px; border-bottom: 1px solid #ededed; color: #455056; font-weight: bold; \">
                                                    ". DisplayExperience($record['hotesse']) ."</td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style=\"padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%;font-weight:500; color:rgba(0,0,0,.64)\">
                                                    Référence Photo N°1:</td>
                                                <td
                                                    style=\"padding: 10px; border-bottom: 1px solid #ededed; color: #455056; font-weight: bold; \">
                                                    ". $record['photo_un'] ."</td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style=\"padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%;font-weight:500; color:rgba(0,0,0,.64)\">
                                                    Référence Photo N°2:</td>
                                                <td
                                                    style=\"padding: 10px; border-bottom: 1px solid #ededed; color: #455056; font-weight: bold; \">
                                                    ". $record['photo_deux'] ."</td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style=\"padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%;font-weight:500; color:rgba(0,0,0,.64)\">
                                                    Date d'inscription:</td>
                                                <td
                                                    style=\"padding: 10px; border-bottom: 1px solid #ededed; color: #455056; font-weight: bold; \">
                                                    le ". $record['created_at'] ."</td>
                                            </tr>                                
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style=\"height:40px;\"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style=\"height:20px;\"></td>
                </tr>
                <tr>
                    <td style=\"text-align:center;\">
                            <p style=\"font-size:14px; color:#455056bd; line-height:18px; margin:0 0 0;\"><strong>www.emeis-agency.ci</strong></p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
";


$mm ="<body marginheight=\"0\" topmargin=\"0\" marginwidth=\"0\" style=\"margin: 0px; background-color: #f2f3f8;\" leftmargin=\"0\">
<table cellspacing=\"0\" border=\"0\" cellpadding=\"0\" width=\"100%\" bgcolor=\"#f2f3f8\"
    style=\"@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;\">
    <tr>
        <td>
            <table style=\"background-color: #f2f3f8; max-width:670px; margin:0 auto;\" width=\"100%\" border=\"0\"
                align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
                <tr>
                    <td style=\"height:80px;\"></td>
                </tr>
            
                <tr>
                    <td style=\"text-align:center;\">
                      <a href=\"http://www.emeis-agency.ci\" title=\"logo\" target=\"_blank\">
                        <img width=\"170\" src=\"https://www.emeis-agency.site/assets/img/logo/logo_emeis.jpg\" title=\"logo\" alt=\"logo\">
                        
                      </a>
                    </td>
                </tr>
                <tr>
                    <td style=\"height:20px;\"></td>
                </tr>
                <tr>
                    <td>
                        <table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"
                            style=\"max-width:670px; background:#fff; border-radius:3px;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);padding:0 40px;\">
                            <tr>
                                <td style=\"height:40px;\"></td>
                            </tr>
                            <tr>
                                <td style=\"padding:0 15px; text-align:center;\">
                                    <h2 style=\"color:#1e1e2d; font-weight:70; margin:0;font-size:16px;font-family:'Rubik',sans-serif;\">
                                        Bonjour <strong> </strong>, <br> Votre candidature à bien été prise en compte par notre service spécialisé et un retour vous sera fait dans un délais de 48h jours ouvrés. Merci!
                                    </h2>
                                    <span style=\"display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; 
                                    width:100px;\"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table cellpadding=\"0\" cellspacing=\"0\"
                                        style=\"width: 100%; border: 1px solid #ededed\">
                                        <tbody>
                                            <tr>
                                                <td
                                                    style=\"padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)\">
                                                    Genre:</td>
                                                <td
                                                    style=\"padding: 10px; border-bottom: 1px solid #ededed; color: #455056; font-weight: bold;\">
                                                   </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style=\"padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)\">
                                                    Nom et prénoms:</td>
                                                <td
                                                    style=\"padding: 10px; border-bottom: 1px solid #ededed; color: #455056; font-weight: bold;\">
                                                   </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style=\"padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)\">
                                                    Age:</td>
                                                <td
                                                    style=\"padding: 10px; border-bottom: 1px solid #ededed; color: #455056; font-weight: bold;\">
                                                    an(s)</td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style=\"padding: 10px; border-bottom: 1px solid #ededed;border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)\">
                                                    Taille:</td>
                                                <td
                                                    style=\"padding: 10px; border-bottom: 1px solid #ededed; color: #455056; font-weight: bold;\">
                                                     mètre(s)</td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style=\"padding: 10px;  border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%;font-weight:500; color:rgba(0,0,0,.64)\">
                                                    Téléphone:</td>
                                                <td
                                                    style=\"padding: 10px; border-bottom: 1px solid #ededed; color: #455056; font-weight: bold;\">
                                                    +225 </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style=\"padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%;font-weight:500; color:rgba(0,0,0,.64)\">
                                                    Whatsapp:</td>
                                                <td
                                                    style=\"padding: 10px; border-bottom: 1px solid #ededed; color: #455056; font-weight: bold; \">
                                                    +225 </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style=\"padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%;font-weight:500; color:rgba(0,0,0,.64)\">
                                                    Email:</td>
                                                <td
                                                    style=\"padding: 10px; border-bottom: 1px solid #ededed; color: #455056; font-weight: bold; \">
                                                   </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style=\"padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%;font-weight:500; color:rgba(0,0,0,.64)\">
                                                    Expérience:</td>
                                                <td
                                                    style=\"padding: 10px; border-bottom: 1px solid #ededed; color: #455056; font-weight: bold; \">
                                                   </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style=\"padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%;font-weight:500; color:rgba(0,0,0,.64)\">
                                                    Référence Photo N°1:</td>
                                                <td
                                                    style=\"padding: 10px; border-bottom: 1px solid #ededed; color: #455056; font-weight: bold; \">
                                                   </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style=\"padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%;font-weight:500; color:rgba(0,0,0,.64)\">
                                                    Référence Photo N°2:</td>
                                                <td
                                                    style=\"padding: 10px; border-bottom: 1px solid #ededed; color: #455056; font-weight: bold; \">
                                                    </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style=\"padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%;font-weight:500; color:rgba(0,0,0,.64)\">
                                                    Date d'inscription:</td>
                                                <td
                                                    style=\"padding: 10px; border-bottom: 1px solid #ededed; color: #455056; font-weight: bold; \">
                                                    le </td>
                                            </tr>                                
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style=\"height:40px;\"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style=\"height:20px;\"></td>
                </tr>
                <tr>
                    <td style=\"text-align:center;\">
                            <p style=\"font-size:14px; color:#455056bd; line-height:18px; margin:0 0 0;\"><strong>www.emeis-agency.ci</strong></p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
";


$email = "
<body marginheight=\"0\" topmargin=\"0\" marginwidth=\"0\" style=\"margin: 0px; background-color: #f2f3f8;\" leftmargin=\"0\">
    <table cellspacing=\"0\" border=\"0\" cellpadding=\"0\" width=\"100%\" bgcolor=\"#f2f3f8\"
        style=\"@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;\">
        <tr>
            <td>
                <table style=\"background-color: #f2f3f8; max-width:670px;  margin:0 auto;\" width=\"100%\" border=\"0\"
                    align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
                    <tr>
                        <td style=\"height:80px;\"></td>
                    </tr>
                    <tr>
                        <td style=\"text-align:center;\">
                          <a href=\"http://www.emeis-agency.ci\" title=\"logo\" target=\"_blank\">
                            <img width=\"170\" src=\"https://www.emeis-agency.site/assets/img/logo/logo_emeis.jpg\" title=\"logo\" alt=\"logo\">
                          </a>
                        </td>
                    </tr>
                    <tr>
                        <td style=\"height:20px;\"></td>
                    </tr>
                    <tr>
                        <td>
                            <table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"
                                style=\"max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);\">
                                <tr>
                                    <td style=\"height:40px;\"></td>
                                </tr>
                                <tr>
                                    <td style=\"padding:0 35px;\">
                                        <h1 style=\"color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:'Rubik',sans-serif;\">
                                            Notification Inscription
                                            </h1>
                                        <span
                                            style=\"display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;\"></span>
                                        <p style=\"color:#455056; font-size:15px;line-height:24px; margin:0;\">
                                            Vous avez reçu une candidature de <strong>". $record['nom_prenom'] ."</strong>
                                        </p>
                                        <a href=\"https://mail51.lwspanel.com/webmail\"
                                            target=\"_blank\"
                                            style=\"background:rgba(69, 80, 86, 0.7411764705882353);text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;\">
                                            Visualiser la Base de Donnée
                                            </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style=\"height:40px;\"></td>
                                </tr>
                            </table>
                        </td>
                    <tr>
                        <td style=\"height:20px;\"></td>
                    </tr>
                    <tr>
                        <td style=\"text-align:center;\">
                            <p style=\"font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;\"><strong>www.emeis-agency.ci</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td style=\"height:80px;\"></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
";
/*s$headers = 'From:' . $sender;

if (mail($recipient, $subject, $message, $headers))
{
    echo "Message accepted";
}
else
{
    echo "Error: Message not accepted";
}*/

/*$mm = wordwrap($mm, 70);

if (Mailing($record['email'], 'Emeis Agency', 'info@emeis-agency.site','Votre candidature à Emeis Agency à bien été reçue', 'Yes' , 'info@emeis-agency.site'))
{
    echo "Message accepted";
}
else
{
    echo "Error: Message not accepted";
}
 


echo "\n" . $record['email'];*/
// echo var_dump($m);
//echo var_dump($email);
//echo var_dump($mm);


//echo var_dump(Mailing($record['email'], 'Emeis Agency', 'info@emeis-agency.site','Votre candidature à Emeis Agency à bien été reçue', 'Yes' , 'info@emeis-agency.site'));

//Mailing($record['email'], 'Emeis Agency', 'info@emeis-agency.site','Notification Candidature', $email , 'no-reply@emeis-agency.site')


if (Mailing($record['email'], 'Emeis Agency', 'info@emeis-agency.site','Notification Candidature', $email , 'no-reply@emeis-agency.site'))
{
    echo "Message accepted";

}else{
    
    echo "Error: Message not accepted";

}


}catch(Exception $e)
{
    echo "error:  {$e->getMessage()}";
}