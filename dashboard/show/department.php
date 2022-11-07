<?php 
include '../../config/connect.php' ;
include '../../config/functions.php' ;
include '../../config/header.php' ;
include '../../config/nav.php' ;
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
                  รายการหน่วยงาน
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
                    <div class="form-group">
                    <form action="" method="post">
                    <div class="form-group row">
                    <div class="col-xs-2">

                    <div class="col-xs-2">
                    <a class="btn btn-success" href="../insert/department" role="button">
                        เพิ่มรายการหน่วยงาน : <i class="fa fa-plus"></i></a>
                    <a class="btn btn-info" href="../show/position" role="button">
                        ดูรายการตำแหน่ง : <i class="fa fa-search"></i></a>
                    </div>
                    
                    </div>
                      <div class="table mt-2">
                      <table class="table" id="example">
                        <thead class=" text-primary">
                          <th class="text-primary">เลขที่หน่วยงาน</th>
                          <th class="text-primary">ชื่อหน่วยงาน (TH)</th>
                          <th class="text-primary">ชื่อหน่วยงาน (EN)</th>
                          <th class="text-primary">Line Token</th>
                          <th class="text-primary"></th>
                          </thead>
                        <tbody>
                        <?php
                          $products = new DB_con();
                          $sql = $products->fetchdapartment();
                          while($row = mysqli_fetch_array($sql)) 
                          {
                        ?>
                          <tr>
                            <td><?php echo $row['code'];?></td>
                            <td><?php echo $row['name_th'];?></td>
                            <td><?php echo $row['name_en'];?></td>
                            <td><?php echo $row['token_id'];?></td>
                            <td>
                            <a class="btn btn-warning" href="../insert/position/<?php echo $row['id']; ?>" target="_blank" role="button">
                            เพิ่มตำแหน่งพนักงาน : <i class="fa fa-edit"></i></a>
                            <a class="btn btn-danger"  href="../../config/delete/deletedepartment.php?user_id=<?php echo $row['id'] ?>"  role="button">
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