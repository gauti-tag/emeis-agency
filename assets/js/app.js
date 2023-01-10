$(function() { 
  $('.photo1').hide();
  $('.photo2').hide();
  $('.sucess').hide();
  $('.failed').hide();

      $('#emeisForm').submit(function (e) {

          e.preventDefault();
          let data  = $(this).serialize();
         $.ajax({
             url: 'app/sender.php',
             type: 'POST',
             data:  data,
             dataType: 'json',
             success: function (data) {
                  if(data.valider){
                     $('.comments').empty();
                     $('#nom_prenom').val(' ');
                     $('#residence').val(' ');
                     $('#telephone').val(' ');
                     $('#email').val(' ');
                     $('#whatsapp').val(' ');
                     $('#age').val(' ');
                     $('#genre').val(' ');
                     $('#taille').val(' ');
                     $('#image_title1').val(' ');
                     $('#image_title2').val(' ');
                     $('.comments').val(' ');
                     $('.sucess').show( 1000 );
                     $('.photo1').attr('src', '#');
                     $('.photo2').attr('src', '#');
                     $('.photo1').hide();
                     $('.photo2').hide();
                     $('#import').val(' ');
                 }else{
 
                    $('#nom_prenom + .comments').html(data.nom_prenomError);
                    $('#residence + .comments').html(data.residenceError);
                    $('#telephone + .comments').html(data.telephoneError);
                    $('#email + .comments').html(data.emailError);
                    $('#whatsapp + .comments').html(data.whatsappError);
                    $('#image_title1 + .comments').html(data.image_oneError);
                    $('#image_title2 + .comments').html(data.image_twoError);
                    $('#import').html(data.imageError);
                    $('#asteAge').html(data.ageError);
                    $('#asteTaille').html(data.tailleError);
                    
                 }
        },
        error: function(e){
          console.log(e)
          $('.failed').show();
        }
      })
 
   })
 
 })

 function readURL1(input) {

   if (input.files && input.files[0]) { 

    const formdata = new FormData();
    formdata.append(input.name, input.files[0]);

    fetch("app/uploader.php", {
      method: "post",
      body: formdata
    })
    .then((response) => response.json())
    .then((result) => {
      console.log('Success:', result);
          if(result.response == 1){

              const reader = new FileReader();
              reader.onload = function(e) {
              $('.photo1').attr('src', e.target.result);
              $('.photo1').show();
              $('#image_title1').val(result.fileNewName);
            };
            reader.readAsDataURL(input.files[0]);

          }else{

            $('#import').html(result.error);
          }
    })
    .catch((error) => {
      console.error('Error:', error);
    });

   } else {
      alert("Upload Failed")
  }
}


function readURL2(input) {

  if (input.files && input.files[0]) {
    const formdata = new FormData();
    formdata.append(input.name, input.files[0]);

    fetch("app/uploader.php", {
      method: "post",
      body: formdata
    })
    .then((response) => response.json())
    .then((result) => {

      console.log('Success:', result);
          if(result.response == 1){

              const reader = new FileReader();
              reader.onload = function(e) {
              $('.photo2').attr('src', e.target.result);
              $('.photo2').show();
              $('#image_title2').val(result.fileNewName);
            };
            reader.readAsDataURL(input.files[0]);

          }else{

            $('#import').html(result.error);
          }
    })
    .catch((error) => {
      console.error('Error:', error);
    });
  
   } else {
     
      alert("Upload Failed")

  }
}
