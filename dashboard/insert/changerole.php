<?php 
include '../../config/functions.php' ;
include '../../config/connect.php' ;
include '../../config/header.php' ;
include '../../config/nav.php' ;

$rid = $_GET['repair_id'];

$sql = "SELECT * FROM tblusers  where id ='$rid'";
$result = $conn->query($sql);
$mem = $result ->fetch_assoc();

$updatedata2 = new DB_con();

if (isset($_POST['update'])) {

    $uid = $_POST['uid'];
    $role_id = $_POST['role_id'];
    $line_token = $_POST['line_token'];
    
    $sqll = $updatedata2->updaterole($role_id,$uid,$line_token);
    if ($sqll) {
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal.fire({
          title: "สำเร็จ!",
          text: "แก้ไขข้อมูลเรียบร้อย",
          type: "success",
          icon: "success"
        });';
        echo '}, 500 );</script>';

        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { 
            window.location.href = "/thehelpdesk/dashboard/show/user";';
        echo '}, 2000 );</script>';
    } else {
        echo "<script>alert('Something went wrong! Please try again!');</script>";
        echo "<script>window.location.href='/thehelpdesk/dashboard/insert/changerole/$rid'</script>";
    }
}

?>
<style type="text/css">
div#repair_detail{
    width:650px;
    word-wrap:break-word;
}

div#repair_cause{
    width:700px;
    word-wrap:break-word;
}

.label 
{
    color: white;
    padding: 8px;
    font-family: 'Kanit', sans-serif;
}
.success {background-color: #FF33FF;} /* Green */
.info {background-color: #2196F3;} /* Blue */
.warning {background-color: #ff9800;} /* Orange */
.danger {background-color: #f44336;} /* Red */ 
.other {background-color: #e7e7e7; color: black;} /* Gray */ 

</style> 

    <!-- Main content -->
    <section class="content">
      <?php include '../../config/cards/card_index.php' ;?>
        <!-- Main row -->
        <div class="container-fluid">
          <div class="card">
            <div class="card-header card-header-danger">
              <h4 class="card-title">แก้ไขสิทธิ์ของผู้ใช้งาน</h4>
            </div>
            <div class="card-body">
              <div id="typography">

	<div class="modal-body">
		
                    
        <div class="row" >    
            <div class="col-md-12" id="repair_cause">
				<label  class="control-label">ชื่อผู้ใช้ :</label>
					<?php echo $mem['fullname'] ;?>
            </div>
        </div>

        <div class="row" >    
            <div class="col-md-12" id="repair_cause">
				<label class="control-label">สิทธิ์ :</label>

                <?php if($mem['role_id']!=999) : ?>
                    พนักงาน
                <?php endif; ?>
                <?php if($mem['role_id']==999) : ?>
                    ผู้ดูแลระบบ
                <?php endif; ?>
					
            </div>
        </div>
   
       <form action="" method="post" enctype="multipart/form-data" class="mb-3">
          
        <hr>
        <div class="row">
        <div class="col-sm">

            <div class="mb-2">
                <label for="qty" style="width: 300px; display: none;" class="form-label">Users Id</label>
                <input type="text" style="width: 300px; display: none;" class="form-control" id="uid" name="uid" value="<?php echo $mem['id'] ;?>">
               
            </div>

            <div class="mb-2">
                <label for="qty" style="width: 300px; display: ;" class="form-label">Line Token</label>
                <input type="text" style="" class="form-control" id="line_token" name="line_token" placeholder="กรอก Line Token" value="<?php echo $mem['line_token'] ;?>">
               
            </div>

            <div class="mb-2">
                <label for="qty" class="form-label">สิทธ์เข้าใช้งาน</label>
                
                <select class="form-control" id="role_id" name="role_id"">
                <option value="999">ผู้ดูแลระบบ</option>
                <option value="2">ช่าง</option>
                <option value="0">พนักงาน</option>
                </select>
            </div>
            <button type="submit" name="update" class="btn btn-danger btn-block mt-4" onclick="showNotification2('top','right')">
                แก้ไขสิทธิ์
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