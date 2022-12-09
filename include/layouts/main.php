    <div class="br-mainpanel <?php if(pageTitle == 'View Filling Station'){ echo 'br-profile-page'; } ?>">
      <?php if(pageTitle != 'View Filling Station') { ?>
      <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="/dashboard.php"><?php echo companyName; ?></a>
          <?php if(defined('pageSection')){ ?>
            <span class="breadcrumb-item"><?php echo pageSection; ?></span>
          <?php } ?>
          <span class="breadcrumb-item active"><?php echo pageTitle; ?></span>
        </nav>
      </div><!-- br-pageheader -->
      <div class="pd-x-20 pd-sm-x-30 pd-t-15 pd-b-15 pd-sm-t-30 bg-light">
        <h5 class="tx-gray-800 mg-b-5"><i class="ion-filing"></i>&nbsp;<?php echo pageTitle; ?></h5>
        <p class="mg-b-5"><?php echo pageDescription; ?></p>
      </div>
      <?php } ?>
      <?php if(pageTitle != 'View Filling Station') { ?>
      <div class="br-pagebody">
      <?php } ?>
      <?php if (function_exists('BodyContent')) { BodyContent(); } ?>
      <?php if(pageTitle != 'View Filling Station') { ?>
      </div><!-- br-pagebody -->
      <?php } ?>
    </div><!-- br-mainpanel -->