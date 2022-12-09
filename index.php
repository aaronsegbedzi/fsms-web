<?php
/**
 * @Author: Aaron Segbedzi
 * @Date:   2018-02-24 15:07:23
 * @Last Modified by:   Aaron Segbedzi
 * @Last Modified time: 2018-06-04 10:56:16
 */
session_start();
require($_SERVER['DOCUMENT_ROOT']."/include/roles/public.php"); 
require($_SERVER['DOCUMENT_ROOT']."/include/config.php"); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Begin: meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Aaron Segbedzi">
    <title>
      <?php echo companyName; ?> - Log in
    </title>
    <!-- End: meta tags -->
    <!-- Begin: vendor css -->
    <link href="/assets/vendor/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/assets/vendor/ionicons/css/ionicons.css" rel="stylesheet">
    <!-- End: vendor css -->
    <!-- Begin: global css -->
    <link rel="stylesheet" href="/assets/css/bracket.css">
    <link rel="stylesheet" href="/assets/css/custom.css">
    <link rel="icon" type="image/png" href="/assets/media/img/logo/icon.png?">
    <!-- End: global css -->
  </head>
  <body>
    <div class="d-flex align-items-center justify-content-center bg-corporate ht-100v">
      <div class="login-wrapper wd-300 wd-lg-400 wd-xs-400 pd-10 pd-xs-40 bg-white rounded shadow-base">
        <div class="signin-logo tx-center">
          <img src="/assets/media/img/logo/logo.png" width="35%">
        </div>
        <hr>
        <form id="login-form">
          <div class="form-group">
            <label class="form-control-label" for="username">Email: 
              <span class="tx-danger">*
              </span>
            </label>
            <div class="input-group ">
              <input type="text" class="form-control" placeholder="Enter your username" id="username" name="username" required="true" />
              <span class="input-group-addon tx-size-sm lh-2 tx-semibold">
                @<?php echo companyDomain; ?>
              </span>
            </div>
          </div>
          <!-- form-group -->
          <div class="form-group">
            <label class="form-control-label" for="password">Password: 
              <span class="tx-danger">*
              </span>
            </label>
            <div class="input-group">
              <input type="password" class="form-control" placeholder="Enter your password" id="password" name="password" required="true" />
              <span class="input-group-addon tx-size-sm lh-2">
                <a id="show_password" class="tx-20">
                  <i class="icon ion-eye-disabled">
                  </i>
                </a>
              </span>
            </div>
          </div>
          <!-- form-group -->
          <div class="form-group">
            <div class="row">
              <div class="wd-50p pd-r-15">
                <a href="/forgot_password.php" class="tx-12 d-block mg-t-10 text-center">Forgot password?
                </a>
              </div>
              <div class="wd-50p pd-r-15">
                <button type="submit" class="btn btn-corporate btn-block" id="btn-signin">Sign In
                </button>
              </div>
            </div>
          </div>
          <!-- form-group -->
        </form>
        <!-- form -->
        <div class="row">
          <div class="col-md-12" style="font-size: 10px !important;">
            <p class="text-center">Demonstration Credentials
              <br/>Administrator<br/>Username: admin | Password: 12345678
              <br/>Manager<br/>Username: manager | Password: 12345678
              <br/>Subscriber<br/>Username: subscriber | Password: 12345678
              <br/><br/>Created by Aaron S. Segbedzi
              <br/><a href="https://github.com/aaronsegbedzi">GitHub</a> | <a href="https://www.linkedin.com/in/aaronssegbedzi">LinkedIn</a>
            </p>
          </div>
        </div>       
      </div>
      <!-- login-wrapper -->
    </div>
    <!-- d-flex -->
    <!-- Begin: vendor scripts -->
    <script src="/assets/vendor/jquery/jquery.js">
    </script>
    <script src="/assets/vendor/popper/popper.js">
    </script>
    <script src="/assets/vendor/bootstrap/bootstrap.js">
    </script>
    <script src="/assets/vendor/sweetalert/sweetalert.min.js">
    </script>
    <!-- End: vendor scripts -->
    <!-- Begin: page scripts -->
    <script src="/assets/js/login.js">
    </script>
    <!-- End: page scripts -->
  </body>
</html>