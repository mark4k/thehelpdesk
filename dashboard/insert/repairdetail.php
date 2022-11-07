<?php 
error_reporting(0);
session_start();
include '../../config/header.php' ;
include '../../config/nav.php' ;
include '../../config/connect.php' ;
include("../../config/editrepair.php");
$id=$_GET['repair_id'];
$admin = $_SESSION['role_id'];
$sql = "SELECT * FROM tblusers where role_id=2";
$query = mysqli_query($conn, $sql);
$sql2 = "SELECT * FROM category_repair";
$query2 = mysqli_query($conn, $sql2);
$sqlc = "SELECT repair.technician_id as tid ,fullname,employee_id,line_token,repair_id,technician_id,repair_code,category_name,category_repair.category_id,repair_detail,repair_cause,repair.status_id,status_name,image_name 
FROM 
repair,category_repair,repair_status,tblusers 
where 
repair.employee_id=tblusers.id 
and repair.status_id=repair_status.status_id 
and category_repair.category_id=repair.category_id 
and repair_id=$id";
$resultc = $conn->query($sqlc);
$rowc = $resultc ->fetch_assoc();  
$sqltech = "SELECT * FROM repair,tblusers where repair.technician_id=tblusers.id and repair_id=$id";
$resulttech = $conn->query($sqltech);
$rowtech = $resulttech ->fetch_assoc(); 

$sql_time = "SELECT status_name , time_date FROM repair_time,repair_status WHERE repair_status.status_id=repair_time.status_id and repair_id = $id group by repair_time.status_id";
$result_time = $conn->query($sql_time);

