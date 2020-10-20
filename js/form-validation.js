
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


     submitHandler:function(event){
          var formData = {
              'firstname': $('input[name=firstname]').val(),
              'lastname': $('input[name=lastname]').val(),
              'email': $('input[name=email]').val(),
              'contact': $('input[name=contact]').val(),
              'password': $('input[name=password]').val(),
              'confirmpassword': $('input[name=confirmpassword]').val(),
              'description': $('textarea[name=description]').val(),
          };

         
          $.ajax({
              type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
              url         : 'form.php', // the url where we want to POST
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
   }
  });



  });

    // // -----------ajax------------------
    // $("#fform").on('submit', function(e){
    //       e.preventDefault();
    //       $.ajax({
    //           type: 'POST',
    //           url: 'submit.php',
    //           data: new FormData(this),
    //           dataType: 'json',
    //           contentType: false,
    //           cache: false,
    //           processData:false,
    //           beforeSend: function(){
                
    //               $('.submitbtn').attr("disabled","disabled");
    //               $('#fform').css("opacity",".5");
          
    //           },
               
    //           success: function(response){
                  
    //               $('.statusMsg').html('');
    //               if(response.status == 1){
    //                   $('#fform')[0].reset();
    //                   $('.statusMsg').html('<p class="alert alert-success">'+response.message+'</p>');
    //               }else{
    //                   $('.statusMsg').html('<p class="alert alert-danger">'+response.message+'</p>');
    //               }
    //               $('#fform').css("opacity","");
    //               $(".submitbtn").removeAttr("disabled");
    //           }

    //           error: function(error){
    //             console.log(error);
    //           }
    //       });
    //   });
    
    //   // File type validation
    //   var match = [ 'image/jpeg', 'image/png', 'image/jpg'];
    //   $("#file").change(function() {
    //       for(i=0;i<this.files.length;i++){
    //           var file = this.files[i];
    //           var fileType = file.type;
        
    //           if(!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]))){
    //               alert('Sorry, only JPG, JPEG, & PNG files are allowed to upload.');
    //               $("#file").val('');
    //               return false;
    //           }
    //       }
    //   });
