<?php

include 'config/connection.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
	$username = mysqli_real_escape_string($connection, $_POST['username']);
	$password = mysqli_real_escape_string($connection, $_POST['password']);

	$userData = array();

	if ($username != '' && $password != '') {
		$sqlQuery = "SELECT * FROM usuario WHERE username='".$username."' and password='".$password."'";
		$result = mysqli_query($connection, $sqlQuery);
		$userData = mysqli_fetch_array($result);

		if (!empty($userData)) {
			$_SESSION['username'] = $username;
			echo 'validUser';
		} else {
			echo 'invalidUser';
		}
	}
}

?>