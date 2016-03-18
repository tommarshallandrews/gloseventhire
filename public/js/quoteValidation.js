<!-- Quoteform javascript -->
<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
$(document).ready(function() {

  $("#signupform").validate({
    rules: {
      email: {
        required: true
      },
      password: {
        required: true
      }
    },
    submitHandler: function(form) { // for demo 
      alert("data saved");
    }
  });


  $('#button1,.save').click(function() {
    $('[name="field3"], [name="field4"]').each(function() {
      $(this).rules('remove');
    });
    $("#signupform").submit(); // validation test only
  });

  $('#button2,.order').click(function() {
    $('[name="field3"], [name="field4"]').each(function() {
      $(this).rules('add', {
        required: true
      });
    });
    $("#signupform").submit(); // validate and submit
  });

});

});//]]> 

</script>