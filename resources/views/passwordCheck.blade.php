<script type="text/javascript" >

function checkPasswordLength() {
    var password = $("#txtNewPassword").val();

    if(password == "" || password.length < 6){
        $("#divCheckPasswordLength").html("<i class=\"fa fa-times fa-2x\" style=\"color:red\"></i> At lease 6 characters please");
        $('#txtNewPassword').css('border', '3px #C33 solid');
        $('#txtConfirmPassword').prop('disabled', true);
        
    }else{
        $("#divCheckPasswordLength").html("<i class=\"fa fa-check fa-2x\" style=\"color:green\"></i> That's OK");
        $('#txtNewPassword').css('border', '3px #090 solid');
        $('#txtConfirmPassword').prop('disabled', false);
      }
}

$(document).ready(function () {
   $("#txtNewPassword").keyup(checkPasswordLength);
});


function checkPasswordMatch() {
    var password = $("#txtNewPassword").val();
    var confirmPassword = $("#txtConfirmPassword").val();

    if (password != confirmPassword){
      $("#divCheckPasswordMatch").html("<i class=\"fa fa-times fa-2x\" style=\"color:red\"></i> Passwords don't match");
      $('#txtConfirmPassword').css('border', '3px #C33 solid');
        enableSubmitPassword = 0;
      }
    else{
      $("#divCheckPasswordMatch").html("<i class=\"fa fa-check fa-2x\" style=\"color:green\"></i> Passwords match.");
      $('#txtConfirmPassword').css('border', '3px #090 solid');
        enableSubmitPassword = 1;
      }


      if (enableSubmitEmail == 1 && enableSubmitUsername == 1 && enableSubmitPassword == 1){
      $('#btn-signup').prop('disabled', false);
       }  else {
       $('#btn-signup').prop('disabled', true);
       } 
}

$(document).ready(function () {
   $("#txtConfirmPassword").keyup(checkPasswordMatch);
});


$(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});

</script>