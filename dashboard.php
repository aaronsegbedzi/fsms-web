<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'].'/include/roles/none.php';
require $_SERVER['DOCUMENT_ROOT'].'/include/config.php';
define('pageTitle', 'Dashboard');
define('pageDescription', 'This page utilizes a dashboard to visualize and monitor system status. Controls include live device telemetry, device map and system alarm.');
?>
<!DOCTYPE html>
<html lang="en">
  <head>  
    <!-- Begin: head css -->
    <?php function HeadContent() { ?>
    <script>window.paceOptions = { ajax: false, restartOnRequestAfter: false,};</script>
    <script src="/assets/vendor/zingchart/zingchart.min.js"></script>
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
    <div class="row no-gutters shadow-base">
      <div class="col-3">
        <div class="bg-teal overflow-hidden">
          <div class="pd-15 d-flex align-items-center">
            <i class="ion ion-beaker tx-50 lh-0 tx-white"></i>
            <div class="mg-l-20">
              <p class="tx-10 tx-spacing-1 tx-mont tx-bold tx-uppercase tx-white mg-b-10">Total Volume of Product's</p>
              <p class="tx-20 tx-white tx-lato tx-bold mg-b-2 lh-1"><span class="totalVolume">N/A</span>&nbsp;L</p>
              <span class="tx-10 tx-roboto tx-white">Last Updated:&nbsp;<span class="totalVolumeDate">N/A</span></span>
            </div>
          </div>
        </div>
      </div><!-- col-3 -->
      <div class="col-3">
        <div class="bg-danger overflow-hidden">
          <div class="pd-15 d-flex align-items-center">
            <i class="ion ion-android-car tx-50 lh-0 tx-white"></i>
            <div class="mg-l-20">
              <p class="tx-10 tx-spacing-1 tx-mont tx-bold tx-uppercase tx-white mg-b-10">Total # Filling Stations</p>
              <p class="tx-20 tx-white tx-lato tx-bold mg-b-2 lh-1"><span class="totalStations">N/A</span></p>
              <span class="tx-10 tx-roboto tx-white">Last Updated: <?php echo date("Y-m-d h:m:s"); ?></span>
            </div>
          </div>
        </div>
      </div><!-- col-3 -->
      <div class="col-3">
        <div class="bg-primary overflow-hidden">
          <div class="pd-15 d-flex align-items-center">
            <i class="ion ion-ios-trash tx-50 lh-0 tx-white"></i>
            <div class="mg-l-20">
              <p class="tx-10 tx-spacing-1 tx-mont tx-bold tx-uppercase tx-white mg-b-10">Total # Tanks</p>
              <p class="tx-20 tx-white tx-lato tx-bold mg-b-2 lh-1"><span class="totalTanks">N/A</span></p>
              <span class="tx-10 tx-roboto tx-white">Last Updated: <?php echo date("Y-m-d h:m:s"); ?></span>
            </div>
          </div>
        </div>
      </div><!-- col-3 -->
      <div class="col-3">
        <div class="bg-br-primary overflow-hidden">
          <div class="pd-15 d-flex align-items-center">
            <i class="ion ion-ios-pulse-strong tx-50 lh-0 tx-white"></i>
            <div class="mg-l-20">
              <p class="tx-10 tx-spacing-1 tx-mont tx-bold tx-uppercase tx-white mg-b-10">Total # Readings</p>
              <p class="tx-20 tx-white tx-lato tx-bold mg-b-2 lh-1"><span class="totalReadings">N/A</span></p>
              <span class="tx-10 tx-roboto tx-white">Last Updated: <?php echo date("Y-m-d h:m:s"); ?></span>
            </div>
          </div>
        </div>
      </div><!-- col-3 -->
    </div>
    <div class="row no-gutters shadow-base mg-t-20">
      <div class="col-lg-4">
        <div class="card">
          <div class="card-header d-xs-flex justify-content-between align-items-center">
            <h6 class="card-title mg-b-0 tx-uppercase tx-bold tx-12 mg-b-0">User Statistics</h6>
            <h6 class="card-title mg-b-0 tx-uppercase tx-bold tx-12 mg-b-0 badge badge-primary tx-white total"></h6>
          </div>
          <!-- card-header -->
          <div class="card-body d-xs-flex justify-content-between align-items-center pd-0">
            <div id="ch5" class="ht-60 tr-y-1 rickshaw_graph">
            <svg width="340" height="60">
                <g>
                    <path d="M0,30Q24.555555555555557,25.75,28.333333333333332,26.25C34,27,51,37.125,56.666666666666664,37.5S79.33333333333333,31.5,85,30S107.66666666666666,22.5,113.33333333333333,22.5S136.00000000000003,27.75,141.66666666666669,30S164.33333333333334,42.75,170,45S192.66666666666669,52.5,198.33333333333334,52.5S221,46.125,226.66666666666666,45S249.33333333333334,42.375,255,41.25S277.6666666666667,33.375,283.33333333333337,33.75S305.99999999999994,45.375,311.66666666666663,45Q315.4444444444444,44.75,340,30L340,60Q315.4444444444444,60,311.66666666666663,60C305.99999999999994,60,289.00000000000006,60,283.33333333333337,60S260.6666666666667,60,255,60S232.33333333333331,60,226.66666666666666,60S204,60,198.33333333333334,60S175.66666666666666,60,170,60S147.33333333333334,60,141.66666666666669,60S119,60,113.33333333333333,60S90.66666666666667,60,85,60S62.33333333333333,60,56.666666666666664,60S34,60,28.333333333333332,60Q24.555555555555557,60,0,60Z,28.333333333333332,60Q24.555555555555557,60,0,30Q24.555555555555557,25.75,28.333333333333332,26.25C34,27,51,37.125,56.666666666666664,37.5S79.33333333333333,31.5,85,30S107.66666666666666,22.5,113.33333333333333,22.5S136.00000000000003,27.75,141.66666666666669,30S164.33333333333334,42.75,170,45S192.66666666666669,52.5,198.33333333333334,52.5S221,46.125,226.66666666666666,45S249.33333333333334,42.375,255,41.25S277.6666666666667,33.375,283.33333333333337,33.75S305.99999999999994,45.375,311.66666666666663,45Q315.4444444444444,44.75,340,30L340,60Q315.4444444444444,60,311.66666666666663,60C305.99999999999994,60,289.00000000000006,60,283.33333333333337,60S260.6666666666667,60,255,60S232.33333333333331,60,226.66666666666666,60S204,60,198.33333333333334,60S175.66666666666666,60,170,60S147.33333333333334,60,141.66666666666669,60S119,60,113.33333333333333,60S90.66666666666667,60,85,60S62.33333333333333,60,56.666666666666664,60S34,60,28.333333333333332,60Q24.555555555555557,60,0,60Z,28.333333333333332,60Q24.555555555555557,60,0,60Z" class="area" fill="#0866C6">
                    </path>
                </g>
            </svg>
        </div>
          </div>
          <!-- card-body -->
          <div class="card-footer d-xs-flex justify-content-between align-items-center">
            <div>
              <span class="tx-11"># Administrators
              </span>
              <h6 class="badge badge-primary btn-block">
                <span class="tx-15 administrators">3
                </span>
              </h6>
            </div>
            <div>
              <span class="tx-11"># Managers
              </span>
              <h6 class="badge badge-primary btn-block">
                <span class="tx-15 managers">2
                </span>
              </h6>
            </div>
            <div>
              <span class="tx-11"># Subscribers
              </span>
              <h6 class="badge badge-primary btn-block">
                <span class="tx-15 subscribers">5
                </span>
              </h6>
            </div>
          </div>
          <!-- card-footer -->
        </div>
        <!-- card -->
      </div>
    </div>
    <?php } require $_SERVER['DOCUMENT_ROOT'].'/include/layouts/main.php'; ?>  
    <!-- End: page-content -->
    <!-- Begin: footer -->
    <?php function FootContent() { ?>
    <script type="text/javascript">
        $.getJSON(localStorage.getItem('api') + '/v1/stats.php', {
          'users': true,
          'token': localStorage.getItem('key')
        }, function(data) {
            $.each(data, function(i) {
                $.each(data[i], function(key, val) {
                    $('.total').text(val.total + ' REGISTERED USERS');
                    $('.administrators').text(val.administrators);
                    $('.managers').text(val.managers);
                    $('.subscribers').text(val.subscribers);
                });
            });
        });

        $.getJSON(localStorage.getItem('api') + '/v1/stats.php', {
          'volume': true,
          'token': localStorage.getItem('key')
        }, function(data) {
            $.each(data, function(i) {
              $('.totalVolume').text(data[i].total);
              $('.totalVolumeDate').text(data[i].dateTime);
            });
        });

        $.getJSON(localStorage.getItem('api') + '/v1/stats.php', {
          'stations': true,
          'token': localStorage.getItem('key')
        }, function(data) {
            $.each(data, function(i) {
              $.each(data[i], function(key, val) {
                $('.totalStations').text(val.total);
              });
            });
        });

        $.getJSON(localStorage.getItem('api') + '/v1/stats.php', {
          'tanks': true,
          'token': localStorage.getItem('key')
        }, function(data) {
            $.each(data, function(i) {
              $.each(data[i], function(key, val) {
                $('.totalTanks').text(val.total);
              });
            });
        });

        $.getJSON(localStorage.getItem('api') + '/v1/stats.php', {
          'readings': true,
          'token': localStorage.getItem('key')
        }, function(data) {
            $.each(data, function(i) {
              $.each(data[i], function(key, val) {
                $('.totalReadings').text(val.total);
              });
            });
        });

    </script>
    <?php } require $_SERVER['DOCUMENT_ROOT'].'/include/layouts/footer.php'; ?>
    <!-- End: footer -->
  </body>
</html>