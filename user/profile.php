<?php

/**
 * @Author: Aaron Segbedzi
 * @Date:   2018-03-13 14:47:57
 * @Last Modified by:   Aaron Segbedzi
 * @Last Modified time: 2018-04-16 13:37:56
 */

session_start();
require $_SERVER['DOCUMENT_ROOT'].'/include/roles/none.php';
require $_SERVER['DOCUMENT_ROOT'].'/include/config.php';
define('pageTitle', 'User Profile');
define('pageSection', 'User');
define('pageDescription', 'This page gives you a breif overview of your account information and settings, it includes features to edit account information.');
?>
<!DOCTYPE html>
<html lang="en">
  <head>  
    <!-- Begin: head css -->
    <?php function HeadContent() { ?>
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
    <div class="br-section-wrapper">
      <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10"><i class="icon ion-person"></i>&nbsp;Account Infomation
      </h6>
      <p>These fields are associated with your account, including the best place to reach you, and how you sign in.</p>
      <form id="user-form" class="form-layout form-layout-2">
        <input type="hidden" name="id">
        <input type="hidden" name="role">
        <input type="hidden" name="Stationid">
        <div class="row no-gutters">
          <div class="col-md-6">
            <div class="form-group">
              <label class="form-control-label">Firstname: 
                <span class="tx-danger">*
                </span>
              </label>
              <input class="form-control" name="firstName" placeholder="Enter firstname" type="text" required="true">
            </div>
          </div>
          <!-- col-6 -->
          <div class="col-md-6 mg-t--1 mg-md-t-0">
            <div class="form-group mg-md-l--1">
              <label class="form-control-label">Lastname: 
                <span class="tx-danger">*
                </span>
              </label>
              <input class="form-control" name="lastName" placeholder="Enter lastname" type="text">
            </div>
          </div>
          <!-- col-6 -->
        </div>
        <div class="row no-gutters">
          <div class="col-md-12 mg-t--1 mg-md-t-0">
            <div class="form-group mg-md-l--1">
              <label class="form-control-label">Username:
              </label>
              <input class="form-control" name="username"  type="text" readonly="true">
            </div>
          </div>
          <!-- col-12 -->
        </div>
        <div class="row no-gutters">
          <div class="col-md-6 mg-t--1 mg-md-t-0">
            <div class="form-group mg-md-l--1">
              <label class="form-control-label">Account Created:
              </label>
              <input class="form-control" name="createdAt"  type="text" readonly="true">
            </div>
          </div>
          <!-- col-6 -->
          <div class="col-md-6 mg-t--1 mg-md-t-0">
            <div class="form-group mg-md-l--1">
              <label class="form-control-label">Account Last Updated:
              </label>
              <input class="form-control" name="updatedAt"  type="text" readonly="true">
            </div>
          </div>
          <!-- col-6 -->
        </div>
        <!-- row -->
        <div class="form-layout-footer bd pd-20 bd-t-0">
          <button class="btn btn-success btn-with-icon" type="submit">
            <div class="ht-25">
              <span class="icon wd-40">
                <i class="fa fa-save fa-lg">
                </i>
              </span>
              <span class="pd-x-15 tx-12">Save
              </span>
            </div>
          </button>
          <button class="btn btn-danger btn-with-icon" type="reset">
            <div class="ht-25">
              <span class="icon wd-40">
                <i class="fa fa-trash fa-lg">
                </i>
              </span>
              <span class="pd-x-15 tx-12">Clear
              </span>
            </div>
          </button>
        </div>
        <!-- form-group -->
      </form>
    </div>
    <?php } require $_SERVER['DOCUMENT_ROOT'].'/include/layouts/main.php'; ?>  
    <!-- End: page-content -->
    <!-- Begin: footer -->
    <?php function FootContent() { ?>
    <script type="text/javascript" src="/assets/js/pages/user/profile.js">
    </script>
    <?php } require $_SERVER['DOCUMENT_ROOT'].'/include/layouts/footer.php'; ?>
    <!-- End: footer -->
  </body>
</html>