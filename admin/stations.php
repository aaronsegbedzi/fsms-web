<?php

/**
 * @Author: Aaron Segbedzi
 * @Date:   2018-04-02 13:59:17
 * @Last Modified by:   Aaron Segbedzi
 * @Last Modified time: 2018-04-18 00:05:26
 */

session_start();
require $_SERVER['DOCUMENT_ROOT'].'/include/roles/admin.php';
require $_SERVER['DOCUMENT_ROOT'].'/include/config.php';
define('pageTitle', 'Filling Stations');
define('pageSection', 'Administrator Console');
define('pageDescription', 'This page lets you manage filling stations in your Oil Marketing Company, it includes features to create, edit and delete filling stations.');
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
                  <th></th>
                  <th>#&nbsp;ID</th>
                  <th><i class="fa fa-map-marker"></i>&nbsp;Location</th>
                  <th><i class="fa fa-user"></i>&nbsp;Manager</th>
                  <th><i class="fa fa-sort-numeric-down"></i>&nbsp;No. of Tanks</th>
                  <th class="wd-100"><i class="fa fa-cog"></i>&nbsp;Actions</th>
                </tr>
              </thead>
            </table>
          </div><!-- table-wrapper -->
        </div>
      </div>
    </div>
    <!-- section -->
    <div id="modal-view-map" class="modal fade">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content tx-size-sm">
          <div class="modal-header pd-x-20">
            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"><i class="fa fa-map"></i>&nbsp;Google Map</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body pd-20">
            <div id="map1" class="bd bg-gray-100" style="width: 600px; height: 300px;"></div>
          </div>
          <div class="modal-footer">
            <button form="user-create-form" type="reset" class="btn btn-danger btn-with-icon" data-dismiss="modal">
              <div class="ht-40 justify-content-between">
                <span class="icon wd-40"><i class="fa fa-window-close"></i></span>
                <span class="pd-x-30">Close</span>
              </div>
            </button>
          </div>
        </div>
      </div><!-- modal-dialog -->
    </div><!-- modal -->
    <div id="modal-edit" class="modal fade">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content tx-size-sm">
          <div class="modal-header pd-x-20">
            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"><i class="fa fa-edit"></i>&nbsp;Edit Filling Station</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body pd-20">
            <form id="edit-form" class="form-layout form-layout-2">
              <input type="hidden" name="id" id="id">
              <div class="row no-gutters">
                <div class="col-md-12">
                  <div class="alert alert-info" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                    <div class="d-flex align-items-center justify-content-start">
                      <i class="icon ion-ios-information alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                      <span><strong>Instructions: </strong> Right click anywhere on the map (use the map zoom controls and drag as required) or if you know the coordinates, enter them below.</span>
                    </div><!-- d-flex -->
                  </div>
                </div>
              </div>
              <div class="row no-gutters">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="form-control-label">Location: <span class="tx-danger">*</span></label>
                    <input class="form-control" name="location" id="location" placeholder="Enter location" required="true">
                  </div>
                </div><!-- col-4 -->
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="form-control-label">Latitude: <span class="tx-danger">*</span></label>
                    <input class="form-control" name="latitude" id="latitude" placeholder="Enter latitude" required="true">
                  </div>
                </div><!-- col-4 -->
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="form-control-label">Longitude: <span class="tx-danger">*</span></label>
                    <input class="form-control" name="longitude" id="longitude" placeholder="Enter longitude" required="true">
                  </div>
                </div><!-- col-4 -->
              </div>
              <div class="row no-gutters">
                <div class="col-md-12">
                  <div id="map2" class="bd bg-gray-100" style="width: 100%; height: 250px;"></div>
                </div><!-- col-12 -->
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <div class="btn-group" role="group">
              <button form="edit-form" type="submit" class="btn btn-success btn-with-icon">
                <div class="ht-40 justify-content-between">
                  <span class="icon wd-40"><i class="fa fa-save"></i></span>
                  <span class="pd-x-30">Save</span>
                </div>
              </button>
              <button form="edit-form" type="reset" class="btn btn-danger btn-with-icon">
                <div class="ht-40 justify-content-between">
                  <span class="icon wd-40"><i class="fa fa-redo"></i></span>
                  <span class="pd-x-30">Reset</span>
                </div>
              </button>
            </div>
          </div>
        </div>
      </div><!-- modal-dialog -->
    </div><!-- modal -->
    <div id="modal-create" class="modal fade">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content tx-size-sm">
          <div class="modal-header pd-x-20">
            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"><i class="fa fa-edit fa-lg"></i>&nbsp;Create Filling Station</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body pd-20">
            <form id="create-form" class="form-layout form-layout-2">
              <div class="row no-gutters">
                <div class="col-md-12">
                  <div class="alert alert-info" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                    <div class="d-flex align-items-center justify-content-start">
                      <i class="icon ion-ios-information alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                      <span><strong>Instructions: </strong> Right click anywhere on the map (use the map zoom controls and drag as required) or if you know the coordinates, enter them below.</span>
                    </div><!-- d-flex -->
                  </div>
                </div>
              </div>
              <div class="row no-gutters">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="form-control-label">Location: <span class="tx-danger">*</span></label>
                    <input class="form-control" name="location" id="location" placeholder="Enter location" required="true">
                  </div>
                </div><!-- col-4 -->
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="form-control-label">Latitude: <span class="tx-danger">*</span></label>
                    <input class="form-control" name="latitude" id="latitude" placeholder="Enter latitude" required="true">
                  </div>
                </div><!-- col-4 -->
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="form-control-label">Longitude: <span class="tx-danger">*</span></label>
                    <input class="form-control" name="longitude" id="longitude" placeholder="Enter longitude" required="true">
                  </div>
                </div><!-- col-4 -->
              </div>
              <div class="row no-gutters">
                <div class="col-md-12">
                  <div id="map3" class="bd bg-gray-100" style="width: 100%; height: 250px;"></div>
                </div><!-- col-12 -->
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <div class="btn-group" role="group">
              <button form="create-form" type="submit" class="btn btn-success btn-with-icon">
                <div class="ht-40 justify-content-between">
                  <span class="icon wd-40"><i class="fa fa-save"></i></span>
                  <span class="pd-x-30">Save</span>
                </div>
              </button>
              <button form="create-form" type="reset" class="btn btn-danger btn-with-icon">
                <div class="ht-40 justify-content-between">
                  <span class="icon wd-40"><i class="fa fa-redo"></i></span>
                  <span class="pd-x-30">Reset</span>
                </div>
              </button>
            </div>
          </div>
        </div>
      </div><!-- modal-dialog -->
    </div><!-- modal -->
    <?php } require $_SERVER['DOCUMENT_ROOT'].'/include/layouts/main.php'; ?>  
    <!-- End: page-content -->
    <!-- Begin: footer -->
    <?php function FootContent() { ?>
    <script src="/assets/vendor/dataTable/jquery.dataTables.js"></script>
    <script src="/assets/vendor/dataTable/dataTables.responsive.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB59XziNtopRDb7unsQ7nXDXS9HdsdidPU"></script>
    <script src="/assets/vendor/gmaps/gmaps.js"></script>
    <script src="/assets/js/pages/admin/station.js"></script>
    <?php } require $_SERVER['DOCUMENT_ROOT'].'/include/layouts/footer.php'; ?>
    <!-- End: footer -->
  </body>
</html>