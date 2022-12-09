<?php

/**
 * @Author: Aaron Segbedzi
 * @Date:   2018-03-10 12:23:35
 * @Last Modified by:   Aaron Segbedzi
 * @Last Modified time: 2018-04-17 23:57:56
 */

	session_start();
	require $_SERVER['DOCUMENT_ROOT'].'/include/vendor/autoload.php';
	require $_SERVER['DOCUMENT_ROOT'].'/include/config.php';
	use \Firebase\JWT\JWT;

	if (isset($_GET['token'])) {

		// Decode token key for payload data.
		try { $payload = JWT::decode($_GET['token'], secreteKey, array('HS256'));} 
		catch (Exception $e) { return false; }

		// Encode data to JSON standard format.
		$payload = json_encode($payload);

		// Decode JSON data from JSON standard format.
		$payload = json_decode($payload, true);

		// Set session variables.
		$_SESSION['role'] = $payload['role'];

		// Return JSON data to the client application.
		header("Content-type:application/json");
		echo json_encode(array($payload));

	} else {
		
		// Unset all of the session variables.
		$_SESSION = array();

		// Delete session cookies if it exists.
		if (ini_get("session.use_cookies")) {
		    $params = session_get_cookie_params();
		    setcookie(session_name(), '', time() - 42000,
		        $params["path"], $params["domain"],
		        $params["secure"], $params["httponly"]
		    );
		}

		// Destroy the session.
		session_destroy();
	}
?>