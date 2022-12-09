<?php

/**
 * @Author: Aaron Segbedzi
 * @Date:   2018-03-13 16:15:54
 * @Last Modified by:   Aaron Segbedzi
 * @Last Modified time: 2018-04-17 20:32:20
 */

session_start();
require $_SERVER['DOCUMENT_ROOT'].'/include/roles/none.php';
require $_SERVER['DOCUMENT_ROOT'].'/include/config.php';
define('pageTitle', 'Security Information');
define('pageSection', 'User');
define('pageDescription', 'This page lets you manage your security settings and information, it includes features to edit password and security information.');
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
    <div class="br-section-wrapper rounded-bottom-0 mg-t-30">
      <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">
        <i class="icon ion-locked">
        </i>&nbsp;Change Your Password
      </h6>
      <p>These fields are associated with your account, including your password.
      </p>
      <span id="alert">
      </span>
      <form id="password-form" class="form-layout form-layout-2">
        <div class="row no-gutters">
          <input name="username" type="hidden">
          <div class="col-md-4">
            <div class="form-group">
              <label class="form-control-label">Old Password: 
                <span class="tx-danger">*
                </span>
              </label>
              <input class="form-control" name="opassword" placeholder="Enter Old Password" type="password" required="true">
            </div>
          </div>
          <!-- col-4 -->
          <div class="col-md-4 mg-t--1 mg-md-t-0">
            <div class="form-group mg-md-l--1">
              <label class="form-control-label">New Password: 
                <span class="tx-danger">*
                </span>
              </label>
              <input class="form-control" name="npassword" placeholder="Enter New Password" type="password" required="true">
            </div>
          </div>
          <!-- col-4 -->
          <div class="col-md-4 mg-t--1 mg-md-t-0">
            <div class="form-group mg-md-l--1">
              <label class="form-control-label">Confirm Password: 
                <span class="tx-danger">*
                </span>
              </label>
              <input class="form-control" name="cpassword" placeholder="Confirm Password" type="password" required="true">
            </div>
          </div>
          <!-- col-4 -->
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
    <div class="br-section-wrapper rounded-bottom-0 mg-t-30">
      <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">
        <i class="icon ion-locked">
        </i>&nbsp;Change Your Security Information
      </h6>
      <p>These fields are associated with your account, including your security question and answer for account recovery.
      </p>
      <form id="security-form" class="form-layout form-layout-2">
        <div class="row no-gutters">
          <input name="username" type="hidden">
          <div class="col-md-6">
            <div class="form-group mg-md-l--1">
              <label class="form-control-label mg-b-0-force" for="security_question">Security Question:
                <span class="tx-danger">*
                </span> 
              </label>
              <select class="form-control select2-show-search" data-placeholder="Choose Security Question" name="security_question" required="true">
                <option label="Choose Security Question">
                </option>
                <option value="whatisthenameofyourfavoritepet?">What is the name of your favorite pet?
                </option>
                <option value="whatcitywereyoubornin?">What city were you born in?
                </option>
                <option value="whathighschooldidyouattend?">What high school did you attend?
                </option>
                <option value="whatisthenameofyourfirstschool?">What is the name of your first school?
                </option>
                <option value="whatisyourfavoritemovie?">What is your favorite movie?
                </option>
                <option value="whatisyourmothersname?">What is your mothers name?
                </option>
                <option value="whatisyourfavoritecolor?">What is your favorite color?
                </option>
                <option value="whatisyourfathersmiddlename?">What is your fathers middle name?
                </option>
              </select>
            </div>
          </div>
          <!-- col-6 -->
          <div class="col-md-6">
            <div class="form-group">
              <label class="form-control-label" for="security_answer">Security Answer: 
                <span class="tx-danger">*
                </span>
              </label>
              <input class="form-control" name="security_answer" placeholder="Enter your security answer here." type="text" required="true">
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
    <script type="text/javascript" src="/assets/js/pages/user/password.js">
    </script>
    <?php } require $_SERVER['DOCUMENT_ROOT'].'/include/layouts/footer.php'; ?>
    <!-- End: footer -->
  </body>
</html>