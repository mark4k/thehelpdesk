
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">รายการแจ้งซ่อมของฉัน</h4>
                </div>
                <div class="card-body table-responsive">
                
                <table id="dashboard" class="table table-hover">
                    <thead class="text-primary">
                      <th>เลขที่แจ้งซ่อม</th>
                      <th>รายละเอียด</th>
                      <th>ไฟล์แนบ</th>
                      <th>ประเภทงาน</th>
                      <th>สถานะ</th>
                      <th>จัดการใบแจ้งซ่อม</th>
                    </thead>
                    <tbody>
                    <?php if($role_id!=999) : ?>
                    <?php 
                        while($row = mysqli_fetch_array($result)) {
                      ?>
                      <tr>
                        <td><?php echo $row['repair_code'];?></td>
                        <td>
                        ชื่อผู้แจ้ง : <?php echo $_SESSION['fname'];?> <br>
                        วันที่แจ้ง : <?php echo $row['repair_date'];?> <br>
                        รายละเอียด :<?php echo $row['repair_detail'];?>
                        </td>
                        <?php if($row['uploadfiles']!=null) : ?>
                        <td><a href="../../assets/img/repairfiles/<?php echo $row['uploadfiles'];?>"><?php echo $row['uploadfiles'];?></a></td>
                        <?php endif; ?>
                        <?php if($row['uploadfiles']==null) : ?>
                        <td>ไม่มีไฟล์แนบ</td>
                        <?php endif; ?>
                        <td><span class="radius_1" style="background-color:<?php echo $row['category_color']; ?>">
                            <?php echo $row['category_name']; ?>
                          </span></td>
                        <?php if($row['pid']==0) : ?>
                            <td><span class="radius_1" style="background-color:#35BFFF;font-weight:">เปิดงาน <i class="fas fa-exclamation-circle"></i></a></span></td>
                          <?php endif; ?>
                          <?php if($row['pid']==1) : ?>
                          <td><span class="radius_1" style="background-color:#FFBC35;font-weight:">เริ่มงาน <i class="fas fa-chart-line"></i></span></td>
                          <?php endif; ?>
                          <?php if($row['pid']==2) : ?>
                          <td><span class="radius_1" style="background-color:#35FF3B;font-weight:">ปิดงาน <i class="fas fa-check"></i></span></td>
                          <?php endif; ?>
                          <td>
                          <a class="btn btn-primary" href="/thehelpdesk/dashboard/insert/repairdetail/<?php echo $row['repair_id']; ?>" role="button">
                          รายละเอียด : <i class="fa fa-search"></i></a>

                          <a class="btn btn-info" href="/thehelpdesk/config/mpdf/index/<?php echo $row['repair_id']; ?>" role="button">
                          พิมพ์ใบแจ้งซ่อม : <i class="fa fa-print"></i></a>
                         
                          </td>

                      </tr>
                      <?php
                            }
                      ?>
                      <?php endif; ?>
                      <?php if($role_id==999 or $role_id==2) : ?>
                      <?php 
                        while($row_admin = mysqli_fetch_array($result_admin)) {
                      ?>
                      <tr>
                        <td><?php echo $row_admin['repair_code'];?></td>
                        <td>
                        ชื่อผู้แจ้ง : <?php echo $row_admin['fullname'];?> <br>
                        วันที่แจ้ง : <?php echo $row_admin['repair_date'];?> <br>
                        รายละเอียด : <?php echo $row_admin['repair_detail'];?>
                        </td>
                        <?php if($row_admin['uploadfiles']!=null) : ?>
                        <td><a href="../../assets/img/repairfiles/<?php echo $row_admin['uploadfiles'];?>"><?php echo $row_admin['uploadfiles'];?></a></td>
                        <?php endif; ?>
                        <?php if($row_admin['uploadfiles']==null) : ?>
                        <td>ไม่มีไฟล์แนบ</td>
                        <?php endif; ?>
                        <td><span class="radius_1" style="background-color:<?php echo $row_admin['category_color']; ?>">
                            <?php echo $row_admin['category_name']; ?>
                          </span></td>
                          <?php if($row_admin['status_id']==0) : ?>
                            <td><span class="radius_1" style="background-color:#35BFFF;font-weight:">เปิดงาน <i class="fas fa-exclamation-circle"></i></a></span></td>
                          <?php endif; ?>
                          <?php if($row_admin['status_id']==1) : ?>
                          <td><span class="radius_1" style="background-color:#FFBC35;font-weight:">เริ่มงาน <i class="fas fa-chart-line"></i></span></td>
                          <?php endif; ?>
                          <?php if($row_admin['status_id']==2) : ?>
                          <td><span class="radius_1" style="background-color:#35FF3B;font-weight:">ปิดงาน <i class="fas fa-check"></i></span></td>
                          <?php endif; ?>
                          <td>
                          <a class="btn btn-primary" href="/thehelpdesk/dashboard/insert/repairdetail/<?php echo $row_admin['repair_id']; ?>" role="button">
                          รายละเอียด : <i class="fa fa-search"></i></a>

                          <a class="btn btn-info" href="/thehelpdesk/config/mpdf/index/<?php echo $row_admin['repair_id']; ?>" role="button">
                          พิมพ์ใบแจ้งซ่อม : <i class="fa fa-print"></i></a>

                          <?php if($role_id==888) : ?>
                          <a class="btn btn-danger" href="#" role="button">
                          <i class="material-icons">block</i> ลบ</a>
                          <?php endif; ?>
                          </td>

                      </tr>
                      <?php
                            }
                      ?>
                      <?php endif; ?>
                    </tbody>
                  </table>
                  </table>
            <!-- /.card -->
          </section>