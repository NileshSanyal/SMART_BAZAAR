$(document).ready(function() {
	$(document).on('click', '.deleteclientBtn', function(){
		var clientid = $(this).attr("clientid");
		if(confirm("Are you sure to delete this record?")){
	      	$.ajax({
	        'url':'clientdelete.php',
	        'method':'post',
	        'data':{'clientid':clientid},
	        'success':function(response){
		            if(response == 1){
		              window.location.href = 'clients.php';
		            }
	        	}
	    	});
		}
	});
});