<?php

/**
 * @Author: Aaron Segbedzi
 * @Date:   2018-04-10 17:55:25
 * @Last Modified by:   Aaron Segbedzi
 * @Last Modified time: 2018-04-18 00:09:43
 */

session_start();
require $_SERVER['DOCUMENT_ROOT'].'/include/roles/manager.php';
require $_SERVER['DOCUMENT_ROOT'].'/include/config.php';
define('pageTitle', 'Readings');
define('pageSection', 'Administrator Console');
define('pageDescription', 'This page show readings only in your filling station.');
?>
<!DOCTYPE html>
<html lang="en">
  <head>  
    <!-- Begin: head css -->
    <?php function HeadContent() { ?>
    <link href="/assets/css/jquery.dataTables.css" rel="stylesheet">
    <?php } require $_SERVER['DOCUMENT_ROOT'].'/include/layouts/head.php'; ?>
    <!-- End: head css -->
  </head>
  <body>
    <!-- Begin: left sidebar -->
    <?php require $_SERVER['DOCUMENT_ROOT'].'/include/layouts/left_sidebar.php'; ?>
    <!-- End: left sidebar -->
    <!-- Begin: header -->
    <?php require $_SERVER['DOCUMENT_ROOT'].'/include/layouts/header.php'; ?>
    <!-- End: header -->
    <!-- Begin: right sidebar -->
    <?php require $_SERVER['DOCUMENT_ROOT'].'/include/layouts/right_sidebar.php'; ?>   
    <!-- End: right sidebar -->
    <!-- Begin: page-content -->
    <?php function BodyContent() { ?>
    <div class="br-section-wrapper rounded-bottom-0">
      <div class="row">
        <div class="col-lg-12">
          <div class="table-wrapper" >
            <table id="table" class="table table-bordered table-hover table-responsive text-center">
              <thead>
                <tr>
                  <th>#&nbsp;ID</th>
                  <th><i class="fa fa-calculator"></i>&nbsp;Value</th>
                  <th><i class="fa fa-calendar"></i>&nbsp;DateTime</th>
                  <th><i class="fa fa-sort-numeric-down"></i>&nbsp;Tank UID</th>
                </tr>
              </thead>
            </table>
          </div><!-- table-wrapper -->
        </div>
      </div>
    </div>
    <!-- section -->
    <?php } require $_SERVER['DOCUMENT_ROOT'].'/include/layouts/main.php'; ?>  
    <!-- End: page-content -->
    <!-- Begin: footer -->
    <?php function FootContent() { ?>
    <script src="/assets/vendor/dataTable/jquery.dataTables.js"></script>
    <script src="/assets/vendor/dataTable/dataTables.responsive.js"></script>
    <script src="/assets/js/pages/manager/reading.js"></script>
    <?php } require $_SERVER['DOCUMENT_ROOT'].'/include/layouts/footer.php'; ?>
    <!-- End: footer -->
  </body>
</html>