<?php 
session_start();
include '../../config/connect.php' ;
include '../../config/functions.php' ;
include '../../config/header.php' ;
include '../../config/nav.php' ;
$userdata = new DB_con();
$admin = $_SESSION['role_id'];
$empid = $_SESSION['id'];
$sql_admin = "SELECT fullname,repair_id,repair_code,repair_date,repair_detail,uploadfiles,category_name,category_color,repair.status_id as status_id 
FROM repair,category_repair,tblusers where repair.category_id=category_repair.category_id and repair.employee_id=tblusers.id";
$result_admin = $conn->query($sql_admin);

$sql = "SELECT repair_code,repair_date,repair_detail,uploadfiles,category_color,category_name,repair.status_id as pid , repair_id FROM repair,category_repair where repair.category_id=category_repair.category_id and employee_id=$empid";
$result = $conn->query($sql);
if ($_SESSION['id'] == "") {
  header("location: /thepos/config/login");
} else {
?>
    <section class="content">
        <div class="row">
          <section class="col-lg-12 connectedSortable">
            <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">รายการแจ้งซ่อม</h4>
                </div>
                <div class="card-body table-responsive">
                  <table id="dashboard" class="table table-hover">
                    <thead class="text-primary">
                      <th style="display:none">รหัสแจ้งซ่อม</th>
                      <th>เลขที่แจ้งซ่อม</th>
                      <th>วันที่เปิดงาน</th>
                      <th>ชื่อผู้แจ้ง</th>
                      <th>รายละเอียด</th>
                      <th>ไฟล์แนบ</th>
                      <th>ประเภทงาน</th>
                      <th>สถานะ</th>
                      <th>จัดการใบแจ้งซ่อม</th>
                    </thead>
                    <tbody>
                    <?php if($admin!=999) : ?>
                    <?php 
                        while($row = mysqli_fetch_array($result)) {
                      ?>
                      <tr>
                        <td style="display:none"><?php echo $row['repair_id'];?></td>
                        <td><?php echo $row['repair_code'];?></td>
                        <td><?php echo $row['repair_date'];?></td>
                        <td><?php echo $_SESSION['fname'];?></td>
                        <td><?php echo $row['repair_detail'];?></td>
                        <?php if($row['uploadfiles']!=null) : ?>
                        <td><a href="../../assets/img/repairfiles/<?php echo $row['uploadfiles'];?>"><?php echo $row['uploadfiles'];?></a></td>
                        <?php endif; ?>
                        <?php if($row['uploadfiles']==null) : ?>
                        <td>ไม่มีไฟล์แนบ</td>
                        <?php endif; ?>
                        <td><span class="radius_1" style="background-color:<?php echo $row['category_color']; ?>">
                            <?php echo $row['category_name']; ?>
                          </span></td>
                        <?php if($row['pid']==0) : ?>
                            <td><span class="radius_1" style="background-color:#35BFFF;font-weight:">เปิดงาน <i class="fas fa-exclamation-circle"></i></a></span></td>
                          <?php endif; ?>
                          <?php if($row['pid']==1) : ?>
                          <td><span class="radius_1" style="background-color:#FFBC35;font-weight:">เริ่มงาน <i class="fas fa-chart-line"></i></span></td>
                          <?php endif; ?>
                          <?php if($row['pid']==2) : ?>
                          <td><span class="radius_1" style="background-color:#35FF3B;font-weight:">ปิดงาน <i class="fas fa-check"></i></span></td>
                          <?php endif; ?>
                          <td>
                          <a class="btn btn-light" href="/thehelpdesk/dashboard/insert/repairdetail/<?php echo $row['repair_id']; ?>" role="button">
                          รายละเอียด : <i class="fa fa-search"></i></a>

                          <a class="btn btn-info" href="/thehelpdesk/config/mpdf/index/<?php echo $row['repair_id']; ?>" role="button">
                          พิมพ์ใบแจ้งซ่อม : <i class="fa fa-print"></i></a>
                         
                          </td>

                      </tr>
                      <?php
                            }
                      ?>
                      <?php endif; ?>
                      <?php if($admin==999 or $admin==2) : ?>
                      <?php 
                        while($row_admin = mysqli_fetch_array($result_admin)) {
                      ?>
                      <tr>
                        <td><?php echo $row_admin['repair_code'];?></td>
                        <td><?php echo $row_admin['repair_date'];?></td>
                        <td><?php echo $row_admin['fullname'];?></td>
                        <td><?php echo $row_admin['repair_detail'];?></td>
                        <?php if($row_admin['uploadfiles']!=null) : ?>
                        <td><a href="../../assets/img/repairfiles/<?php echo $row_admin['uploadfiles'];?>"><?php echo $row_admin['uploadfiles'];?></a></td>
                        <?php endif; ?>
                        <?php if($row_admin['uploadfiles']==null) : ?>
                        <td>ไม่มีไฟล์แนบ</td>
                        <?php endif; ?>
                        <td><span class="radius_1" style="background-color:<?php echo $row_admin['category_color']; ?>">
                            <?php echo $row_admin['category_name']; ?>
                          </span></td>
                          <?php if($row_admin['status_id']==0) : ?>
                            <td><span class="radius_1" style="background-color:#35BFFF;font-weight:">เปิดงาน <i class="fas fa-exclamation-circle"></i></a></span></td>
                          <?php endif; ?>
                          <?php if($row_admin['status_id']==1) : ?>
                          <td><span class="radius_1" style="background-color:#FFBC35;font-weight:">เริ่มงาน <i class="fas fa-chart-line"></i></span></td>
                          <?php endif; ?>
                          <?php if($row_admin['status_id']==2) : ?>
                          <td><span class="radius_1" style="background-color:#35FF3B;font-weight:">ปิดงาน <i class="fas fa-check"></i></span></td>
                          <?php endif; ?>
                          <td>
                          <a class="btn btn-primary" href="/thehelpdesk/dashboard/insert/repairdetail/<?php echo $row_admin['repair_id']; ?>" role="button">
                          รายละเอียด : <i class="fa fa-search"></i></a>

                          <a class="btn btn-info" href="/thehelpdesk/config/mpdf/index/<?php echo $row_admin['repair_id']; ?>" role="button">
                          พิมพ์ใบแจ้งซ่อม : <i class="fa fa-print"></i></a>

                          <?php if($admin==888) : ?>
                          <a class="btn btn-danger" href="#" role="button">
                          <i class="material-icons">block</i> ลบ</a>
                          <?php endif; ?>
                          </td>

                      </tr>
                      <?php
                            }
                      ?>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     </section>
  </div>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="memberModalLabel"></h4>
                <div class="table-responsive">
                <div class="dash">
                </div>
                </div>
          </div>
      </div>
  </div>
</div>
<?php include '../../config/jqscript.php' ?>
</body>
</html>
<?php } ?>