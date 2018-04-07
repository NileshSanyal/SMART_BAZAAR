$(document).ready(function() {
	jQuery.ajaxSetup({
	    'beforeSend': function(){
	      jQuery('.loader').show();
	    },
	    'complete': function(){
	      jQuery('.loader').hide();
	    }
  	});
	$('#loginerr').css('display','none');
	$(document).on('submit','#frontloginfrm', function(e){	
		e.preventDefault();
	    var errors = '';
	    var status = '';

	    var email = $('#uemail').val();
	    email = $.trim(email);
	    var emailRegexp = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

	    var password = $('#upassword').val();
	    password = $.trim(password);
	    var passwordlength = password.length;

	    if(email == ""){
	      errors += "Email can't be left empty!<br/>";
	      $('#loginerr').css('display','block');
	      $('#loginerr').html(errors);
	      status = false;
	    }
	    else{
	      if(!emailRegexp.test(email)){
	          errors += "Invalid Email address!<br/>";
	          $('#signuperr').css('display','block');
	          $('#signuperr').html(errors);
	          status = false;
	      }
	    }
	    if(password == ""){
	      errors += "Password can't be left empty!<br/>"; 
	      $('#loginerr').css('display','block');
	      $('#loginerr').html(errors);
	      status = false;
	    }
	    else{
	    	if(passwordlength <=4){
	    		errors += "Password must have more than 4 characters!<br/>";
	    		$('#loginerr').css('display','block');
	    		$('#loginerr').html(errors);
	    		status = false;
	    	}
	    }

	    if(errors == ""){
	      status = true;
	      errors = "";
	      
	      $('#loginerr').css('display','none');
	    }

      	if(status != false){
      $.ajax({
        url:'loginuser.php',
        method:'post',
        processData: false,
        contentType: false,
        data: new FormData(this),
        success:function(response){
            if(response == 1){
              window.location.href = 'index.php';
            }
            else{
              errors += "Invalid email/password!<br/>";
              $('#loginerr').css('display','block');
              $('#loginerr').html(errors);
            }
        }

      });
    }
	});
});