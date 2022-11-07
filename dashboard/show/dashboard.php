<?php 
include '../config/connect.php' ;
include '../config/functions.php' ;
include '../config/header.php' ;
include '../config/nav.php' ;
$userdata = new DB_con();
if ($_SESSION['id'] == "") {
  header("location: /thepos/config/login");
} else {
?>
    <section class="content">
    <?php include '../config/cards/card_index.php' ;?>
        <div class="row">
          <section class="col-lg-6 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  รายการขายอุปกรณ์
                </h3>
               
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                <form action="" method="post">
                  <div class="form-group row">
                  <div class="col-xs-2">
                  <input type="date" class="form-control" id="datestart" name="datestart" value="">
                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="col-xs-2">
                    <input type="date" class="form-control" id="dateend" name="dateend" value="">
                    </div>&nbsp; 
                  <div class="col-xs-2">
                  <input class="btn btn-info"  type="submit" name="submit" value="ค้นหารายการสั่งซื้อ">&nbsp; 
                  </div>
                  </div>
                  
                <div class="product-content-right">
                        <table class="table table-hover mt-5" id="dashboard">
                        <thead >
                        <tr>
                        <th>เลขที่สั่งซื้อ</th>
                        <th>วันที่สั่งซื้อ</th>
                        <th>ชื่อลูกค้า</th>
                        <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php 
                        $userid = $_SESSION['id'];
                        $updateuser = new DB_con();                         
                        $datestart = $_POST['datestart'];
                        $dateend = $_POST['dateend'];
                        $sql = $updateuser->fetchdata_order_dashboard($userid,$datestart ,$dateend);
                        while($row = mysqli_fetch_array($sql)) { $status_id=$row['status_id']; ?>

                        <tr>
                        <td><?php echo $row['report_id']; ?></td>
                        <td><?php echo $row['order_date']; ?></td>
                        <td><?php echo $row['fullname']; ?></td> 
                       
                        <td>
                        <a class="btn btn-warning"
                                        data-toggle="modal"
                                        data-target="#myModal"
                                        data-id="<?php echo $row['oid']; ?>">ดูรายการ <i class="fa fa-search"></i></a>
                        <a class="btn btn-danger" href="../config/mpdf/index?itemId=<?php echo $row['oid']; ?>" target="_blank" role="button">
                        ออกบิล <i class="fa fa-print"></i></a>
                        <?php if($status_id==0) : ?>
                        </td>
                        <?php endif; ?> 
                        </tr>
                        <?php }?>
                        </table>
                        </form>
                    </div>  
                  </div>
            <!-- /.card -->
          </section>

          <section class="col-lg-6 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card" >
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  รายงานอุปกรณ์ขายดี
                </h3>
               
              </div><!-- /.card-header -->
                <div class="tab-content p-0">
                <div class="product-content-right">
                  <div class="card-header card-header-warning">
                    <div class="ct-chart" id="barchart"></div>
                  </div>
                  <div class="card-body">
                    <p class="category">
                      <span class="text-success"><i class="fa fa-long-arrow-up"></i></span> จำนวนยอดขายอุปกรณ์แต่ละชิ้น.</p>
                  </div>
                  </div>
            <!-- /.card -->
          </section>
         
          <section class="col-lg-4 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  รายการอุปกรณ์ที่ใกล้หมดสต็อค
                </h3>
               
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <div class="product-content-right">
                        <table class="table table-hover" id="dashboard2">
                            <thead >
                              <tr>
                                <th>Code</th>
                                <th>ชื่ออุปกรณ์</th>
                                <th>จำนวนคงเหลือ</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                              $updateuser = new DB_con();              
                              $sql = $updateuser->fetchdata_order_lowqty($userid,$datestart ,$dateend);
                              while($row = mysqli_fetch_array($sql)) { ?>
                              <tr>
                                <td><?php echo $row['product_code']; ?></td>
                                <td><?php echo $row['product_name']; ?></td>
                                
                                <?php if($row['qty']<=0) : ?>
                                <td>อุปกรณ์หมดสต็อค</td>
                                <?php endif; ?> 
                                <?php if($row['qty']>0) : ?>
                                <td><?php echo $row['qty']; ?></td>
                                <?php endif; ?> 
                              </tr>
                              <?php }?>
                        </table>
                    </div>  
                  </div>
            <!-- /.card -->
          </section>
          <section class="col-lg-4 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  รายได้ในแต่ละวัน
                </h3>
               
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                
                <div class="product-content-right">
                        <table class="table table-hover">
                        <thead >
                        <tr>
                        <th>วัน</th>
                        <th>รายได้(ต่อวัน)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $updateuser = new DB_con();              
                        $sql = $updateuser->fetchdata_day_income();
                        while($row = mysqli_fetch_array($sql)) { ?>
                        <tr>
                        <td><?php echo $row['incomeday']." ".$row['incomedays']; ?></td>
                        <td><?php echo number_format($row['daytotal']); ?> บาท</td>
                        <?php }?>
                        </table>
                    </div>  
                  </div>
            <!-- /.card -->
          </section>
          <section class="col-lg-4 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  รายการอุปกรณ์ขายดี
                </h3>
               
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                
                <div class="product-content-right">
                        <table class="table table-hover" id="popproduct">
                        <thead >
                        <tr>
                        <th>ชื่ออุปกรณ์</th>
                        <th>จำนวนขาย</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $updateuser = new DB_con();              
                        $sql = $updateuser->fetchdata_poppularproduct();
                        while($row = mysqli_fetch_array($sql)) { ?>
                        <tr>
                        <td><?php echo $row['productname']; ?></td>
                        <td><?php echo $row['totalpd']; ?> ชิ้น</td>
                        </tr>
                        <?php }?>
                        </table>
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
<?php include '../../config/lib/modal_reportmontsh.php' ; ?>
<?php include '../config/jqscript.php' ?>
<?php include '../config/scchart.php' ?>

</body>
</html>
<?php } ?>