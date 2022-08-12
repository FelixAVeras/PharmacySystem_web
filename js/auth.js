$('#login-form').submit(function(e) {
	e.preventDefault();
	var response;

	var username = $('#username').val().trim();
	var password = $('#password').val().trim();

	if (username != '' && password != '') {
		$.ajax({
			url: './logincontroller.php',
			type: 'POST',
			data: { username: username, password: password },
			success: function(response) {
				if (response == 'validUser') {
					document.location = 'dashboard.php';
				} else {
					alert('los datos introducidos son incorrectos');
				}
			}
		});
	} else {
		document.location = 'login.php';
	}
});