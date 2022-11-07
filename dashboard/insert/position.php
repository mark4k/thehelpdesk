<?php 

include '../../config/connect.php' ;
include '../../config/header.php' ;
include '../../config/nav.php' ;
include("../../config/file-uploadpos.php");
$posid = $_GET['itemId'];
$sql = "SELECT provinces.name_th as proname , provinces.id as pid FROM provinces  where provinces.id ='$posid'";
$result = $conn->query($sql);
$mem = $result ->fetch_assoc();

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
              <h4 class="card-title">เพิ่มข้อมูลตำแหน่ง</h4>
            </div>
            <div class="card-body">
            <div class="row" >    
            <div class="col-md-12" id="repair_cause">
				<label  class="control-label">ชื่อแผนก :</label>
					<?php echo $mem['proname'] ;?>
            </div>
            </div>
              <div id="typography">
                 <form action="" method="post" enctype="multipart/form-data" class="mb-3"><hr>
                  <div class="row">
                    <div class="col-sm">
                    <input type="text" class="form-control" style="width: 300px; display: none;" id="province_id" name="province_id" value="<?php echo $mem['pid'] ;?>" >
                        <div class="mb-2">
                            <label for="product_name" class="form-label">รหัสตำแหน่ง</label>
                            <input type="text" class="form-control" id="code" name="code" >
                            <span id="usernameavailable"></span>
                        </div>
                        <div class="mb-2">
                            <label for="product_name" class="form-label">ชื่อตำแหน่ง (TH)</label>
                            <input type="text" class="form-control" id="name_th" name="name_th" >
                            <span id="usernameavailable"></span>
                        </div>
                        <div class="mb-2">
                            <label for="product_name" class="form-label">ชื่อตำแหน่ง (EN)</label>
                            <input type="text" class="form-control" id="name_en" name="name_en" >
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