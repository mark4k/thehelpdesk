<?php 
error_reporting(0);
include "connect.php" ;
 session_start();
  $sql4 = "SELECT count(repair_id) as oid FROM `repair` WHERE status_id=0";
  $result4 = $conn->query($sql4);
  $row4 = $result4 ->fetch_assoc();
  $sqlnoti2 = "SELECT repair_detail,fullname,repair.repair_id as oid,repair_date FROM repair,tblusers WHERE tblusers.id=repair.employee_id and status_id=0";
  $querynoti2 = mysqli_query($conn, $sqlnoti2);
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ระบบแจ้งซ่อม </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/thehelpdesk/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="/thehelpdesk/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/thehelpdesk/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="/thehelpdesk/assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/thehelpdesk/assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/thehelpdesk/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/thehelpdesk/assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="/thehelpdesk/assets/plugins/summernote/summernote-bs4.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
<script src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill">
</script>
<script src="../node_modules/sweetalert2/dist/sweetalert2.min.js">
</script>
<link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">
<script src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js">
</script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill">
</script>
<script src="../node_modules/sweetalert2/dist/sweetalert2.min.js">
</script>
<link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">

    
</head>
 <style type="text/css">
    body {
      font-family: 'Kanit', sans-serif;
    }
    h1,h2,h3,h4,h5 {
      font-family: 'Kanit', sans-serif;
    }
    p {
      font-family: 'Kanit', sans-serif;
    }

    .connect-status {
			display: inline-block;
			width: 1em;
			height: 1em;
			background-color: red;
			border-radius: 10px;
		}
		.connect-status.connected {
			background-color: #009933;
		}
  </style>
  
<body  class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    
    </ul>

    <!-- Right navbar links -->
    <?php
    $date2 = new DateTime();
    $date2->setTimezone(new DateTimeZone('Asia/Bangkok'));
    echo $date2->format(DateTime::RFC850) . "\n";
    ?>
    |&nbsp;<b>สถานะเชื่อมต่อ internet </b>&nbsp;<span class="connect-status">&nbsp;</span>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
      
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <?php if($role_id==999) : ?>
      <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class='fas fa-bell' style='color:red'></i>
              <?php if($row4['oid']==0) : ?>
              <?php endif; ?>
              <?php if($row4['oid']>0) : ?>
              <span class="notification">
                <?php echo $row4['oid']; ?>
              </span>
              <?php endif; ?>
              <p class="d-lg-none d-md-block">
              </p>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <?php while($noti = mysqli_fetch_array($querynoti2)) { ?>
              <a class="dropdown-item" href="/thehelpdesk/dashboard/view/orderdetail.php?itemId=<?php  echo $noti['oid']; ?>">
                <div class="row align-items-center">
                  <div class="col-auto">
                    <!-- Avatar -->
                    <p class="text-sm mb-0">
                      <b>คุณ
                      </b> 
                      <?php  echo " ".$noti['fullname']; ?>
                    </p>
                    <p class="text-sm mb-0">
                    </i>
                  <b>หมายเหตุ
                  </b> 
                  <?php  echo " ".$noti['repair_detail']; ?>
                  </p>
                </div>
              <div class="col ml--2">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <h4 class="mb-0 text-sm">
                    </h4>
                  </div>
                  <div class="text-right text-muted">
                    <small>
                      <?php  echo " ".$noti['repair_date']; ?>
                    </small>
                  </div>
                </div>
              </div>
            </div>
          </a>
        <?php } ?>
      </div>
      </li>
      <?php endif; ?> 
    </ul>
  </nav>
  <!-- /.navbar -->
