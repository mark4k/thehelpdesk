<?php 
include '../../config/connect.php' ;
include '../../config/functions.php' ;
include '../../config/header.php' ;
include '../../config/nav.php' ;
$userdata = new DB_con();


if ($_SESSION['id'] == "") {
  header("location: /thepos/config/login");
} else {
?>
    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  รายการผู้ใช้
                </h3>
               
              </div><!-- /.card-header -->
                <div class="tab-content p-0">
                <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
                <div class="card-header card-header-warning">
                  <p class="card-category"></p>
                    </div>
                    <div class="card-body">
                    <div class="col-xs-2">
                    <div class="col-xs-2">
                    
                    </div>
                    </div>
                    <div class="table mt-2 table-responsive">
                      <table class="table-striped mt-2" id="example">
                        <thead class=" text-primary">
                          <th class="text-primary">รูปภาพ</th>
                          <th class="text-primary">ชื่อ-นามสกุล</th>
                          <th class="text-primary">Username</th>
                          <th class="text-primary">หน่วยงาน</th>
                          <th class="text-primary">วันที่เพิ่ม</th>
                          <th class="text-primary">สถานะสิทธิ์</th>
                          <th class="text-primary"></th>
                        </thead>
                        <tbody>
                        <?php
                          $i=0;
                          $sql = $userdata->fetchdata();
                          while($row = mysqli_fetch_array($sql)) 
                          {
                          $i++;
                        ?>
                        <tr>
                          <td><img class="img-rounded"  height="100" width="100" src="/thehelpdesk/assets/img/profilepic/<?php echo $row['uploadpic']; ?>" onerror="this.src='/thehelpdesk/assets/img/nopic.jpg';" alt=""></td>
                          <td><?php echo $row['fullname'];?></td>
                          <td><?php echo $row['username'];?></td>
                          <td><?php echo $row['name_th'];?></td>
                          <td><?php echo $row['regdate'];?></td>
                          <?php if($row['role_id']==999) : ?>
                            <td><span class="text-spanex" style="background:#4FEE4A;font-weight:">ผู้ดูแลระบบ</span></td>
                          <?php endif; ?>
                          <?php if($row['role_id']==666) : ?>
                            <td><span class="text-spanex" style="background:#FF6347;font-weight:">Employee</span></td>
                          <?php endif; ?>
                          <?php if($row['role_id']==0) : ?>
                            <td><span class="text-spanex" style="background:#4AC9EE;font-weight:">พนักงาน</span></td>
                          <?php endif; ?>
                          <?php if($row['role_id']==2) : ?>
                            <td><span class="text-spanex" style="background:#879;font-weight:">ช่างซ่อม</span></td>
                          <?php endif; ?>
                          <td> 
                          <a class="btn btn-danger"  href="../insert/changerole/<?php echo $row['uid']; ?>" role="button">
                          แก้ไขสิทธิ์ : <i class="far fa-edit"></i></a>

                          <a class="btn btn-danger"  href="../../config/delete/deleteusers.php?user_id=<?php echo $row['uid'] ?>"  role="button">
                          ลบ : <i class="fas fa-trash"></i></a>
                          </td>
                        </tr>
                        <?php
                            }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <!-- /.card -->
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