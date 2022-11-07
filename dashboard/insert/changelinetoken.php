<?php 


include '../../config/header.php' ;
include '../../config/nav.php' ;
include '../../config/functions.php' ;
include '../../config/connect.php' ;

$sql = "SELECT * FROM linetoken  ";
$result = $conn->query($sql);
$mem = $result ->fetch_assoc();

$updatedata2 = new DB_con();

if (isset($_POST['update'])) {
    $lid = $_POST['lid'];
    $token = $_POST['token'];
    $sqll = $updatedata2->updatetoken($token,$lid);
    if ($sqll) {
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal.fire({
            title: "สำเร็จ!",
            text: "แก้ไข Token เรียบร้อย",
            type: "success",
            icon: "success"
        });';
        echo '}, 500 );</script>';

        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { 
            window.location.href = "../insert/changelinetoken";';
        echo '}, 2000 );</script>';
    } else {
        echo "<script>alert('Something went wrong! Please try again!');</script>";
        echo "<script>window.location.href='changerole?repair_id=$rid'</script>";
    }
}

?>


    <!-- Main content -->
    <section class="content">
      <?php include '../../config/cards/card_index.php' ;?>
        <!-- Main row -->
        <div class="container-fluid">
                   <div class="card">
                    <div class="card-header card-header-success">
                    <h4 class="card-title">แก้ไข LineToken</h4>
                    </div>
                    <div class="card-body">
                    <div id="typography">
	                <div class="modal-body">
                    <div class="row" >    
                        <div class="col-md-12" id="repair_cause">
                            <label class="control-label">สามารถขอ Token ได้ที่ https://notify-bot.line.me/en/</label>
                        </div>
                    </div>
                                
                    <div class="row" >    
                        <div class="col-md-12" id="repair_cause">
                            <label class="control-label">Token ปัจจุบัน :</label>
                                <?php echo $mem['token'] ;?>
                        </div>
                    </div>

                    <div class="row" >    
                        <div class="col-md-12" id="repair_cause">
                            <label class="control-label">แก้ไขล่าสุดวันที่ :</label>
                                <?php echo $mem['date_token'] ;?>
                        </div>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data" class="mb-3"> <hr>
                    <div class="row">
                    <div class="col-sm">
                    <div class="mb-2">
                        <input type="text" class="form-control" style="width: 300px; display: none;" id="lid" name="lid" value="<?php echo $mem['id'] ;?>">
                    </div>
                    <div class="mb-2">
                        <label for="qty" class="form-label">Token</label>
                        <input type="text" class="form-control" id="token" name="token" value="">
                    </div>
                    <button type="submit" name="update" class="btn btn-success btn-block mt-4" onclick="showNotification2('top','right')">
                        แก้ไข Token
                    </button>
                    </form>
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