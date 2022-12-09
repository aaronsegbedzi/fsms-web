<?php

/**
 * @Author: Aaron Segbedzi
 * @Date:   2018-02-24 15:07:23
 * @Last Modified by:   Aaron Segbedzi
 * @Last Modified time: 2018-06-04 14:03:58
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
    <meta name="author" content="Aaron Senanu Segbedzi">
    <title>
      <?php echo companyName; ?> - Forgot Password
    </title>
    <!-- End: meta tags -->
    <!-- Begin: vendor css -->
    <link href="/assets/vendor/font-awesome/css/fontawesome-all.css" rel="stylesheet">
    <link href="/assets/vendor/ionicons/css/ionicons.css" rel="stylesheet">
    <link href="/assets/vendor/select2/css/select2.min.css" rel="stylesheet">
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
          <img src="/assets/media/img/logo/logo.png" width="40%">
        </div>
        <hr>
        <div class="alert alert-bordered alert-info" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×
            </span>
          </button>
          Please provide the following information below and we'll help you reset your password for your account.
        </div>
        <form id="forgot-password-form">
          <div class="form-group">
            <label class="form-control-label" for="username">Email: 
              <span class="tx-danger">*
              </span>
            </label>
            <div class="input-group ">
              <input type="text" class="form-control" placeholder="Enter your username" id="username" name="username" required />
              <span class="input-group-addon tx-size-sm lh-2 tx-semibold">
                @
                <?php echo companyDomain; ?>
              </span>
            </div>
          </div>
          <!-- form-group -->
          <div class="form-group">
            <label class="form-control-label" for="security_question">Security Question:
              <span class="tx-danger">*
              </span> 
            </label>
            <select class="form-control select2" data-placeholder="Choose Security Question" name="security_question" id="security_question" required="true">
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
          <!-- form-group -->
          <div class="form-group">
            <label class="form-control-label" for="security_answer">Security Answer:
              <span class="tx-danger">*
              </span> 
            </label>
            <div class="input-group ">
              <input type="text" class="form-control" placeholder="Enter your security answer here"  id="security_answer" name="security_answer" required />
            </div>
          </div>
          <!-- form-group -->
          <div class="form-group pull-right">
            <div class="btn-group" role="group">
              <button type="submit" class="btn btn-success btn-with-icon">
                <div class="ht-40 justify-content-between">
                  <span class="icon wd-40"><i class="fa fa-save"></i></span>
                  <span class="pd-x-30">Submit</span>
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
    <script src="/assets/vendor/select2/js/select2.min.js">
    </script>
    <!-- End: vendor scripts -->
    <!-- Begin: page scripts -->
    <script src="/assets/js/forgot_password.js">
    </script>
    <!-- End: page scripts -->
  </body>
</html>
