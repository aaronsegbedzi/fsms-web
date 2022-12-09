<?php

/**
 * @Author: Aaron Segbedzi
 * @Date:   2018-04-16 12:31:27
 * @Last Modified by:   Aaron Segbedzi
 * @Last Modified time: 2018-04-16 13:28:34
 */

// If session role is not set redirect to dashboard.
if (!isset($_SESSION['role'])) { header("Location: /index.php"); }

?>