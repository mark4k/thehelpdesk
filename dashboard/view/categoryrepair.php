<?php 
session_start();
include '../../config/connect.php' ;
include '../../config/functions.php' ;

$sql = "SELECT r.id , fullname , description , status_id , order_date FROM orders AS r LEFT JOIN tblusers as au on au.id = r.cust_id";
$result = $conn->query($sql);
if ($_SESSION['id'] == "") {
  header("location: /thehelpdesk/config/login");
} else {
  include '../../config/header.php' ;
  include '../../config/nav.php' ;
?>
    <!-- Main content -->
    <section class="content">
      <?php include '../../config/cards/card_index.php' ;?>
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">รายการอุปกรณ์</h4>
                </div>
                <?php
                    $sql_provinces = "SELECT * FROM categories";
                    $query = mysqli_query($conn, $sql_provinces);
                ?>
                <div class="card-body table-responsive">
                <div class="col-xs-2">
                  <a class="btn btn-success" href="../insert/categoryrepair" role="button">เพิ่มประเภทแจ้งซ่อม <i class="fa fa-plus"></i></a>
                </div>
                    
                    <div class="table mt-2">
                    <table class="table" id="example">
                      <thead class=" text-primary">
                            <th class="text-primary">เลขประเภทงาน</th>
                            <th class="text-primary">ชื่อประเภทงาน</th>
                            <th class="text-primary">สีประเภทงาน</th>
                            <th class="text-primary"></th>
                      </thead>
                      <tbody>
                          <?php
                            $products = new DB_con();
                            $sql = $products->fetchdatacategory_repair();
                            while($row = mysqli_fetch_array($sql)) 
                            {
                          ?>
                      <tr>   
                            <td><?php echo $row['category_id'];?></td>
                            <td><?php echo $row['category_name'];?></td>
                            <td><span class="radius_1" style="background-color:<?php echo $row['category_color']; ?>">
                              <?php echo $row['category_color']; ?>
                            </span></td>
                            <td>
                            <a class="btn btn-danger"  href="../../config/delete/deletecategoryrepair.php?user_id=<?php echo $row['category_id'] ?>" role="button">
                          ลบ <i class="fas fa-trash-alt"></i></a>
                            </td>
                      </tr>
                        <?php } ?>
                      </tbody>
                    </table>
        </div>
      </div>
    </section>
  </div>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
<?php include '../../config/jqscript.php' ?>
<?php include '../../config/scchart.php' ?>
</body>
<?php } ?>
</html>
