$(document).ready(function() {
	$(document).on('click', '.deleteorderBtn', function(){
		var orderId = $(this).attr("orderid");
		if(confirm("Are you sure to delete this record?")){
	      	$.ajax({
	        'url':'orderdelete.php',
	        'method':'post',
	        'data':{'orderId':orderId},
	        'success':function(response){
		            if(response == 1){
		              window.location.href = 'orders.php';
		            }
	        	}
	    	});
		}
	});
});