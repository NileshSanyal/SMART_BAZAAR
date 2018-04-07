
$(document).ready(function() {
  jQuery.ajaxSetup({
    'beforeSend': function(){
      jQuery('.loader').show();
    },
    'complete': function(){
      jQuery('.loader').hide();
    }
  });
	/**************PRODUCT VALIDATION**********/
	$('#productadderr').css('display','none');
  $('#savecatBtn').prop("disabled",false);
  $('#editcatBtn').prop("disabled",false);


  //$(document).on('click', '#saveproductBtn', function(e){
  
  $(document).on('submit', '#addProductfrm', function(e){
    e.preventDefault();
    var errors = '';
    var status = '';
    var productname = $('#productnamefield').val();
    productname = $.trim(productname);
    var productprice = $('#productpricefield').val();
    productprice = $.trim(productprice);
    var productdesc = $('#product-description').val();
    productdesc = $.trim(productdesc);
    var productimage = $('#prodImage').val();
    var productstock = $('#productstockfield').val();
    var productstatus = $('#productstatus').val();
    productstock = $.trim(productstock);


    if(productname == ""){
      errors += "Product name can't be left empty!<br/>";
      $('#productadderr').css('display','block');
      $('#productadderr').html(errors);
      status = false;
    }
    if(productprice == ""){
      errors += "Product price can't be left empty!<br/>";
      $('#productadderr').css('display','block');
      $('#productadderr').html(errors);
      status = false;
    }
    if(productdesc == ""){
      errors += "Product description can't be left empty!<br/>";
      $('#productadderr').css('display','block');
      $('#productadderr').html(errors);
      status = false; 
    }
    if(productstock == ""){
      errors += "Product stock can't be left empty!<br/>";
      $('#productadderr').css('display','block');
      $('#productadderr').html(errors);
      status = false; 
    }
    if(productimage == ""){
      errors += "Product Image must be selected!<br/>";
      $('#productadderr').css('display','block');
      $('#productadderr').html(errors);
      status = false; 
    }
    else{
      //user uploaded image
      var productimagefilesize = $("#prodImage")[0].files[0].size;

      var ext = $('#prodImage').val().split('.').pop().toLowerCase();
      if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
          errors += "Invalid Image format selected!<br/>";
          $('#productadderr').css('display','block');
          $('#productadderr').html(errors);
          status = false; 
      }
      // checking if uploaded image file size is not greater than or equal to 600KB
      if(productimagefilesize/1024 >=600){
        errors += "Image size must be less than 600KB!<br/>";
          $('#productadderr').css('display','block');
          $('#productadderr').html(errors);
          status = false; 
      } 
    }
    if(errors == ""){
        status = true;
        $('#productadderr').css('display','none');
    }
    if(status != false){
      $.ajax({
        url:'productadd.php',
        method:'post',
        contentType: false,
        cache: false,
        processData:false,
        data: new FormData(this),
        success:function(response){
            if(response == 1){
              $('#saveproductBtn').prop("disabled",true);
              //redirect to the category listing page
              window.location.href = 'products.php';
            }
        }

      });
    }
  });

  $(document).on('submit', '#editProductfrm', function(e){
    e.preventDefault();
    var errors = '';
    var status = '';
    var productname = $('#productnamefield').val();
    productname = $.trim(productname);
    var productprice = $('#productpricefield').val();
    productprice = $.trim(productprice);
    var productdesc = $('#product-description').val();
    productdesc = $.trim(productdesc);
    var productimage = $('#prodImage').val();
    var productstock = $('#productstockfield').val();
    var productstatus = $('#productstatus').val();
    productstock = $.trim(productstock);


    if(productname == ""){
      errors += "Product name can't be left empty!<br/>";
      $('#productadderr').css('display','block');
      $('#productadderr').html(errors);
      status = false;
    }
    if(productprice == ""){
      errors += "Product price can't be left empty!<br/>";
      $('#productadderr').css('display','block');
      $('#productadderr').html(errors);
      status = false;
    }
    if(productdesc == ""){
      errors += "Product description can't be left empty!<br/>";
      $('#productadderr').css('display','block');
      $('#productadderr').html(errors);
      status = false; 
    }
    if(productstock == ""){
      errors += "Product stock can't be left empty!<br/>";
      $('#productadderr').css('display','block');
      $('#productadderr').html(errors);
      status = false; 
    }
    if(productimage != ""){
      //user uploaded image
      var productimagefilesize = $("#prodImage")[0].files[0].size;

      var ext = $('#prodImage').val().split('.').pop().toLowerCase();
      if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
          errors += "Invalid Image format selected!<br/>";
          $('#productadderr').css('display','block');
          $('#productadderr').html(errors);
          status = false; 
      }
      // checking if uploaded image file size is not greater than or equal to 600KB
      if(productimagefilesize/1024 >=600){
        errors += "Image size must be less than 600KB!<br/>";
          $('#productadderr').css('display','block');
          $('#productadderr').html(errors);
          status = false; 
      } 
    }
    if(errors == ""){
        status = true;
        $('#productadderr').css('display','none');
    }
    if(status != false){
      $.ajax({
        url:'productedit.php',
        method:'post',
        contentType: false,
        cache: false,
        processData:false,
        data: new FormData(this),
        success:function(response){
            if(response == 1){
              $('#editproductBtn').prop("disabled",true);
              //redirect to the product listing page
              window.location.href = 'products.php';
            }
        }

      });
    }
  });

  $(document).on('click', '.deleteprodBtn', function(){
    var prodId = $(this).attr("prodid");
    if(confirm("Are you sure to delete this record?")){
      $.ajax({
        'url':'productdelete.php',
        'method':'post',
        'data':{'prodId':prodId},
        'success':function(response){
            if(response == 1){
              //redirect to the product listing page
              window.location.href = 'products.php';
            }
        }

      });
    }
  });

  function preventNumberInput(e) {
    var keyCode = (e.keyCode ? e.keyCode : e.which);
    if (keyCode > 47 && keyCode < 58) {
      toastr.warning('Numbers are not allowed in this field!');
      e.preventDefault();
    }
  }

  function preventSpecialCharacterInput(e){
    var keyCode = (e.keyCode ? e.keyCode : e.which);
    if (keyCode >= 33 && keyCode <= 47 || keyCode == 158 || keyCode == 159 || keyCode >=59 && keyCode <=64 || keyCode >=91 && keyCode <=96 || keyCode>=123 && keyCode <=126 ) {
      toastr.warning('Special characters are not allowed in this field!');
      e.preventDefault();
    }  
  }

  function preventTextInput(e){
   var keyCode = (e.keyCode ? e.keyCode : e.which);
    if (keyCode >= 65 && keyCode <= 90 || keyCode >= 97 && keyCode <= 122 ) {
      toastr.warning('Alphabets are not allowed in this field!');
      e.preventDefault();
    } 
  }
   $('#productnamefield').keypress(function(e) {
    
    preventSpecialCharacterInput(e);
  });
   $('#productpricefield').keypress(function(e){
    preventTextInput(e);
    preventSpecialCharacterInput(e);
   });

   $('#productstockfield').keypress(function(e){
    preventTextInput(e);
    preventSpecialCharacterInput(e);
   });

});