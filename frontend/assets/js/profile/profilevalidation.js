// need to modify for product validation and other ajax call
$(document).ready(function() {
  jQuery.ajaxSetup({
    'beforeSend': function(){
      jQuery('.loader').show();
    },
    'complete': function(){
      jQuery('.loader').hide();
    }
  });
	/**************PROFILE VALIDATION**********/
	$('#profileErr').css('display','none');
  $('#saveProfileBtn').prop("disabled",false);


  $(document).on('submit', '#moreInfofrm', function(e){
    e.preventDefault();
    var errors = '';
    var status = '';
    var username = $('#usernamefield').val();
    username = $.trim(username);
    var mobilenum = $('#mobilefield').val();
    mobilenum = $.trim(mobilenum);
    var useraddress = $('#userAddress').val();
    useraddress = $.trim(useraddress);


    if(username == ""){
      errors += "User name can't be left empty!<br/>";
      $('#profileErr').css('display','block');
      $('#profileErr').html(errors);
      status = false;
    }
    if(mobilenum == ""){
      errors += "Mobile number can't be left empty!<br/>";
      $('#profileErr').css('display','block');
      $('#profileErr').html(errors);
      status = false;
    }
    if(useraddress == ""){
      errors += "User address can't be left empty!<br/>";
      $('#profileErr').css('display','block'); 
      $('#profileErr').html(errors);
      status = false; 
    }
    if(errors == ""){
        status = true;
        $('#profileErr').css('display','none');
    }
    if(status != false){
      $.ajax({
        url:'update_profile.php',
        method:'post',
        contentType: false,
        cache: false,
        processData:false,
        data: new FormData(this),
        success:function(response){
            if(response == 1){
              $('#saveProfileBtn').prop("disabled",true);
              window.location.href = 'checkout.php';
            }
            else{
              $('#saveProfileBtn').prop("disabled",true);
              window.location.href = 'checkout.php';
            }
        }

      });
    }
  });

  $(document).on('submit', '#saveInfofrm', function(e){
    e.preventDefault();
    var errors = '';
    var status = '';
    var username = $('#usernamefield').val();
    username = $.trim(username);
    var mobilenum = $('#mobilefield').val();
    mobilenum = $.trim(mobilenum);
    var useraddress = $('#userAddress').val();
    useraddress = $.trim(useraddress);


    if(username == ""){
      errors += "User name can't be left empty!<br/>";
      $('#profileErr').css('display','block');
      $('#profileErr').html(errors);
      status = false;
    }
    if(mobilenum == ""){
      errors += "Mobile number can't be left empty!<br/>";
      $('#profileErr').css('display','block');
      $('#profileErr').html(errors);
      status = false;
    }
    if(useraddress == ""){
      errors += "User address can't be left empty!<br/>";
      $('#profileErr').css('display','block'); 
      $('#profileErr').html(errors);
      status = false; 
    }
    if(errors == ""){
        status = true;
        $('#profileErr').css('display','none');
    }
    if(status != false){
      $.ajax({
        url:'update_only_profile.php',
        method:'post',
        contentType: false,
        cache: false,
        processData:false,
        data: new FormData(this),
        success:function(response){
            if(response == 1){
              $('#saveProfileBtn').prop("disabled",true);
              window.location.href = 'index.php';
            }
            else{
              $('#saveProfileBtn').prop("disabled",true);
              window.location.href = 'index.php';
            }
        }

      });
    }
  });

});