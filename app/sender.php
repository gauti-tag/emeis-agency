<?php
 //Developer Tiehoule Aubin +225 0170070415
  require_once 'fonction.php';
  $data = array(
        'database'=>'',
        'genre'=>'',
        'genreError'=>'',
        'nom_prenom'=>'',
        'nom_prenomError'=>'',
        'residence'=>'',
        'residenceError'=>'',
        'age' => '',
        'ageError' => '',
        'taille' => '',
        'tailleError' => '',
        'telephone' => '',
        'telephoneError' => '',
        'whatsapp' => '',
        'whatsappError' => '',
        'email' => '',
        'emailError' => '',
        'experience' => '',
        'experienceError' => '',
        'image_one' => '',
        'image_two' => '',
        'imageError' => '',
        'valider'=>'',
        'query'=>'',
        'sender'=>''
     );

      if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST)){

        try {
            $data['database'] = new PDO('mysql:host=185.98.131.177;dbname=emeis1988264','emeis1988264','nra05khkbr');
            $data['database']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $data['genre'] = VerifInput($_POST['genre']);
            $data['nom_prenom'] = VerifInput($_POST['nom_prenom']);
            $data['residence'] = VerifInput($_POST['residence']);
            $data['age'] = VerifInput($_POST['age']);
            $data['taille'] = VerifInput($_POST['taille']);
            $data['telephone'] = VerifInput($_POST['telephone']);
            $data['whatsapp'] = VerifInput($_POST['whatsapp']);
            $data['email'] = VerifInput($_POST['email']);
            $data['experience'] = VerifInput($_POST['experience']);
            $data['image_one'] = VerifInput($_POST['image_title1']);
            $data['image_two'] = VerifInput($_POST['image_title2']);
            $data['valider'] = true;

             }catch (PDOException $e){

            print 'error'.$e->getMessage().'<br>';
        }

    }


    if(empty($data['age']))
    {
        $data['ageError'] = '*';
        $data['valider'] = false;
    }
    if(empty($data['taille']))
    {
        $data['tailleError'] = '*';
        $data['valider'] = false;
    }
    
    if(empty($data['nom_prenom']))
    {
        $data['nom_prenomError'] = 'Merci d\'entrer votre nom et prenoms svp!';
        $data['valider'] = false;
    }

    if(empty($data['residence']))
    {
        $data['residenceError'] = 'Merci d\'entrer votre lieu de residence svp!';
        $data['valider'] = false;
    }


    if(empty($data['image_one']))
    {
        $data['imageError'] = 'Merci d\'importer la photo N°1 svp!';
        $data['valider'] = false;
    }

    if(empty($data['image_two']))
    {
        $data['imageError'] = 'Merci d\'importer la photo N°2 svp!';
        $data['valider'] = false;
    }

    if(empty($data['image_one']) && empty($data['image_two']))
    {
        $data['imageError'] = 'Merci d\'importer les photos N°1 et N°2 svp!';
        $data['valider'] = false;
    }

    if(empty($data['email']))
    {
        $data['emailError'] = 'Merci d\'entrer votre addresse email svp!';
        $data['valider'] = false;

    }elseif (!IsEmail($data['email']))
    {
        $data['emailError'] = 'Email non valide!';
        $data['valider'] = false;
    }


if(empty($data['telephone']))
    {
        $data['telephoneError'] = 'Merci d\'entrer votre numéro de téléphone svp!';
        $data['valider'] = false;

    }elseif (!IsPhone($data['telephone']))
    {
        $data['telephoneError'] = 'Cet numéro de téléphone est non valide';
        $data['valider'] = false;

    }


if(empty($data['whatsapp']))
{
    $data['whatsappError'] = 'Merci d\'entrer votre numéro whatsApp svp!';
    $data['valider'] = false;

}elseif (!IsPhone($data['whatsapp']))
{
    $data['whatsappError'] = 'Cet numéro whatsApp est non valide';
    $data['valider'] = false;

}

