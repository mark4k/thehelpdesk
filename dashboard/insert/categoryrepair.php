<?php 

include '../../config/connect.php' ;
include '../../config/header.php' ;
include '../../config/nav.php' ;
include("../../config/insertrepaircategory.php"); 

$sqlcat = "SELECT * FROM category_repair where category_id  order by category_id  DESC";
$resultcat = $conn->query($sqlcat);
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
                <h4 class="card-title">เพิ่มข้อมูลประเภทงาน</h4>
                </div>
                  <div class="card-body">
                    <div id="typography">
                      <form action="" method="post" enctype="multipart/form-data" class="mb-3"><hr>
                        <div class="row">
                          <div class="col-sm">
                          <div class="mb-2">
                            <label for="product_name" class="form-label">ชื่อประเภทงาน</label>
                            <input type="text" class="form-control" id="category_name" name="category_name" onblur="checkusername(this.value)" required>
                            <span id="usernameavailable"></span>
                          </div>

                          <div class="mb-2">
                            <label for="product_name" class="form-label">สีของประเภทงาน</label>
                            <input type="text" class="jscolor form-control" id="category_color" name="category_color" onblur="checkusername(this.value)" required>
                            <span id="usernameavailable"></span>
                          </div>
                        
                        
                          </div>
                          </div>

                          <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                            เพิ่มข้อมูล
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