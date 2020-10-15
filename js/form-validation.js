
$(document).ready(function() {
   $.validator.addMethod("EMAIL", function(value, element) {
                return this.optional(element) || /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/i.test(value);
            }, "Email Address is invalid: Please enter valid email address.");
   $.validator.addMethod("PASSWORD",function(value,element){
                return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/i.test(value);
            },"Passwords are 8-16 characters with uppercase letters, lowercase letters and at least one number.");

  
  $("form[name='registration']").validate({
    
    rules: {

      firstname: {
        required:true,
        minlength:2
      },

      lastname: {
        required:true,
        minlength:2
      },

      email:"required EMAIL",
     
      contact: {
        required: true,
        number:true,
        
        minlength: 10,
        maxlength:10
      },
      
      password: "required PASSWORD",
      confirmpassword: {
        required: true,
       
        equalTo:"#password"
      }
    },
    
    messages: {
      firstname:{ 
        required:"Please enter your firstname",
        minlength:"firstname is incomplete"
    },
      lastname:{ 
        required:"Please enter your lastname",
        minlength:"lastename is incomplete"
    },
      contact: {
        required:"Please enter your contact",
        number:"contact must be in digits",
        minlength:"contact is less than 10 digit",
        maxlength:"contact exceeded 10 digit"
      },

      password: {
        required: "Please provide a password",
       
      },
      confirmpassword: {
        required: "Please provide a password",
       
        equalTo:"password and confirm password must be same"
      },

     
    },


   
    
    submitHandler: function(form) {
      form.submit(alert("succesfully submitted"));

      
      }
  });



});

