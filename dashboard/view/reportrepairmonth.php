<?php 
session_start();
error_reporting(0);
include '../../config/connect.php' ;
include '../../config/functions.php' ;
include '../../config/lib/query_reportrepairmonth.php' ;
if ($_SESSION['id'] == "") {
  header("location: /thehelpdesk/config/login");
} else {
  include '../../config/header.php' ;
  include '../../config/nav.php' ;
?>
    <section class="content">
      <?php include '../../config/cards/card_index.php' ;?>
        <div class="row">
          <section class="col-lg-12 connectedSortable">
            <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">รายงานการแจ้งซ่อมแยกตามเดือน</h4>
                </div>
                <?php
                    $sql_provinces = "SELECT * FROM categories";
                    $query = mysqli_query($conn, $sql_provinces);
                ?>
                <div class="card-body table-responsive">
                <form action="" method="post">
                    <div class="form-group row">
                        <div class="col-xs-2">
                        <input class="btn btn-light"  type="date" name="date_start" value="" placeholder="เลือกวันเริ่มต้น" min="1997-01-01" max="2030-12-31">
                        </div>
                        <div class="col-xs-2">
                        <input class="btn btn-light"  type="date" name="date_end" value="" placeholder="เลือกวันสิ้นสุด" min="1997-01-01" max="2030-12-31">
                        </div>
                        <div class="col-xs-2">
                    </div>&nbsp; 
                    <div class="col-xs-2">
                    <input class="btn btn-light"  type="submit" name="submit" value="ค้นหาข้อมูล">
                    </div>
                    </div>
                    <table class="table" id="dashboard">
                      <thead class=" text-primary">
                        <th class="text-primary">เลขที่แจ้งซ่อม</th>
                        <th class="text-primary">ชื่อ - นามสกุล</th>
                        <th class="text-primary">ประเภทงาน</th>
                        <th class="text-primary">รายละเอียด</th>
                        <th class="text-primary">สถานะ</th>
                        </thead>
                      <tbody>
                      <?php  while($row = mysqli_fetch_array($result)) {   ?>
                        <tr>
                          <td><?php echo $row['repair_code'];?></td>
                          <td><?php echo $row['fullname'];?></td>
                          <td><?php echo $row['category_name'];?></td>
                          <td><?php echo $row['repair_detail'];?></td>
                          <?php if($row['status_id']==0) : ?>
                            <td><span class="radius_1" style="background-color:#35BFFF;font-weight:">เปิดงาน <i class="fas fa-check"></a></span></td>
                          <?php endif; ?>
                          <?php if($row['status_id']==1) : ?>
                          <td><span class="radius_1" style="background-color:#FFBC35;font-weight:">เริ่มงาน <i class="fas fa-check"></span></td>
                          <?php endif; ?>
                          <?php if($row['status_id']==2) : ?>
                          <td><span class="radius_1" style="background-color:#35FF3B;font-weight:">ปิดงาน <i class="fas fa-check"></span></td>
                          <?php endif; ?>
                        </tr>
                        <?php   }  ?>
                      </tbody>
                    </table>
          </section>
        </div>
      </div>
    </section>
  </div>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
<?php include '../../config/jqscript.php' ?>
<?php include '../../config/scchart.php' ?>
</body>
<?php } ?>
</html>
