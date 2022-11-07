<?php 

include '../../config/connect.php' ;
include '../../config/header.php' ;
include '../../config/nav.php' ;
include("../../config/file-uploaddep.php");
$sql8 = "SELECT * FROM products where id";
$result8 = $conn->query($sql8);

?>
    <!-- Main content -->
    <section class="content">
      <?php include '../../config/cards/card_index.php' ;?>
        <!-- Main row -->
        <div class="container-fluid">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">เพิ่มข้อมูลหน่วยงาน</h4>
            </div>
            <div class="card-body">
              <div id="typography">
                 <form action="" method="post" enctype="multipart/form-data" class="mb-3"><hr>
                  <div class="row">
                    <div class="col-sm">

                        <div class="mb-2">
                            <label for="product_name" class="form-label">เลขที่หน่วยงาน</label>
                            <input type="text" class="form-control" id="code" name="code" >
                            <span id="usernameavailable"></span>
                        </div>
                        <div class="mb-2">
                            <label for="product_name" class="form-label">ชื่อหน่วยงาน (TH)</label>
                            <input type="text" class="form-control" id="name_th" name="name_th" >
                            <span id="usernameavailable"></span>
                        </div>
                        <div class="mb-2">
                            <label for="product_name" class="form-label">ชื่อหน่วยงาน (EN)</label>
                            <input type="text" class="form-control" id="name_en" name="name_en" >
                            <span id="usernameavailable"></span>
                        </div>

                        <div class="mb-2">
                            <label for="product_name" class="form-label">Line Token</label>
                            <input type="text" class="form-control" id="token_id" name="token_id" >
                            <span id="usernameavailable"></span>
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