


$(document).ready(function(){

    
    $('#email').change(email_check);
    $('#email').keyup(email_check);

    $('#username').keyup(username_check);
    
    //$('#btn-signup').prop('disabled', true);

    
});

//var enableSubmitUsername = 1;
//var enableSubmitEmail = 1;
//var enableSubmitPassword = 0;





function email_check(){  
    var email = $('#email').val();
    if(email == "" || email.length < 4)

    {
      $('#email').css('border', '3px #C33 solid');
      $("#divEmailValid").html("<i class=\"glyphicon glyphicon-remove large\" style=\"color:red\"></i> Not an email yet");
      //$('#invalid').fadeIn();
      //$('#emailok').hide();
      enableSubmitEmail = 0;

      if (enableSubmitEmail == 1 && enableSubmitUsername == 1){
      $('#btn-signup').prop('disabled', false);
      }  else {
      $('#btn-signup').prop('disabled', true);
      } 


    }else{


    $('.emailinfo').hide();
    jQuery.ajax({

       type: "POST",
       url: "/rock/public/emailCheck",
       data: 'email='+ email,
       cache: false,
       success: function(response){
        
                          if(response == 0){
                              $('#email').css('border', '3px #C33 solid');
                              $("#divEmailValid").html("<i class=\"glyphicon glyphicon-remove large\" style=\"color:red\"></i> Not an email yet"); 
                              //$('#emailok').hide();
                              //$('#invalid').fadeIn();
                              enableSubmitEmail = 0;
                              }

                              if(response == 1){
                              $('#email').css('border', '3px #090 solid');
                              $("#divEmailValid").html("<i class=\"glyphicon glyphicon-ok large\" style=\"color:green\"></i> Looks like an email");
                              //$('#invalid').hide();
                              //$('#emailok').fadeIn();
                              enableSubmitEmail = 1;
                              }

                              if(response == 2){
                              $('#email').css('border', '3px #C33 solid');
                              $("#divEmailValid").html("<i class=\"glyphicon glyphicon-remove large\" style=\"color:red\"></i> Looks like that's taken");
                              //$('#invalid').hide();
                              //$('#emailok').fadeIn();
                              enableSubmitEmail = 0;
                              }

                                  if (enableSubmitEmail == 1 && enableSubmitUsername == 1 ){
                                  $('#btn-signup').prop('disabled', false);
                                   }  else {
                                   $('#btn-signup').prop('disabled', true);
                                   } 

                            }
                });
         }

  
}





function username_check(){  
    var username = $('#username').val();
    
    if(username == "" || username.length < 4){
    $('#username').css('border', '3px #C33 solid');
    $("#divUsernamelValid").html("<i class=\"glyphicon glyphicon-remove large\" style=\"color:red\"></i> Must be at lease 4 characters");
    //$('#short').fadeIn();
    //$('#ok').hide();
    enableSubmitUsername = 0;

      if (enableSubmitEmail == 1 && enableSubmitUsername == 1 ){
      $('#btn-signup').prop('disabled', false);
      }  else {
      $('#btn-signup').prop('disabled', true);
      }  

    }else{


    jQuery.ajax({

       type: "POST",
       url: "/rock/public/usernameCheck",
       data: 'username='+ username,
       cache: false,
       success: function(response){
        
                          if(response == 1){
                              $('#username').css('border', '3px #C33 solid'); 
                              $("#divUsernamelValid").html("<i class=\"glyphicon glyphicon-remove large\" style=\"color:red\"></i> That username's taken");
                              //$('#ok').hide();
                              //$('#taken').fadeIn();
                              enableSubmitUsername = 0;
                              //alert("xxx");
                              }else{
                              $('#username').css('border', '3px #090 solid');
                              $("#divUsernamelValid").html("<i class=\"glyphicon glyphicon-ok large\" style=\"color:green\"></i> You can have that");
                              //$('#taken').hide();
                              //$('#ok').fadeIn();
                              enableSubmitUsername = 1;
                              //alert("yyy");
                                   }

                                  if (enableSubmitEmail == 1 && enableSubmitUsername == 1){
                                   $('#btn-signup').prop('disabled', false);
                                   }  else {
                                   $('#btn-signup').prop('disabled', true);
                                   }  

 

                            }
                });
         }

      
      

      //alert(enableSubmitEmail);
}

