    <!-- Begin: head css -->
    <?php function HeadContent() { ?>


    <?php } require $_SERVER['DOCUMENT_ROOT'].'/include/layouts/head.php'; ?>
    <!-- End: head css -->
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
      

      <?php } require $_SERVER['DOCUMENT_ROOT'].'/include/layouts/main.php'; ?>  
    <!-- End: page-content -->
    <!-- Begin: footer -->
      <?php function FootContent() { ?>


      <?php } require $_SERVER['DOCUMENT_ROOT'].'/include/layouts/footer.php'; ?>
    <!-- End: footer -->
  </body>
</html>