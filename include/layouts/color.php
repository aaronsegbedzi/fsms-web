<?php

/**
 * @Author: Aaron Segbedzi
 * @Date:   2018-03-18 11:36:13
 * @Last Modified by:   Aaron Segbedzi
 * @Last Modified time: 2018-04-18 20:19:43
 */

	$path = $_SERVER['DOCUMENT_ROOT'].'/assets/css/custom.css';
	
	if (unlink($path)) {
		
		$file = fopen($path, 'w') or exit( http_response_code(500) );
		
		$css = ':root { --primary-color: '.$_POST['primary'].'; --secondary-color: '.$_POST['secondary'].'; --tetiary-color: '.$_POST['tetiary'].'; }';
		
		if (fwrite($file, $css)) {

			if (fclose($file)) {

				return http_response_code(200);

			} else { return http_response_code(500); } 

		} else { return http_response_code(500); } 

	} else { return http_response_code(500); }

?>