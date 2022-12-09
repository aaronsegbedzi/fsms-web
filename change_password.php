<?php

/**
 * @Author: Aaron Segbedzi
 * @Date:   2018-02-24 15:07:23
 * @Last Modified by:   Aaron Segbedzi
 * @Last Modified time: 2018-04-17 21:35:09
 */

session_start();
require($_SERVER['DOCUMENT_ROOT']."/include/roles/public.php"); 
require($_SERVER['DOCUMENT_ROOT']."/include/config.php");
if (!isset($_GET['username']) || empty($_GET['username'])) { header("Location: /index.php"); }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Begin: meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Aaron Senanu Segbedzi">
    <title>
      <?php echo companyName; ?> - Change Your Password
    </title>
    <!-- End: meta tags -->
    <!-- Begin: vendor css -->
    <link href="/assets/vendor/font-awesome/css/fontawesome-all.css" rel="stylesheet">
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
        <div class="signin-logo">
          <img class="img-fluid" src="/assets/media/img/logo/logo.png">
        </div>
        <hr>
        <div class="alert alert-bordered alert-info" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×
            </span>
          </button>
          <strong class="d-block d-sm-inline-block-force">Welcome 
            <?php echo $_GET['username']; ?>,
          </strong>
          Please provide the following information below and we'll help you log into you account.
        </div>
        <form id="password-form">
          <input type="hidden" class="form-control"  id="username" name="username" value="<?php echo $_GET['username']; ?>" required />
          <div class="form-group">
            <label class="form-control-label" for="opassword">Old Password: 
              <span class="tx-danger">*
              </span>
            </label>
            <div class="input-group ">
              <input type="password" class="form-control" placeholder="Enter your old password"  id="opassword" name="opassword" required />
            </div>
          </div>
          <!-- form-group -->
          <div class="form-group">
            <label class="form-control-label" for="npassword">New Password: 
              <span class="tx-danger">*
              </span> 
            </label>
            <div class="input-group ">
              <input type="password" class="form-control" placeholder="Enter your new password"  id="npassword" name="npassword" required />
            </div>
          </div>
          <!-- form-group -->
          <div class="form-group">
            <label class="form-control-label" for="cpassword">Confirm Password: 
              <span class="tx-danger">*
              </span>
            </label>
            <div class="input-group ">
              <input type="password" class="form-control" placeholder="Enter your confim password"  id="cpassword" name="cpassword" required />
            </div>
          </div>
          <!-- form-group -->
          <div class="form-group pull-right">
            <div class="btn-group" role="group">
              <button type="submit" class="btn btn-success btn-with-icon">
                <div class="ht-40 justify-content-between">
                  <span class="icon wd-40"><i class="fa fa-save"></i></span>
                  <span class="pd-x-30">Save</span>
                </div>
              </button>
              <button type="reset" class="btn btn-danger btn-with-icon">
                <div class="ht-40 justify-content-between">
                  <span class="icon wd-40"><i class="fa fa-redo"></i></span>
                  <span class="pd-x-30">Reset</span>
                </div>
              </button>
            </div>
          </div>
          <!-- form-group -->
        </form>
        <!-- form -->      
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
    <script src="/assets/js/force_change_password.js">
    </script>
    <!-- End: page scripts -->
  </body>
</html>