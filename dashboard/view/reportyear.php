<?php 
session_start();
error_reporting(0);
include '../../config/connect.php' ;
if ($_SESSION['id'] == "") {
  header("location: /thehelpdesk/config/login");
} else {
include '../../config/header.php' ;
include '../../config/nav.php' ;
?>
    <section class="content">
      <?php include '../../config/cards/card_index.php' ;?>
        <div class="row">
          <section class="col-lg-12 connectedSortable">
            <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">รายงานแจ้งซ่อมแยกตามปี <?php echo $tdec ?></h4>
                </div>
                <div class="card-body table-responsive">
                   
                  <div class="chart">
                    <canvas id="myChart" style="position: relative; height:70vh; width:80vw"></canvas>
                  </div>   
                 
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