if($data['valider']){
    $data['query'] = "INSERT INTO clients (genre,nom_prenom,residence,age,taille,telephone, whatsapp, email, hotesse, photo_un, photo_deux, created_at)
                            VALUES (:genre,:nom_prenom,:residence,:age,:taille,:telephone,:whatsapp, :email, :experience, :image_one,:image_two, :created_at)";
    
    $data['sender'] = $data['database']->prepare($data['query']);

    $data['sender']->execute(array(
        "genre" =>$data['genre'],
        "nom_prenom"=>$data['nom_prenom'],
        "residence"=>$data['residence'],
        "age"=>$data['age'],
        "taille"=>$data['taille'],
        "telephone"=>$data['telephone'],
        "whatsapp"=>$data['whatsapp'],
        "email"=>$data['email'],
        "experience"=>$data['experience'],
        "image_one"=>$data['image_one'],
        "image_two"=>$data['image_two'],
        "created_at" => date('d-m-y h:i:s')
    ));

}

echo json_encode($data);


/** Select Last record to display into mail message **/
$database = new PDO('mysql:host=185.98.131.177;dbname=emeis1988264','emeis1988264','nra05khkbr');
$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$fetch_last_record = $database->query("SELECT * FROM clients WHERE id = (SELECT MAX(id) FROM clients)");
$record = $fetch_last_record->fetch();

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
                                        <a href=\"https://mysql23.lwspanel.com/phpmyadmin\"
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

/** Mail sender without attachments */
// info@emeis-agency.site
//Mailing('info@emeis-agency.site', 'Emeis Agency', 'info@emeis-agency.site','Notification Candidature', $email, 'no-reply@emeis-agency.site');
Mailing('info@emeis-agency.site', 'Emeis Agency', 'info@emeis-agency.site','Notification Candidature', $email, 'no-reply@emeis-agency.site');
    
/** Mail for client */
$email_client = "<body marginheight=\"0\" topmargin=\"0\" marginwidth=\"0\" style=\"margin: 0px; background-color: #f2f3f8;\" leftmargin=\"0\">
    <table cellspacing=\"0\" border=\"0\" cellpadding=\"0\" width=\"100%\" bgcolor=\"#f2f3f8\"
        style=\"@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;\">
        <tr>
            <td>
                <table style=\"background-color: #f2f3f8; max-width:670px; margin:0 auto;\" width=\"100%\" border=\"0\"
                    align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
                    <tr>
                        <td style=\"height:80px;\"></td>
                    </tr>
                    <!-- Logo -->
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
                    <!-- Email Content -->
                    <tr>
                        <td>
                            <table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"
                                style=\"max-width:670px; background:#fff; border-radius:3px;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);padding:0 40px;\">
                                <tr>
                                    <td style=\"height:40px;\"></td>
                                </tr>
                                <!-- Title -->
                                <tr>
                                    <td style=\"padding:0 15px; text-align:center;\">
                                        <h2 style=\"color:#1e1e2d; font-weight:70; margin:0;font-size:16px;font-family:'Rubik',sans-serif;\">
                                            Bonjour <strong> ". $record['nom_prenom'] ." </strong>, <br> Votre candidature à bien été prise en compte par notre service spécialisé et un retour vous sera fait dans un délais de 48h jours ouvrés. Merci!
                                        </h2>
                                        <span style=\"display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; 
                                        width:100px;\"></span>
                                    </td>
                                </tr>
                                <!-- Details Table -->
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
/** Mailing to business */
Mailing($record['email'], 'Emeis Agency', 'info@emeis-agency.site','Votre candidature à Emeis Agency à bien été reçue', $email_client, 'info@emeis-agency.site');





//PhpMailer($record['email'], 'Emeis Agency', 'info@emeis-agency.site','Votre candidature à Emeis Agency à bien été reçue', $email_client, 'info@emeis-agency.site');
//MailingPdf($affihe['nomDemandeur'] ,$affihe['email_adresse'],$affihe['email_adresse'], '', '','services@tcorpandco.com', 'TCORPANDCO','services@tcorpandco.com','DEVIS',$pdf);
//MailingPdf($record['nom_prenom'] ,$record['email'],$record['email'], '', '','info@emeis-agency.site', 'Emeis Agency','info@emeis-agency.site','Votre candidature à Emeis Agency à bien été reçue',$email_client);

//PhpMailer('info@emeis-agency.site', 'Emeis Agency', 'info@emeis-agency.site','Notification Candidature', $email, 'no-reply@emeis-agency.site');