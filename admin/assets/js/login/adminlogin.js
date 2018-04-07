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

  /*******Login validation**************/
  $('#loginerr').css('display','none');
  $(document).on('click', '#loginBtn', function(e){
    e.preventDefault();
    var errors = '';
    var status = '';
    var email = $('#emailfield').val();
    email = $.trim(email);
    var emailRegexp = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    var password = $('#passwordfield').val();
    password = $.trim(password);
    if(email == ""){
      errors += "Email can't be left empty!<br/>";
      $('#loginerr').css('display','block');
      $('#loginerr').html(errors);
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
      $('#loginerr').css('display','block');
      $('#loginerr').html(errors);
      status = false;
    }
    if(errors == ""){
        status = true;
        errors = "";
        $('#loginerr').css('display','none');
    }
    if(status != false){
      $.ajax({
        'url':'verify.php',
        'method':'post',
        'data':{'email':email, 'password':password},
        'success':function(response){
            if(response == 1){
              //redirect to the admin dashboard page
              window.location.href = 'dashboard.php';
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