<?php

/**
 * @Author: Aaron Segbedzi
 * @Date:   2018-03-18 13:13:15
 * @Last Modified by:   Aaron Segbedzi
 * @Last Modified time: 2018-04-17 23:45:25
 */

	try {
    
	    // Undefined | Multiple Files | $_FILES Corruption Attack
	    // If this request falls under any of them, treat it invalid.
	    if (!isset($_FILES['icon']['error']) || is_array($_FILES['icon']['error'])) {
	        return http_response_code(400);
	    }

	    // Check $_FILES['icon']['error'] value.
	    switch ($_FILES['icon']['error']) {
	        case UPLOAD_ERR_OK:
	            break;
	        case UPLOAD_ERR_NO_FILE:
	            return http_response_code(400);
	        case UPLOAD_ERR_INI_SIZE:
	        case UPLOAD_ERR_FORM_SIZE:
	            return http_response_code(400);
	        default:
	            return http_response_code(500);
	    }

	    // You should also check filesize here. 
	    if ($_FILES['icon']['size'] > 1000000) {
	        return http_response_code(400);
	    }

	    // DO NOT TRUST $_FILES['icon']['mime'] VALUE !!
	    // Check MIME Type by yourself.
	    $finfo = new finfo(FILEINFO_MIME_TYPE);
	    if (false === $ext = array_search(
	        $finfo->file($_FILES['icon']['tmp_name']),
	        array(
	            'png' => 'image/png'
	        ),
	        true
	    )) {
	        return http_response_code(400);
	    }

	    if (file_exists($_SERVER['DOCUMENT_ROOT'].'/assets/media/img/logo/icon.png')) {
	    	unlink($_SERVER['DOCUMENT_ROOT'].'/assets/media/img/logo/icon.png');
	    }

	    // You should name it uniquely.
	    // DO NOT USE $_FILES['icon']['name'] WITHOUT ANY VALIDATION !!
	    // On this example, obtain safe unique name from its binary data.
	    if (!move_uploaded_file(
	        $_FILES['icon']['tmp_name'],
	        sprintf($_SERVER['DOCUMENT_ROOT'].'/assets/media/img/logo/icon.png',
	            sha1_file($_FILES['icon']['tmp_name']),
	            $ext
	        )
	    )) {
	        return http_response_code(500);
	    }

	    return http_response_code(200);

	} catch (RuntimeException $e) {

	    return http_response_code(500);

	}

?>