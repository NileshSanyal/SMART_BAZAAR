$(document).ready(function() {
	$('#signuperr').css('display','none');
	$(document).on('click','#signupBtn', function(e){	
		e.preventDefault();
	    var errors = '';
	    var status = '';
    	var signUpData = new FormData();

	    var usrname = $('#usrname').val();
	    usrname = $.trim(usrname);
	    var usrnameRegexp = /^[A-Za-z\s]+$/;

	    var usrnamelength = usrname.length;

	    var email = $('#usremail').val();
	    email = $.trim(email);
	    var emailRegexp = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

	    var password = $('#usrpassword').val();
	    password = $.trim(password);
	    var passwordlength = password.length;

	    var mobileno = $('#mobile_num').val();
	    mobileno = $.trim(mobileno);

	    signUpData.append("uname",usrname);
	    signUpData.append("uemail",email);
	    signUpData.append("upass",password);
	    signUpData.append("umobile",mobileno);

	    if(usrname == ""){
	      errors += "Full name can't be left empty!<br/>";
	      $('#signuperr').html(errors);
	      status = false;
	     
	    }    
	    else{
	      if(usrnamelength <=3){
	        errors += "Full name must have more than 3 characters!<br/>";
	         $('#signuperr').html(errors);
	        $('#signuperr').css('display','block');
	        status = false;
	      }
	      if(!usrnameRegexp.test(usrname)){
	          errors += "User name can contain only alphabets!<br/>";
	          
	          $('#signuperr').css('display','block');
	          $('#signuperr').html(errors);
	          status = false;
	      }
	    }
	    

	    if(email == ""){
	      errors += "Email can't be left empty!<br/>";
	      $('#signuperr').css('display','block');
	      $('#signuperr').html(errors);
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
	      $('#signuperr').css('display','block');
	      $('#signuperr').html(errors);
	      status = false;
	    }
	    else{
	    	if(passwordlength <=4){
	    		errors += "Password must have more than 4 characters!<br/>";
	    		$('#signuperr').css('display','block');
	    		$('#signuperr').html(errors);
	    		status = false;
	    	}
	    }

	    if(mobileno == ""){
	    	errors += "Mobile number can't be left empty!<br/>";
	    	$('#signuperr').css('display','block');
	    	$('#signuperr').html(errors);
	    	status = false;
	    }
	    else{
	    	var mobileRegexp = /^(\+\d{1,3}[789]\d{9})|([789]\d{9})|([0]\d{9})$/;
	    	if(!mobileRegexp.test(mobileno)){
	    		errors += "Invalid Mobile number(enter number e.g, +91 8087339090, 0808733909, 8087339090, +91-8087339090)<br/>";
	    		$('#signuperr').css('display','block');
	    		$('#signuperr').html(errors);
	    		status = false;
	    	}
	    }
	    
	    if(errors == ""){
	      status = true;
	      errors = "";
	      
	      $('#signuperr').css('display','none');
	    }

      	if(status != false){
      $.ajax({
        url:'registeruser.php',
        method:'post',
        processData: false,
        contentType: false,
        dataType:"json",
        data: signUpData,
        success:function(response){
              if(response.success == '1'){	
              	window.location.href = 'index.php';
              }
              if(response.error == '1'){
            	errors += response.msg;
            	$('#signuperr').css('display','block');
                $('#signuperr').html(errors);
            }
        }

      });
    }
	});
});