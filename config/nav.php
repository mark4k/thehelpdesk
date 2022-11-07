<!-- Main Sidebar Container -->
<?php 
$action = isset($_GET['a']) ? $_GET['a'] : "";
$itemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
if(isset($_SESSION['qty'])){
$meQty = 0;
foreach($_SESSION['qty'] as $meItem){
$meQty = $meQty + $meItem;
}
}else{
$meQty=0;
}

$roleid=$_SESSION['role_id'];
?>
<aside class="main-sidebar  sidebar-light-primary elevation-4">
    <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition">
    <!-- Brand Logo -->
    <a href="/thehelpdesk/index" class="brand-link">
      
      <span class="brand-text font-weight-light"><center>ซ่อมบำรุงห่อพัก</center></span>
    </a>

    <!-- Sidebar -->
    
    <br><center><img class="img-rounded"  height="100" width="100" src="/thehelpdesk/assets/img/profilepic/<?php echo $_SESSION['uploadpic']; ?>" onerror="this.src='/thehelpdesk/assets/img/nopic.jpg';" alt=""></center>
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
        <div class="image">
          
        </div>
        <div class="row">
        <div class="info">
          <a class="d-block">สวัสดี, คุณ <?php echo $_SESSION['fname']; ?> </a> 
        </div>
        <div class="info">
        <a  class="" onclick="sweet()" role="button"><i class="fas fa-sign-out-alt"></i></a>
       
        </div>
        </div>
      </div>

     
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="/thehelpdesk/index" class="nav-link active">
              <i class="nav-icon fas fa-home"></i>
              <p>
                หน้าหลัก
              </p>
            </a>
          </li>
          <li class="nav-header">ระบบแจ้งซ่อม</li>
          <li class="nav-item">
                <a href="/thehelpdesk/dashboard/insert/repair" class="nav-link">
                  <i class="fas fa-edit nav-icon"></i>
                  <p>เปิดงานแจ้งซ่อม</p>
                </a>
          </li>
          <li class="nav-item">
            <a href="/thehelpdesk/dashboard/show/repairdisplay" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                ติดตามการแจ้งซ่อม
              </p>
            </a>
          </li>
          <?php if($roleid==999) : ?>
          <li class="nav-header">รายงาน</li>
          

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-poll"></i>
              <p>
                แสดงรายงาน
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="/thehelpdesk/dashboard/view/reportyear" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                รายงานการใช้ระบบรายปี
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="/thehelpdesk/dashboard/view/reportrepairmonth" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                รายงานการแจ้งซ่อม
              </p>
            </a>
          </li>
            </ul>
          </li>
          
          <li class="nav-header">จัดการข้อมูล</li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-star"></i>
              <p>
                ตั้งค่าระบบ
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="/thehelpdesk/dashboard/view/categoryrepair" class="nav-link">
                  <i class="fas fa-minus nav-icon"></i>
                  <p>ข้อมูลประเภทแจ้งซ่อม</p>
                </a>
              </li>
             
            </ul>
          </li>

          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                ข้อมูลรายบุคคล
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="/thehelpdesk/dashboard/show/user" class="nav-link">
                  <i class="fas fa-minus nav-icon"></i>
                  <p>ข้อมูลพนักงาน</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/thehelpdesk/dashboard/show/department" class="nav-link">
                  <i class="fas fa-minus nav-icon"></i>
                  <p>ข้อมูลหน่วยงาน</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/thehelpdesk/dashboard/insert/changelinetoken" class="nav-link">
                  <i class="fas fa-minus nav-icon"></i>
                  <p>Line Token</p>
                </a>
              </li>
              
            </ul>
          </li>
          
          <?php endif; ?> 
      </nav>
      <!-- /.sidebar-menu -->
   </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->