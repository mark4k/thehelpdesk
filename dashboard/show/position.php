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
                  รายการตำแหน่งพนักงาน
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

                    </div>
                      <div class="table mt-2">
                      <table class="table" id="example">
                        <thead class=" text-primary">
                          <th class="text-primary">เลขที่ตำแหน่ง</th>
                          <th class="text-primary">ชื่อตำแหน่ง (TH)</th>
                          <th class="text-primary">ชื่อตำแหน่ง (EN)</th>
                          <th class="text-primary"></th>
                          </thead>
                        <tbody>
                        <?php
                          $products = new DB_con();
                          $sql = $products->fetchposition();
                          while($row = mysqli_fetch_array($sql)) 
                          {
                        ?>
                          <tr>
                            <td><?php echo $row['code'];?></td>
                            <td><?php echo $row['name_th'];?></td>
                            <td><?php echo $row['name_en'];?></td>
                            <td>
                            <a class="btn btn-danger"  href="../../config/delete/deleteposition.php?user_id=<?php echo $row['id'] ?>"  role="button">
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