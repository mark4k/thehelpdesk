<?php 


$sql1 = "SELECT count(repair_id) as case_open FROM repair where status_id=0";
$result1 = $conn->query($sql1);
$row1 = $result1 ->fetch_assoc();

$sql2 = "SELECT count(repair_id) as case_start FROM `repair` where status_id=1";
$result2 = $conn->query($sql2);
$row2 = $result2 ->fetch_assoc();

$sql3 = "SELECT count(repair_id) as case_end FROM `repair` where status_id=2";
$result3 = $conn->query($sql3);
$row3 = $result3 ->fetch_assoc();

$sql44 = "SELECT count(repair_id) as pids FROM repair";
$result44 = $conn->query($sql44);
$row44 = $result44 ->fetch_assoc();

?>

<div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $row1['case_open']; ?> ใบงาน</h3>

                <p>เปิดงาน</p>
              </div>
              <div class="icon">
              <i class="fa fa-file"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $row2['case_start']; ?> ใบงาน</h3>

                <p>เริ่มงาน</p>
              </div>
              <div class="icon">
              <i class="fa fa-file"></i>
              </div>
             
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $row3['case_end']; ?> ใบงาน</h3>

                <p>ปิดงาน</p>
              </div>
              <div class="icon">
              <i class="fa fa-file"></i>
              </div>
             
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $row44['pids']; ?> ใบงาน</h3>

                <p>ใบงานทั้งหมด</p>
              </div>
              <div class="icon">
              <i class="fa fa-file"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->