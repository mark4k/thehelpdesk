<?php 
include '../../config/functions.php' ;
include '../../config/connect.php' ;
include '../../config/header.php' ;
include '../../config/nav.php' ;

$userdata = new DB_con();
if (isset($_POST['submit'])) {
    $fname = $_POST['fullname'];
    $uname = $_POST['username'];
    $uemail = $_POST['email'];
    $custaddr = $_POST['custaddr'];
    $password = md5($_POST['password']);
    $sql = $userdata->registration($fname, $uname, $uemail,$custaddr, $password);
  
    if ($sql) {
      echo '<script type="text/javascript">';
      echo 'setTimeout(function () { swal.fire({
        title: "สำเร็จ!",
        text: "สมัครสมาชิกเรียบร้อย",
        type: "success",
        icon: "success"
      });';
      echo '}, 1000 );</script>';
  
      echo '<script type="text/javascript">';
      echo 'setTimeout(function () { 
          window.location.href = "../view/user";';
      echo '}, 2000 );</script>';
    } else {
        echo "<script>alert('Something went wrong! Please try again.');</script>";
        echo "<script>window.location.href='/thehelpdesk/dashboard/insertform/users'</script>";
    }
  }
if ($_SESSION['id'] == "") {
  header("location: /thepos/config/login");
} else {
?>
    <!-- Main content -->
    <section class="content">
      <?php include '../config/cards/card_index.php' ;?>
        <!-- Main row -->
        <div class="container-fluid">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">เพิ่มข้อมูลผู้ใช้</h4>
                  </div>
                  <div class="card-body">
                  <div id="typography">
                    <form action="" method="post" enctype="multipart/form-data" class="mb-3">
                    <hr>
                    <div class="container">
                    <form method="post">
                      <div class="mb-3">
                          <label for="fullname" class="form-label" style="color:">ชื่อ-นามสกุล</label>
                          <input type="text" class="form-control" id="fullname" name="fullname" required> 
                      </div>
                      <div class="mb-3">
                          <label for="username" class="form-label" style="color:">ชื่อผู้ใช้</label>
                          <input type="text" class="form-control" id="username" name="username" onblur="checkusername(this.value)" required>
                          <span id="usernameavailable"></span>
                      </div>

                        <div class="mb-3">
                          <label for="username" class="form-label" style="color:">ที่อยู่</label>
                          <input type="text" class="form-control" id="custaddr" name="custaddr" onblur="checkusername(this.value)" required>
                          <span id="usernameavailable"></span>
                      </div>
                     
                      <div class="mb-3">
                      <label for="email" class="form-label" style="color:">อีเมล</label>
                          <input type="email" class="form-control" id="email" name="email" required>
                      </div>

                      <div class="mb-3">
                          <label for="password" class="form-label" style="color:">รหัสผ่าน</label>
                          <input type="password" class="form-control" id="password" name="password" required>
                      </div>
                    <button type="submit" name="submit" id="submit" class="btn btn-success">บันทึก</button>
                </form>
              </div>
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
<?php include '../config/jqscript.php' ?>

</body>
</html>
<?php } ?>