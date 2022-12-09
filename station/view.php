<?php

/**
 * @Author: Aaron Segbedzi
 * @Date:   2018-04-07 21:49:48
 * @Last Modified by:   Aaron Segbedzi
 * @Last Modified time: 2018-04-17 21:34:05
 */

session_start();
require $_SERVER['DOCUMENT_ROOT'].'/include/roles/none.php';
require $_SERVER['DOCUMENT_ROOT'].'/include/config.php';
define('pageTitle', 'View Filling Station');
define('pageDescription', '');
?>
<!DOCTYPE html>
<html lang="en">
  <head>  
    <!-- Begin: head css -->
    <?php function HeadContent() { ?>
    <script>window.paceOptions = {ajax: false, restartOnRequestAfter: false,};
    </script>
    <script src="/assets/vendor/zingchart/zingchart.min.js">
    </script>
    <?php } require $_SERVER['DOCUMENT_ROOT'].'/include/layouts/head.php'; ?>
    <!-- End: head css -->
  </head>
  <body class="collapsed-menu with-subleft">
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
    <div class="row no-gutters">
      <div class="col-lg-3">
        <div class="card shadow-base bd-0 ht-120">
          <div class="card-header bg-danger d-flex justify-content-between align-items-center">
            <h6 class="card-title tx-white tx-uppercase tx-12 mg-b-0">
              <i class="icon ion-android-person tx-15">
              </i>
              &nbsp;Filling Station Manager
            </h6>
          </div>
          <!-- card-header -->
          <div class="card-body pd-5 bd bd-b-3 d-xs-flex justify-content-between align-items-center">
            <div class="col-lg-3">
              <img src="/assets/media/img/logo/icon.png" class="wd-50 rounded-circle" alt="Image">
            </div>
            <div class="col-lg-9">
              <p class="tx-sm tx-inverse tx-medium mg-b-0 manager">
              </p>
              <p class="tx-12 mg-b-0">
                <span class="username">
                </span>@
                <?php echo companyDomain; ?>
              </p>
            </div>
          </div>
          <!-- card-body -->
        </div>
        <!-- card -->
      </div>
      <div class="col-lg-3">
        <div class="card shadow-base bd-0 ht-120">
          <div class="card-header bg-primary d-flex justify-content-between align-items-center">
            <h6 class="card-title tx-white tx-uppercase tx-12 mg-b-0">
              <i class="icon ion-map tx-15">
              </i>
              &nbsp;Filling Station Location
            </h6>
          </div>
          <!-- card-header -->
          <div class="card-body pd-5 bd bd-b-3 d-xs-flex justify-content-between align-items-center">
            <div class="col-lg-3">
              <button id="viewMap" class="btn btn-lg btn-primary">
                <i class="menu-item-icon icon ion-map tx-25">
                </i>
              </button>
            </div>
            <div class="col-lg-9 text-center">
              <p class="tx-sm tx-inverse tx-medium mg-b-0 location">
              </p>
              <p class="tx-12 mg-b-0 coordinates">
              </p>
            </div>
          </div>
          <!-- card-body -->
        </div>
        <!-- card -->
      </div>
      <div class="col-lg-3">
        <div class="card shadow-base bd-0 ht-120">
          <div class="card-header bg-purple d-flex justify-content-between align-items-center">
            <h6 class="card-title tx-white tx-uppercase tx-12 mg-b-0">
              <i class="icon ion-person-stalker tx-15">
              </i>
              &nbsp;Subscribers
            </h6>
          </div>
          <!-- card-header -->
          <div class="card-body pd-5 bd bd-b-3 d-xs-flex justify-content-between align-items-center">
            <div class=" col-lg-12 tx-center">
              <h2 class="tx-bold tx-lato badge bg-purple tx-30 tx-white subscribers">
              </h2>
            </div>
          </div>
          <!-- card-body -->
        </div>
        <!-- card -->
      </div>
      <div class="col-lg-3">
        <div class="card shadow-base bd-0 ht-120">
          <div class="card-header bg-dark d-flex justify-content-between align-items-center">
            <h6 class="card-title tx-white tx-uppercase tx-12 mg-b-0">
              <i class="icon ion-ios-information-outline tx-15">
              </i>
              &nbsp;Miscellaneous
            </h6>
          </div>
          <!-- card-header -->
          <div class="card-body pd-5 bd bd-b-3 d-xs-flex justify-content-between align-items-center">
            <div class="col-lg-12">
              <p class="tx-sm tx-inverse tx-medium mg-b-0 updatedAt">
              </p>
              <p class="tx-sm tx-inverse tx-medium mg-b-0 createdAt">
              </p>
            </div>
          </div>
          <!-- card-body -->
        </div>
        <!-- card -->
      </div>
    </div>
    <div id="dashboard" class="row no-gutters widget-1">
    </div>
    <div id="modal-view-map" class="modal fade">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content tx-size-sm">
          <div class="modal-header pd-x-20">
            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">
              <i class="fa fa-map">
              </i>&nbsp;Google Map
            </h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×
              </span>
            </button>
          </div>
          <div class="modal-body pd-20">
            <div id="map1" class="bd bg-gray-100" style="width: 600px; height: 300px;">
            </div>
          </div>
          <div class="modal-footer">
            <button form="user-create-form" type="reset" class="btn btn-danger btn-with-icon" data-dismiss="modal">
              <div class="ht-40 justify-content-between">
                <span class="icon wd-40">
                  <i class="fa fa-window-close">
                  </i>
                </span>
                <span class="pd-x-30">Close
                </span>
              </div>
            </button>
          </div>
        </div>
      </div>
      <!-- modal-dialog -->
    </div>
    <!-- modal -->
    <?php } require $_SERVER['DOCUMENT_ROOT'].'/include/layouts/main.php'; ?>  
    <!-- End: page-content -->
    <!-- Begin: footer -->
    <?php function FootContent() { ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB59XziNtopRDb7unsQ7nXDXS9HdsdidPU">
    </script>
    <script src="/assets/vendor/gmaps/gmaps.js">
    </script>
    <script src="/assets/js/pages/station/view.js">
    </script>
    <?php } require $_SERVER['DOCUMENT_ROOT'].'/include/layouts/footer.php'; ?>
    <!-- End: footer -->
  </body>
</html>