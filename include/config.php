<?php

/**
 * @Author: Aaron Segbedzi
 * @Date:   2018-02-24 15:09:33
 * @Last Modified by:   Aaron Segbedzi
 * @Last Modified time: 2018-04-17 23:57:15
 */

$_CONFIG = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/include/config.ini',true);
define('secreteKey', $_CONFIG['api']['key']);
define('companyName', $_CONFIG['company']['name']);
define('companyDomain', $_CONFIG['company']['domain']);
?>