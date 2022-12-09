<?php
/**
 * @Author: Aaron Segbedzi
 * @Date:   2018-03-28 11:23:21
 * @Last Modified by:   Aaron Segbedzi
 * @Last Modified time: 2018-04-13 14:23:17
 */
	function config_read($config_file) {
		return parse_ini_file($config_file, true);
	}

	function config_set(&$config_data, $section, $key, $value) {
	    $config_data[$section][$key] = $value;
	}

	function config_write($config_data, $config_file) {
	    $new_content = '';
	    foreach ($config_data as $section => $section_content) {
	        $section_content = array_map(function($value, $key) {
	            return "$key=$value";
	        }, array_values($section_content), array_keys($section_content));
	        $section_content = implode("\n", $section_content);
	        $new_content .= "[$section]\n$section_content\n";
	    }
	    if(file_put_contents($config_file, $new_content)){
	    	return true;
	    } else { return false; }
	}

	if (isset($_POST['name']) && isset($_POST['domain'])) {

		$config_data = config_read($_SERVER['DOCUMENT_ROOT'].'/include/config.ini');

		config_set($config_data, "company", "name", $_POST['name']);

		config_set($config_data, "company", "domain", $_POST['domain']);

		if (config_write($config_data, $_SERVER['DOCUMENT_ROOT'].'/include/config.ini')) {

			return http_response_code(200);

		} else { return http_response_code(500); }

	} else { return http_response_code(400); }

?>