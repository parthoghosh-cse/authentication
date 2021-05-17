(function($){
  $(document).ready(function(){

    /**
     * User Registration system
     */

    $('#user_reg_form').submit(function(e){
        e.preventDefault();

       
        
        let name = $('#user_reg_form input[name="name"]').val();
        let email = $('#user_reg_form input[email="email"]').val();
        let password = $('#user_reg_form input[password="password"]').val();
       
       if(name==''|| email == '' || password ==''){

        $('.msg').html(validate('All fields are required'));
    
       } else{

         $.ajax({
          url:'inc/ajax_template/add_user.php',
          method:'POST',
          data: new FormData(this),
          contentType:false,
          processData:false,
          success:function(data){
            $('.msg').html(validate('User registration successful !','success'));
            
            $('#user_reg_form')[0].reset();
            console.log(data);
          }

         });
        
       }
       
    });

$('#reg_email').keyup(function(){

  let email=$(this).val();

  $.ajax({
    url:'inc/ajax_template/email_check.php',
    method:'POST',
    data:{
      email:email
    },
    success:function(data){

      if(data!=null) {
     
        $('#reg_email_notice').html(data);

      }else {
        $('#reg_email_notice').html('');
      }
     

    }

  });



});



  });

})(jQuery)