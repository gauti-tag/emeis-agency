<?php
// Developer Tiehoule Gautier +255 0170070415
$data = array(
    'filename' => '',
    'fileNewName' => '',
    'filetmp' => '',
    'response' => '',
    'error' => '',
    'numero_photo' => '',
    'imageSize' => '',
    'imageSizeFix' => 5000000,
    'extenstion' => ''
); 

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES)){

    if(isset($_FILES['photo_un']['name'])){

        $data['filename'] = $_FILES['photo_un']['name'];
        $data['filetmp'] = $_FILES['photo_un']['tmp_name'];
        $data['numero_photo'] = 1;
        $data['imageSize'] = $_FILES['photo_un']['size'];
       

    }elseif(isset($_FILES['photo_deux']['name']))
    {
        $data['filename'] = $_FILES['photo_deux']['name'];
        $data['filetmp'] = $_FILES['photo_deux']['tmp_name'];
        $data['numero_photo'] = 2;
        $data['imageSize'] = $_FILES['photo_deux']['size'];
        
    }

      // Rename the file
      $data['fileNewName'] = time();
      $data['extention'] = strrchr($data['filename'], '.');
      $data['fileNewName'] = $data['fileNewName'].$data['extention'];

      // Upload location
      $location = "../uploads/";
  
      //file path
      $path = $location.$data['fileNewName'];
  
      //file extension
      $file_extention = pathinfo($path, PATHINFO_EXTENSION);
      $file_extention = strtolower($file_extention);
      
      //valid extension
      $valid_ext = array("jpg", "JPG", "jpeg", "JPEG", "png", "PNG", "pjp", "PJP", "pjpeg", "PJPEG", "jfif", "JFIF");
      $data['response'] = 1;
     
   }

   if( (int) $data['imageSize'] > $data['imageSizeFix'])
   {
     $data['error'] = "la photo N°{$data['numero_photo']} importée est trop volumineuse";
     $data['response'] = 0;
   }
   
   if (!in_array($file_extention, $valid_ext))
   {
    $data['error'] = "L'extension de la photo N°{$data['numero_photo']}est invalide";
    $data['response'] = 0;
   }
    

    // upload file
    if ($data['response'] == 1)
    {
        move_uploaded_file($data['filetmp'], $path);
    }


     echo json_encode($data);

?>





