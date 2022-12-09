<div class="br-logo" style="justify-content: center;">
  <a href="/dashboard.php">
    <span style="text-align: center;"><img src="/assets/media/img/logo/logo.png?" height="55px" width="100%"></span>
  </a>
</div>
<div class="br-sideleft overflow-y-auto">
  <?php if ($_SESSION['role'] == 0) { ?>
  <label class="sidebar-label pd-x-15 mg-t-20">Navigation</label>
  <div class="br-sideleft-menu">
    <a href="/dashboard.php" class="br-menu-link <?php if (pageTitle == 'Dashboard') { echo 'active'; } ?>">
      <div class="br-menu-item">
        <i class="menu-item-icon icon ion-speedometer tx-22"></i>
        <span class="menu-item-label">Dashboard</span>
      </div>
      <!-- menu-item -->
    </a>
    <!-- br-menu-link -->
    <label class="sidebar-label pd-x-15 mg-t-20">Administrators Console</label>
    <a href="/admin/stations.php" class="br-menu-link <?php if (in_array(pageTitle, array('Filling Stations', 'View Filling Station'))) { echo 'active'; } ?>">
      <div class="br-menu-item">
        <i class="menu-item-icon icon ion-model-s tx-22"></i>
        <span class="menu-item-label">Filling Stations</span>
      </div>
      <!-- menu-item -->
    </a>
    <!-- br-menu-link -->
    <a href="/admin/tanks.php" class="br-menu-link <?php if (pageTitle == 'Tanks') { echo 'active'; } ?>">
      <div class="br-menu-item">
        <i class="menu-item-icon icon ion-beaker tx-22"></i>
        <span class="menu-item-label">Tanks</span>
      </div>
      <!-- menu-item -->
    </a>
    <!-- br-menu-link -->
    <a href="/admin/readings.php" class="br-menu-link <?php if (pageTitle == 'Readings') { echo 'active'; } ?>">
      <div class="br-menu-item">
        <i class="menu-item-icon icon icon ion-ios-pulse-strong tx-22"></i>
        <span class="menu-item-label">Readings</span>
      </div>
      <!-- menu-item -->
    </a>
    <!-- br-menu-link -->
    <a href="#" class="br-menu-link <?php if (in_array(pageTitle, array('Products', 'Tank Types'))) { echo 'show-sub'; } ?>">
      <div class="br-menu-item">
        <i class="menu-item-icon icon icon ion-ios-calculator-outline tx-22"></i>
        <span class="menu-item-label">Properties</span>
      </div>
      <!-- menu-item -->
    </a>
    <!-- br-menu-link -->
    <ul class="br-menu-sub nav flex-column">
      <li class="nav-item"><a href="/admin/fuels.php" class="nav-link <?php if (pageTitle == 'Products') { echo 'active'; } ?>">Products</a></li>
      <li class="nav-item"><a href="/admin/tanktypes.php" class="nav-link <?php if (pageTitle == 'Tank Types') { echo 'active'; } ?>">Tank Types</a></li>
    </ul>
    <a href="#" class="br-menu-link <?php if (in_array(pageTitle, array('Customization', 'User Management'))) { echo 'show-sub'; } ?>">
      <div class="br-menu-item">
        <i class="menu-item-icon icon icon ion-gear-a tx-22"></i>
        <span class="menu-item-label">Settings</span>
      </div>
      <!-- menu-item -->
    </a>
    <!-- br-menu-link -->
    <ul class="br-menu-sub nav flex-column">
      <li class="nav-item"><a href="/admin/customization.php" class="nav-link <?php if (pageTitle == 'Customization') { echo 'active'; } ?>">Customization</a></li>
      <li class="nav-item"><a href="/admin/users.php" class="nav-link <?php if (pageTitle == 'User Management') { echo 'active'; } ?>">User Management</a></li>
    </ul>
  </div>
  <?php } else if ($_SESSION['role'] == 1) { ?>
  <label class="sidebar-label pd-x-15 mg-t-20">Navigation</label>
  <div class="br-sideleft-menu">
    <a href="/dashboard.php" class="br-menu-link <?php if (pageTitle == 'Dashboard') { echo 'active'; } ?>">
      <div class="br-menu-item">
        <i class="menu-item-icon icon ion-speedometer tx-22"></i>
        <span class="menu-item-label">Dashboard</span>
      </div>
      <!-- menu-item -->
    </a>
    <!-- br-menu-link -->
    <a href="/station/view.php" class="br-menu-link <?php if (in_array(pageTitle, array('View Filling Station'))) { echo 'active'; } ?>">
      <div class="br-menu-item">
        <i class="menu-item-icon icon ion-model-s tx-22"></i>
        <span class="menu-item-label">Filling Station</span>
      </div>
      <!-- menu-item -->
    </a>
    <!-- br-menu-link -->
    <label class="sidebar-label pd-x-15 mg-t-20">Managers Console</label>
    <a href="/manager/readings.php" class="br-menu-link <?php if (pageTitle == 'Readings') { echo 'active'; } ?>">
      <div class="br-menu-item">
        <i class="menu-item-icon icon icon ion-ios-pulse-strong tx-22"></i>
        <span class="menu-item-label">Readings</span>
      </div>
      <!-- menu-item -->
    </a>
    <!-- br-menu-link -->
    <a href="#" class="br-menu-link <?php if (in_array(pageTitle, array('User Management'))) { echo 'show-sub'; } ?>">
      <div class="br-menu-item">
        <i class="menu-item-icon icon icon ion-gear-a tx-22"></i>
        <span class="menu-item-label">Settings</span>
      </div>
      <!-- menu-item -->
    </a>
    <!-- br-menu-link -->
    <ul class="br-menu-sub nav flex-column">
      <li class="nav-item"><a href="/manager/users.php" class="nav-link <?php if (pageTitle == 'User Management') { echo 'active'; } ?>">User Management</a></li>
    </ul>
  </div>
  <?php } else if ($_SESSION['role'] == 2) { ?>
  <label class="sidebar-label pd-x-15 mg-t-20">Navigation</label>
  <div class="br-sideleft-menu">
    <a href="/station/view.php" class="br-menu-link <?php if (in_array(pageTitle, array('View Filling Station'))) { echo 'active'; } ?>">
      <div class="br-menu-item">
        <i class="menu-item-icon icon ion-model-s tx-22"></i>
        <span class="menu-item-label">Filling Station</span>
      </div>
      <!-- menu-item -->
    </a>
    <!-- br-menu-link -->
  </div>
  <?php } ?>
  <!-- br-sideleft-menu -->
<?php require $_SERVER['DOCUMENT_ROOT'].'/include/layouts/left_sidebar_footer.php'; ?>
</div>
<!-- br-sideleft -->