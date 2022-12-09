<?php

/**
 * @Author: Aaron Segbedzi
 * @Date:   2018-04-16 12:31:27
 * @Last Modified by:   Aaron Segbedzi
 * @Last Modified time: 2018-04-18 00:22:48
 */

// If session role is not manager redirect to dashboard.
if ($_SESSION['role'] != '0' && $_SESSION['role'] != '1') { header("Location: /dashboard.php"); }

?>