<?php

/**
 * @Author: Aaron Segbedzi
 * @Date:   2018-03-17 21:50:46
 * @Last Modified by:   Aaron Segbedzi
 * @Last Modified time: 2018-06-04 11:09:31
 */

session_start();
require $_SERVER['DOCUMENT_ROOT'].'/include/roles/admin.php';
require $_SERVER['DOCUMENT_ROOT'].'/include/config.php';
define('pageTitle', 'Customization');
define('pageSection', 'Administrator Console');
define('pageDescription', 'This customization page lets you control how the web application is displayed, such as the titles, logos, colors, and visibility.');
?>
<!DOCTYPE html>
<html lang="en">
  <head>  
    <!-- Begin: head css -->
    <?php function HeadContent() { ?>
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap-colorpicker.css">
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
      <div class="card bd-0">
        <div class="card-header bg-corporate">
          <ul class="nav nav-tabs nav-tabs-for-dark card-header-tabs">
            <li class="nav-item">
              <a class="nav-link bd-0 active pd-y-8" data-toggle="tab" href="#company">
                <i class="icon ion-home tx-15">
                </i>&nbsp;Company Details
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link bd-0 tx-gray-light" data-toggle="tab" href="#logo">
                <i class="icon ion-image tx-15">
                </i>&nbsp;Logos
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link bd-0 tx-gray-light" data-toggle="tab" href="#personalize">
                <i class="icon ion-paintbucket tx-15">
                </i>&nbsp;Colors
              </a>
            </li>
          </ul>
        </div>
        <!-- card-header -->
        <div class="card-body tab-content">
          <div class="tab-pane container" id="personalize">
            <form id="personalize-form" class="form-layout form-layout-1">
              <div class="row">
                <div class="col-md-4 mg-t--1 mg-md-t-0">
                  <div class="form-group mg-md-l--1">
                    <label class="form-control-label">Primary Color
                      <span class="tx-danger">*
                      </span>
                    </label>
                    <div id="primary_color" class="input-group colorpicker-component">
                      <input type="text" name="primary" id="primary" class="form-control input-lg" />
                      <span class="input-group-addon">
                        <i>
                        </i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mg-t--1 mg-md-t-0">
                  <div class="form-group mg-md-l--1">
                    <label class="form-control-label">Secondary Color
                      <span class="tx-danger">*
                      </span>
                    </label>
                    <div id="secondary_color" class="input-group colorpicker-component">
                      <input type="text" name="secondary" id="secondary" class="form-control input-lg"/>
                      <span class="input-group-addon">
                        <i>
                        </i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mg-t--1 mg-md-t-0">
                  <div class="form-group mg-md-l--1">
                    <label class="form-control-label">Tetiary Color
                      <span class="tx-danger">*
                      </span>
                    </label>
                    <div id="tetiary_color" class="input-group colorpicker-component">
                      <input type="text" name="tetiary" id="tetiary" class="form-control input-lg"/>
                      <span class="input-group-addon">
                        <i>
                        </i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="btn-group" role="group">
                <button type="submit" class="btn btn-success btn-with-icon">
                  <div class="ht-40 justify-content-between">
                    <span class="icon wd-40"><i class="fa fa-save"></i></span>
                    <span class="pd-x-30 hidden-xs-down">Save</span>
                  </div>
                </button>
                <button type="reset" class="btn btn-danger btn-with-icon">
                  <div class="ht-40 justify-content-between">
                    <span class="icon wd-40"><i class="fa fa-redo"></i></span>
                    <span class="pd-x-30 hidden-xs-down">Reset</span>
                  </div>
                </button>
              </div>
              <!-- form-group -->
            </form>
          </div>
          <div class="tab-pane container" id="logo">
            <div class="row">
              <div class="col-lg-6 mg-t-1 mg-lg-t-0">
                <form id="logo-form" class="form-layout form-layout-1">
                  <div class="form-group mg-md-l--1">
                    <div class="row">
                      <div class="col-lg-12 text-center">
                        <img src="/assets/media/img/logo/logo.png?" class="bg-gray-200 bd bd-2" height="80px"">
                      </div>
                    </div>
                    <hr/>
                    <div class="row">
                      <div class="col-lg-12">
                        <label class="form-control-label">Logo
                          <span class="tx-danger">*
                          </span> 
                        </label>
                        <label class="custom-file">
                          <input type="file" id="logo" name="logo" class="custom-file-input" accept=".png" required="true">
                          <span class="custom-file-control custom-file-control-corporate"></span>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="btn-group" role="group">
                    <button type="submit" class="btn btn-success btn-with-icon">
                      <div class="ht-40 justify-content-between">
                        <span class="icon wd-40"><i class="fa fa-save"></i></span>
                        <span class="pd-x-30">Save</span>
                      </div>
                    </button>
                  </div>
                </form>
              </div>
              <div class="col-md-6 mg-t--1 mg-md-t-0">
                <form id="icon-form" class="form-layout form-layout-1">
                  <div class="form-group mg-md-l-1 ">
                    <div class="row">
                      <div class="col-lg-12 text-center">
                        <img src="/assets/media/img/logo/icon.png?" class="bg-gray-200 bd bd-2" height="80px" alt="Image">
                      </div>
                    </div>
                    <hr/>
                    <div class="row">
                      <div class="col-lg-12">
                        <label class="form-control-label">Icon
                          <span class="tx-danger">*
                          </span> 
                        </label>
                        <label class="custom-file">
                          <input type="file" id="icon" name="icon" class="custom-file-input" accept=".png" required="true">
                          <span class="custom-file-control custom-file-control-corporate"></span>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="btn-group" role="group">
                    <button type="submit" class="btn btn-success btn-with-icon">
                      <div class="ht-40 justify-content-between">
                        <span class="icon wd-40"><i class="fa fa-save"></i></span>
                        <span class="pd-x-30">Save</span>
                      </div>
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="tab-pane container active" id="company">
            <div class="col-md-12 mg-t--1 mg-md-t-0">
              <form id="company-form" class="form-layout form-layout-1">
                <div class="row">
                  <div class="col-md-6 mg-t--1 mg-md-t-0">
                    <div class="form-group mg-md-l--1">
                      <label class="form-control-label">Company Name
                        <span class="tx-danger">*
                        </span>
                      </label>
                      <input type="text" name="name" id="name" class="form-control input-lg" placeholder="Enter your registered company name" value="<?php echo companyName; ?>" required="true" />
                    </div>
                  </div>
                  <div class="col-md-6 mg-t--1 mg-md-t-0">
                    <div class="form-group mg-md-l--1">
                      <label class="form-control-label">Company Domain
                        <span class="tx-danger">*
                        </span>
                      </label>
                      <input type="text" name="domain" id="domain" class="form-control input-lg" placeholder="Enter your registered domain" value="<?php echo companyDomain; ?>" required="true" />
                    </div>
                  </div>
                </div>
                <div class="btn-group" role="group">
                  <button type="submit" class="btn btn-success btn-with-icon">
                    <div class="ht-40 justify-content-between">
                      <span class="icon wd-40"><i class="fa fa-save"></i></span>
                      <span class="pd-x-30 hidden-xs-down">Save</span>
                    </div>
                  </button>
                  <button type="reset" class="btn btn-danger btn-with-icon">
                    <div class="ht-40 justify-content-between">
                      <span class="icon wd-40"><i class="fa fa-redo"></i></span>
                      <span class="pd-x-30 hidden-xs-down">Reset</span>
                    </div>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- card -->
    </div>
    <!-- section -->
    <?php } require $_SERVER['DOCUMENT_ROOT'].'/include/layouts/main.php'; ?>  
    <!-- End: page-content -->
    <!-- Begin: footer -->
    <?php function FootContent() { ?>
    <script src="/assets/vendor/bootstrap-colorpicker/bootstrap-colorpicker.min.js">
    </script>
    <script src="/assets/js/pages/admin/customization.js">
    </script>
    <?php } require $_SERVER['DOCUMENT_ROOT'].'/include/layouts/footer.php'; ?>
    <!-- End: footer -->
  </body>
</html>