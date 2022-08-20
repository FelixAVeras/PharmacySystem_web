$(document).ready(function() {
	$('#btnSubmit').click(function() {
		debugger;

	 	var username = $('#username').val();
	 	var password = $('#password').val();
	 
		if($.trim(username).length > 0 && $.trim(password).length > 0) {
	  		$.ajax({
				url: "logincontroller.php",
				method: "POST",
				data: { username:username, password:password },
				cache: false,
	   			beforeSend: function(){
					$('#btnSubmit').val("Ingresando...");
	   			},
	   			success:function(data) {
					if(data) {
						location.href = 'dashboard.php'
		 				//$("body").load("dashboard.php").hide().fadeIn(1500);
					} else {
						
					}
	   			}
	  		});
	 	} else {}
	});
});