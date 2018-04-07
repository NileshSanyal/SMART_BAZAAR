$(window, document, undefined).ready(function() {
  jQuery.ajaxSetup({
    'beforeSend': function(){
      jQuery('.loader').show();
    },
    'complete': function(){
      jQuery('.loader').hide();
    }
  });
  $('input').blur(function() {
    var $this = $(this);
    if ($this.val())
      $this.addClass('used');
    else
      $this.removeClass('used');
  });

  var $ripples = $('.ripples');

  $ripples.on('click.Ripples', function(e) {

    var $this = $(this);
    var $offset = $this.parent().offset();
    var $circle = $this.find('.ripplesCircle');

    var x = e.pageX - $offset.left;
    var y = e.pageY - $offset.top;

    $circle.css({
      top: y + 'px',
      left: x + 'px'
    });

    $this.addClass('is-active');

  });

  $ripples.on('animationend webkitAnimationEnd mozAnimationEnd oanimationend MSAnimationEnd', function(e) {
  	$(this).removeClass('is-active');
  });

  $('#registererr').css('display','none');

  /*********Showing Password Strength*************/
  $(document).on('keyup','#passwordfield', function(){
    var password = $('#passwordfield').val();
    password = $.trim(password);
    var passwordlength = password.length;
     if(passwordlength <= 3){
        toastr.warning('Password is weak');
      }
      else if(passwordlength >3 && passwordlength <=6){
         toastr.info('Password is medium');
      }
      else{
        toastr.success('Password is strong');
      } 
  });

  /*******Register validation**************/
  $(document).on('click', '#registerBtn', function(e){
    e.preventDefault();
    var errors = '';
    var status = '';
    
    var fullname = $('#fullnamefield').val();
    fullname = $.trim(fullname);
    var fullnameRegexp = /^[A-Za-z]+$/;

    var fullnamelength = fullname.length;

    var email = $('#emailfield').val();
    email = $.trim(email);
    var emailRegexp = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

    var password = $('#passwordfield').val();
    password = $.trim(password);
    var passwordlength = password.length;

    if(fullname == ""){
      errors += "Full name can't be left empty!<br/>";
      $('#registererr').css('display','block');
      $('#registererr').html(errors);
      status = false;
    }    
    else{
      if(fullnamelength <=3){
        errors += "Full name must have more than 3 characters!<br/>";
        $('#registererr').css('display','block');
        $('#registererr').html(errors);
        status = false;
      }
      if(!fullnameRegexp.test(fullname)){
          errors += "Full name can contain only alphabets!<br/>";
          $('#registererr').css('display','block');
          $('#registererr').html(errors);
          status = false;
      }
    }
    

    if(email == ""){
      errors += "Email can't be left empty!<br/>";
      $('#registererr').css('display','block');
      $('#registererr').html(errors);
      status = false;
    }
    else{
      if(!emailRegexp.test(email)){
          errors += "Invalid Email address!<br/>";
          $('#registererr').css('display','block');
          $('#registererr').html(errors);
          status = false;
      }
    }
    if(password == ""){
      errors += "Password can't be left empty!<br/>";
      $('#registererr').css('display','block');
      $('#registererr').html(errors);
      status = false;
    }
    
      if(errors == ""){
        status = true;
        errors = "";
        $('#registererr').css('display','none');
      }

    if(status != false){
      $.ajax({
        'url':'registercustomer.php',
        'method':'post',
        'data':{'fullname':fullname,'email':email, 'password':password},
        'success':function(response){
            if(response == 1){
              //redirect to the admin dashboard page
              window.location.href = 'dashboard.php';
            }
            else{
              
            }
        }

      });
    }
  });

});