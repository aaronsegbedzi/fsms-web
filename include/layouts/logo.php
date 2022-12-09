<?php

	try {
    
	    // Undefined | Multiple Files | $_FILES Corruption Attack
	    // If this request falls under any of them, treat it invalid.
	    if (!isset($_FILES['logo']['error']) || is_array($_FILES['logo']['error'])) {
	        return http_response_code(400);
	    }

	    // Check $_FILES['logo']['error'] value.
	    switch ($_FILES['logo']['error']) {
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
	    if ($_FILES['logo']['size'] > 1000000) {
	        return http_response_code(400);
	    }

	    // DO NOT TRUST $_FILES['logo']['mime'] VALUE !!
	    // Check MIME Type by yourself.
	    $finfo = new finfo(FILEINFO_MIME_TYPE);
	    if (false === $ext = array_search(
	        $finfo->file($_FILES['logo']['tmp_name']),
	        array(
	            'png' => 'image/png'
	        ),
	        true
	    )) {
	        return http_response_code(400);
	    }

	    if (file_exists($_SERVER['DOCUMENT_ROOT'].'/assets/media/img/logo/logo.png')) {
	    	unlink($_SERVER['DOCUMENT_ROOT'].'/assets/media/img/logo/logo.png');
	    }

	    // You should name it uniquely.
	    // DO NOT USE $_FILES['logo']['name'] WITHOUT ANY VALIDATION !!
	    // On this example, obtain safe unique name from its binary data.
	    if (!move_uploaded_file(
	        $_FILES['logo']['tmp_name'],
	        sprintf($_SERVER['DOCUMENT_ROOT'].'/assets/media/img/logo/logo.png',
	            sha1_file($_FILES['logo']['tmp_name']),
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