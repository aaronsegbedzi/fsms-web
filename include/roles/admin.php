<?php

/**
 * @Author: Aaron Segbedzi
 * @Date:   2018-03-17 21:52:02
 * @Last Modified by:   Aaron Segbedzi
 * @Last Modified time: 2018-04-16 12:31:45
 */
	
// If session role is not administator redirect to dashboard.
if ($_SESSION['role'] != '0') { header("Location: /dashboard.php"); }
	
?>