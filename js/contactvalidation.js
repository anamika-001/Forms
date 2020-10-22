

$(document).ready(function() {
  $.validator.addMethod("EMAIL", function(value, element) {
                return this.optional(element) || /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/i.test(value);
            }, "Email Address is invalid: Please enter valid email address.");

  $("form[name='contact']").validate({
    
    rules: {
    
      fullname: {
        required:true,
        minlength:2
      },
  

      email:"required EMAIL",
        

      message:{
        required:true,
        minlength:20
      }
    },
    
    messages: {
      fullname:{
        required:"Please enter your name",
        minlength:"name is incomplete"
        },
     
       
      email: "Please enter a valid email address",
       message: {
        required:"Please add your query",
        minlength:"elaborate little more"
    },
    },
  
      submitHandler:function formSubmit(){
        $.ajax({
            type:'POST',
            url:'js/configcontact.php',
            data:$('#registerform').serialize(),
            success:function(response){
                $('#success').html(response);
            }
        });
        var form=document.getElementById('registerform').reset();
        return false;
    }
    });


 
});