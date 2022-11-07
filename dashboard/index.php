<?php 
include '../config/lib/query_index.php' ;
if ($_SESSION['id'] == "") {
  header("location: /thehelpdesk/login");
} else {
include '../config/header.php' ;
include '../config/nav.php' ;
?>
    <section class="content">
    <?php include '../config/cards/card_index.php' ;?>
        <div class="row">
          <?php if($role_id==999) : ?>
          
          <?php include '../config/lib/chart.php'; ?>
          <?php endif; ?>
          <?php include '../config/lib/adminusertable.php'; ?>
        </div>
        
      </div>
    </section>
  </div>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
<?php include '../config/lib/modal_index.php' ; ?>
</div>
<?php include '../config/jqscript.php' ?>
<?php include '../config/scchart.php' ?>
</body>
<?php } ?>
</html>