if ($_SESSION['id'] == "") {
  header("location: /thehelpdesk/config/login");
} else {
?>
    <!-- Main content -->
    <section class="content">
      <?php include '../../config/cards/card_index.php' ;?>
        <!-- Main row -->
        <div class="container-fluid">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">ใบแจ้งซ่อมที่ <?php echo $rowc['repair_code']; ?></h4>
                </div>
                  <div class="card-body">
                    <div id="typography">
                      <form action="" method="post" enctype="multipart/form-data" class="mb-3">
                      <div class="row">
                          <div class="col-6">
                        <div class="user-image mb-3 text-center mt-5">
                          <div style="width: 200px; height: 200px; overflow: hidden; background: #cccccc; margin: 0 auto" >
                            <img src="/thehelpdesk/assets/img/repairpic/<?php echo $rowc['image_name']; ?>" class="figure-img img-fluid rounded " id="imgPlaceholder" onerror="this.src='/thehelpdesk/assets/img/nopic.jpg';" alt="">
                          </div>
                        </div>
                        </div>
                        <div class="col-6">
                        <table class="table table-striped">
                          <tr>
                            <th>สถานะงาน</th>
                            <th>เวลาทำงาน</th>
                          </tr>
                          <?php 
                            while($row_time = mysqli_fetch_array($result_time)) {
                          ?>
                          <tr>
                            <td><?php echo $row_time['status_name']; ?></td>
                            <td><?php echo $row_time['time_date']; ?></td>
                          </tr>
                          <?php
                            }
                          ?>
                        </table>
                        </div>
                        </div>
                        <div class="card">
                        <div class="card-header bg-info">
                        <i class="nav-icon fas fa-user"></i> ข้อมูลผู้แจ้งซ่อม
                        </div>
                        </div>
                        <div class="row">
                          <div class="col-2">
                            <label for="product_name" class="form-label">เลขที่แจ้งซ่อม</label>
                            <input type="text" readonly class="form-control" id="repaircode" name="repaircode" onblur="checkusername(this.value)" value="<?php echo $rowc['repair_code']; ?>" required>
                            <span id="usernameavailable"></span>
                          </div>
                          <div class="col-4">
                            <label for="product_name" class="form-label">ชื่อผู้แจ้ง</label>
                            <input type="text" class="form-control" id="empname" name="empname" onblur="checkusername(this.value)" value="<?php echo $rowc['fullname'] ?>" readonly required>
                            <input type="text" class="form-control" id="empid" style='display:none;' name="empid" onblur="checkusername(this.value)" value="<?php echo $rowc['employee_id']; ?>" required>
                            <input type="text" class="form-control" id="empname2" style='display:none;' name="empname2" onblur="checkusername(this.value)" value="<?php echo $rowc['fullname']; ?>" required>
                            <input type="text" class="form-control" id="line_token" style='display:none;' name="line_token" onblur="checkusername(this.value)" value="<?php echo $rowc['line_token']; ?>" required>
                            <input type="text" class="form-control" id="repair_id" style='display:none;' name="repair_id" onblur="checkusername(this.value)" value="<?php echo $_GET['repair_id'] ?>" required>
                          </div>


                          <?php if($_SESSION['role_id']!=999) : ?>
                          <div class="col-4">
                            <label for="product_name" class="form-label">ช่างซ่อม</label>
                            <select name="tech_id" id="tech_id" class="form-control"  disabled>
                            <option value="<?php echo $rowtech['technician_id']; ?>"><?php echo $rowtech['fullname']; ?>
                            </option>
                            <?php while($result = mysqli_fetch_assoc($query)): ?>
                            <option value="<?=$result['id']?>">
                                <?=$result['fullname']?>
                            </option>
                            <?php endwhile; ?>
                            </select>
                          </div>
                          <?php endif ?>


                          <?php if($_SESSION['role_id']==999) : ?>
                          <div class="col-4">
                            <label for="product_name" class="form-label">ช่างซ่อม</label>
                            <select name="tech_id" id="tech_id" class="form-control"  required>
                            <option value="<?php echo $rowtech['technician_id']; ?>"><?php echo $rowtech['fullname']; ?>
                            </option>
                            <?php while($result = mysqli_fetch_assoc($query)): ?>
                            <option value="<?=$result['id']?>">
                                <?=$result['fullname']?>
                            </option>
                            <?php endwhile; ?>
                            </select>
                          </div>
                          <?php endif ?>


                          </div>
                          <div class="card mt-3">
                            <div class="card-header bg-info">
                            <i class="nav-icon fas fa-edit"></i> รายละเอียดการแจ้งซ่อม
                            </div>
                          </div>
                          <div class="row mt-4">
                          <div class="col-2">
                            <label for="product_name" class="form-label">ประเภทงาน</label>
                            <select name="cat_id" id="cat_id" class="form-control" required>
                            <option value="<?php echo $rowc['category_id']; ?>"><?php echo $rowc['category_name']; ?>
                            </option>
                            <?php while($result2 = mysqli_fetch_assoc($query2)): ?>
                            <option value="<?=$result2['category_id']?>">
                                <?=$result2['category_name']?>
                            </option>
                            <?php endwhile; ?>
                            </select>
                          </div>
                          <div class="col-3">
                            <label for="product_name" class="form-label">รายละเอียดงาน</label>
                            <input type="text" class="form-control" id="repdetail" name="repdetail" onblur="checkusername(this.value)" value="<?php echo $rowc['repair_detail']; ?>" required></textarea>
                            <span id="usernameavailable"></span>
                          </div>
                          <?php if($admin==999 or $admin==2) : ?>
                          <div class="col-3">
                            <label for="product_name" class="form-label">การแก้ไขปัญหา (เฉพาะช่าง)</label>
                            <input type="text" class="form-control" id="repcause" name="repcause" onblur="checkusername(this.value)" value="<?php echo $rowc['repair_cause']; ?>" ></textarea>
                            <span id="usernameavailable"></span>
                          </div>
                          <?php endif; ?>
                          <?php if($admin!=999 and $admin!=2) : ?>
                          <div class="col-3">
                            <label for="product_name" class="form-label">การแก้ไขปัญหา (เฉพาะช่าง)</label>
                            <input type="text" class="form-control" id="repcause" name="repcause" onblur="checkusername(this.value)" value="<?php echo $rowc['repair_cause']; ?>" readonly></textarea>
                            <span id="usernameavailable"></span>
                          </div>
                          <?php endif; ?>
                          <?php if($admin==999 or $admin==2) : ?>
                          <?php if($rowc['status_id']==2) : ?>
                          <div class="col-2">
                            <label for="product_name" class="form-label">สถานะงาน</label>
                            <select name="status_id" id="status_id" class="form-control" readonly>
                            <option value="<?php echo $rowc['status_id']; ?>"><?php echo $rowc['status_name']; ?></option>
                            </select>
                          </div>
                          <?php endif; ?>

                          <?php if($rowc['status_id']!=2) : ?>
                          <div class="col-2">
                            <label for="product_name" class="form-label">สถานะงาน</label>
                            <select name="status_id" id="status_id" class="form-control" required>
                            <option value="<?php echo $rowc['status_id']; ?>"><?php echo $rowc['status_name']; ?>*</option>
                            <!-- เงื่อนไขการเปิดและปิดงาน -->
                            <?php if($rowc['status_id']==0 or $rowc['status_id']==1 or $rowc['status_id']==2) : ?>
                            <option disabled value="0">เปิดงาน</option>
                            <?php endif ?>
                            <?php if($rowc['status_id']==0) : ?>
                            <option value="1">เริ่มงาน</option>
                            <?php endif ?>
                            <?php if($rowc['status_id']==1) : ?>
                            <option disabled value="1">เริ่มงาน</option>
                            <?php endif ?>
                            <?php if($rowc['status_id']==0 or $rowc['status_id']!=1) : ?>
                            <option disabled value="2">ปิดงาน</option>
                            <?php endif ?>
                            <?php if($rowc['status_id']!=0 and $rowc['status_id']==1) : ?>
                            <option  value="2">ปิดงาน</option>
                            <?php endif ?>
                            </select>
                          </div>
                          <?php endif; ?>
                          <?php endif; ?>
                          </div>
                          <?php if($admin==999 or $admin==2) : ?>
                          <div class="custom-file">
                            <input type="file" style='display:none;' name="fileUpload" class="custom-file-input" id="chooseFile" >
                            <label style='display:none;' class="custom-file-label" for="chooseFile">Select file</label>
                          </div>
                          </div>
                          <?php if($rowc['status_id']==2) : ?>
                          <button type="submit" name="submit" class="btn btn-primary btn-block mt-4" disabled>
                            ยืนยัน
                          </button>
                          <?php endif; ?>

                          <?php if($rowc['status_id']!=2) : ?>
                          <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                            ยืนยัน
                          </button>
                          <?php endif; ?>


                          <?php endif; ?>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<?php include '../../config/jqscript.php'; ?>

</body>
</html>
<?php } ?>