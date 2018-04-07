$(document).ready(function() {
  jQuery.ajaxSetup({
    'beforeSend': function(){
      jQuery('.loader').show();
    },
    'complete': function(){
      jQuery('.loader').hide();
    }
  });
	/**************CATEGORY VALIDATION**********/
	$('#categoryadderr').css('display','none');
  $('#savecatBtn').prop("disabled",false);
  $('#editcatBtn').prop("disabled",false);
  $(document).on('click', '#savecatBtn', function(e){
    e.preventDefault();
    var errors = '';
    var status = '';
    var catname = $('#catnamefield').val();
    catname = $.trim(catname);
    var catstatus = $('#catstatus').val();
    if(catname == ""){
      errors += "Category name can't be left empty!<br/>";
      $('#categoryadderr').css('display','block');
      $('#categoryadderr').html(errors);
      status = false;
    }
    if(errors == ""){
        status = true;
        errors = "";
        $('#registererr').css('display','none');
    }
    if(status != false){
      $.ajax({
        'url':'categoryadd.php',
        'method':'post',
        'data':{'catname':catname, 'catstatus':catstatus},
        'success':function(response){
            if(response == 1){
              $('#savecatBtn').prop("disabled",true);
              //redirect to the category listing page
              window.location.href = 'categories.php';
            }
        }

      });
    }
  });

  $(document).on('click', '#editcatBtn', function(e){
     e.preventDefault();
    var errors = '';
    var status = '';
    var catname = $('#catnamefield').val();
    catname = $.trim(catname);
    var catstatus = $('#catstatus').val();
    var catId = $('#catid').val();
    if(catname == ""){
      errors += "Category name can't be left empty!<br/>";
      $('#categoryadderr').css('display','block');
      $('#categoryadderr').html(errors);
      status = false;
    }
    if(errors == ""){
        status = true;
        errors = "";
        $('#categoryadderr').css('display','none');
    }
    if(status != false && catId !=''){
      $.ajax({
        'url':'categoryedit.php',
        'method':'post',
        'data':{'catname':catname, 'catstatus':catstatus, 'catId':catId},
        'success':function(response){
            if(response == 1){
              $('#editcatBtn').prop("disabled",true);
              //redirect to the category listing page
              window.location.href = 'categories.php';
            }
        }

      });
    }
  });

  $(document).on('click', '.deletecatBtn', function(){
    var catId = $(this).attr("catid");
    if(confirm("Are you sure to delete this record?")){
      $.ajax({
        'url':'categorydelete.php',
        'method':'post',
        'data':{'catid':catId},
        'success':function(response){
            if(response == 1){
              //redirect to the category listing page
              window.location.href = 'categories.php';
            }
        }

      });
    }
  });

  function preventNumberInput(e) {
    var keyCode = (e.keyCode ? e.keyCode : e.which);
    if (keyCode > 47 && keyCode < 58) {
      toastr.warning('Numers are not allowed in category name field!');
      e.preventDefault();
    }
  }

  function preventSpecialCharacterInput(e){
    var keyCode = (e.keyCode ? e.keyCode : e.which);
    if (keyCode >= 33 && keyCode <= 47 || keyCode == 158 || keyCode == 159 || keyCode >=59 && keyCode <=64 || keyCode >=91 && keyCode <=96 || keyCode>=123 && keyCode <=126 ) {
      toastr.warning('Special characters are not allowed in category name field!');
      e.preventDefault();
    }  
  }
   $('#catnamefield').keypress(function(e) {
    preventNumberInput(e);
    preventSpecialCharacterInput(e);
  });

});