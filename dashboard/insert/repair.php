<?php 

include '../../config/connect.php' ;
include '../../config/header.php' ;
include '../../config/nav.php' ;
include("../../config/insertrepair.php");
  $sql = "SELECT * FROM tblusers where role_id=2";
  $query = mysqli_query($conn, $sql);
  $sql2 = "SELECT * FROM category_repair";
  $query2 = mysqli_query($conn, $sql2);
  $sql1 = "SELECT MAX(`repair_id`) AS `lastid` FROM `repair`";
  $result1 = $conn->query($sql1);
  $row1 = $result1 ->fetch_assoc();
  
  $idf = $row1['lastid'];
  $date = date('ym-d');
  $code = sprintf($date.'-%04d', $idf);
if ($_SESSION['id'] == "") {
  header("location: /thepos/config/login");
} else {
?>
    <!-- Main content -->
    <section class="content">
      <?php include '../../config/cards/card_index.php' ;?>
        <!-- Main row -->
        <div class="container-fluid">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">เพิ่มข้อมูลการแจ้งซ่อม</h4>
                </div>
                  <div class="card-body">
                    <div id="typography">
                      <form action="" method="post" enctype="multipart/form-data" class="mb-3">
                      <div class="card">
                        <div class="card-header bg-info">
                        <i class="nav-icon fas fa-user"></i> ข้อมูลผู้แจ้งซ่อม
                        </div>
                      </div>
                        <div class="row">
                          <div class="col-2">
                            <label for="product_name" class="form-label">เลขที่แจ้งซ่อม</label>
                            <input type="text" readonly class="form-control" id="repaircode" name="repaircode" onblur="checkusername(this.value)" value="<?php echo $code; ?>" required>
                            <span id="usernameavailable"></span>
                          </div>
                          <div class="col-4">
                            <label for="product_name" class="form-label">ชื่อผู้แจ้ง</label>
                            <input type="text" class="form-control" id="empname" name="empname" onblur="checkusername(this.value)" value="<?php echo $_SESSION['fname'] ?>" readonly>
                            <input type="text" class="form-control" id="empid" style='display:none;' name="empid" onblur="checkusername(this.value)" value="<?php echo $_SESSION['id'] ?>" required>
                          </div>
                          <?php if($_SESSION['id']!=999) : ?>
                          <div class="col-4">
                            <label for="product_name" class="form-label">ช่างซ่อม</label>
                            <select name="tech_id" id="tech_id" class="form-control" disabled>
                            <option value="0">เลือกช่างซ่อม
                            </option>
                            <?php while($result = mysqli_fetch_assoc($query)): ?>
                            <option value="<?=$result['id']?>">
                                <?=$result['fullname']?>
                            </option>
                            <?php endwhile; ?>
                            </select>
                          </div>
                          <?php endif ?>

                          <?php if($_SESSION['id']==999 or $_SESSION['role_id']==2) : ?>
                          <div class="col-4">
                            <label for="product_name" class="form-label">ช่างซ่อม</label>
                            <select name="tech_id" id="tech_id" class="form-control">
                            <option value="0">เลือกช่างซ่อม
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
                            <option value="">เลือกประเภทงาน
                            </option>
                            <?php while($result2 = mysqli_fetch_assoc($query2)): ?>
                            <option value="<?=$result2['category_id']?>">
                                <?=$result2['category_name']?>
                            </option>
                            <?php endwhile; ?>
                            </select>
                          </div>
                          <div class="col-3">
                            <label for="product_name" class="form-label">รายละเอียดการแจ้งซ่อม</label>
                            <textarea type="text" class="form-control" id="repdetail" name="repdetail" onblur="checkusername(this.value)" required></textarea>
                            <span id="usernameavailable"></span>
                          </div>
                          <div class="col-5">
                            <label for="product_name" class="form-label">การแก้ไขปัญหา (เฉพาะช่าง)</label>
                            <textarea type="text" class="form-control" id="repcause" name="repcause" onblur="checkusername(this.value)" value="-" readonly></textarea>
                            <span id="usernameavailable"></span>
                          </div>
                          </div>

                          
                          <div class="user-image mb-3 text-center mt-5">
                            <div style="width: 100px; height: 100px; overflow: hidden; background: #cccccc; margin: 0 auto">
                              <img src="..." class="figure-img img-fluid rounded " id="imgPlaceholder" alt="">
                            </div>
                          </div>
                          <div class="row">
                          <div class="col-6">
                          <div class="custom-file mb-2">
                            <input type="file" name="fileUpload" class="custom-file-input" id="chooseFile" >
                            <label class="custom-file-label" for="chooseFile">แนบภาพ</label>
                          </div>
                          </div>
                          <div class="col-6">
                          <div class="custom-file">
                            <input type="file" name="fileUpload2" class="custom-file-input" id="chooseFile" >
                            <label class="custom-file-label" for="chooseFile">แนบไฟล์</label>
                          </div>
                          </div>
                          </div>
                          
                          </div>

                          <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                            ยืนยัน
                          </button>
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
<?php include '../../config/jqscript.php' ?>

</body>
</html>
<?php } ?>