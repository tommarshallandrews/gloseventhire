<script type="text/javascript" >


$(document).ready(function(){

    
    $('#email').change(email_check);
    $('#email').keyup(email_check);
    $('#username').keyup(username_check);
    $('#txtConfirmPassword').prop('disabled', true);
    $('#btn-signup').prop('disabled', true);

    
});

var enableSubmitUsername = 0;
var enableSubmitEmail = 0;
//var enableSubmitPassword = 0;





function email_check(){  

    var email = $('#email').val();
    if(email == "" || email.length < 4){

    $('#email').css('border', '3px #C33 solid');
    $("#divEmailValid").html("<i class=\"fa fa-times fa-2x\" style=\"color:red\"></i> Not an email yet");
    //$('#invalid').fadeIn();
    //$('#emailok').hide();
    enableSubmitEmail = 0;

      if (enableSubmitEmail == 1 && enableSubmitUsername == 1 && enableSubmitPassword == 1)
      {
      $('#btn-signup').prop('disabled', false);
      }  else {
      $('#btn-signup').prop('disabled', true);
      } 

    }else{


    $('.emailinfo').hide();
    jQuery.ajax({

       type: "POST",
       url: "{{ URL::to('/') }}/emailCheck",
       data: 'email='+ email,
       headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
       cache: false,
       success: function(response){


                          if(response == 0){
                              $('#email').css('border', '3px #C33 solid');
                              $("#divEmailValid").html("<i class=\"fa fa-times fa-2x\" style=\"color:red\"></i> Not an email yet"); 
                              //$('#emailok').hide();
                              //$('#invalid').fadeIn();
                              enableSubmitEmail = 0;
                              }

                              if(response == 1){
                              $('#email').css('border', '3px #090 solid');
                              $("#divEmailValid").html("<i class=\"fa fa-check fa-2x\" style=\"color:green\"></i> Looks like an email");
                              //$('#invalid').hide();
                              //$('#emailok').fadeIn();
                              enableSubmitEmail = 1;
                              }

                              if(response == 2){
                              $('#email').css('border', '3px #C33 solid');
                              $("#divEmailValid").html("<i class=\"fa fa-times fa-2x\" style=\"color:red\"></i> Looks like that's taken");
                              //$('#invalid').hide();
                              //$('#emailok').fadeIn();
                              enableSubmitEmail = 0;
                              }

                                  if (enableSubmitEmail == 1 && enableSubmitUsername == 1 && enableSubmitPassword == 1){
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
    $("#divUsernamelValid").html("<i class=\"fa fa-times fa-2x\" style=\"color:red\"></i> 4 or more characters");
    //$('#short').fadeIn();
    //$('#ok').hide();
    enableSubmitUsername = 0;

      if (enableSubmitEmail == 1 && enableSubmitUsername == 1 && enableSubmitPassword == 1){
      $('#btn-signup').prop('disabled', false);
      }  else {
      $('#btn-signup').prop('disabled', true);
      }  

    }else{


    jQuery.ajax({

       type: "POST",
       url: "{{ URL::to('/') }}/usernameCheck",
       data: 'username='+ username,
       headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
       cache: false,
       success: function(response){
        
                          if(response == 1){
                              $('#username').css('border', '3px #C33 solid'); 
                              $("#divUsernamelValid").html("<i class=\"fa fa-times fa-2x\" style=\"color:red\"></i> That username's taken");
                              //$('#ok').hide();
                              //$('#taken').fadeIn();
                              enableSubmitUsername = 0;
                              //alert("xxx");
                              }else{
                              $('#username').css('border', '3px #090 solid');
                              $("#divUsernamelValid").html("<i class=\"fa fa-check fa-2x\" style=\"color:green\"></i> You can have that");
                              //$('#taken').hide();
                              //$('#ok').fadeIn();
                              enableSubmitUsername = 1;
                              //alert("yyy");
                                   }

                                  if (enableSubmitEmail == 1 && enableSubmitUsername == 1 && enableSubmitPassword == 1){
                                   $('#btn-signup').prop('disabled', false);
                                   }  else {
                                   $('#btn-signup').prop('disabled', true);
                                   }  

 

                            }
                });
         }

      
      

      //alert(enableSubmitEmail);
}

</script>