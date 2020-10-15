$(document).ready(function() {
  $.validator.addMethod("EMAIL", function(value, element) {
                return this.optional(element) || /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/i.test(value);
            }, "Email Address is invalid: Please enter valid email address.");


$('form').on("submit",function(event) {
      
         event.preventDefault( alert("submission intercepted"));
        var formData = {
            'name': $('input[name=fullname]').val(),
            'email': $('input[name=email]').val(),
            'message': $('textarea[name=message]').val()
        };

       
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'suggestions.php', // the url where we want to POST
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the server
            encode          : true,
       
            success:function(data){
              console.log(data);
              if(data.success==true){
                console.log('completed');

              }else{
                console.log('validation fail');

              }
            },
            error:function(error){
              console.log(error);
            }
          })

        return false;
       
    });

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
    
    submitHandler: function(form,event) {
         event.preventDefault();

     }
  });


});