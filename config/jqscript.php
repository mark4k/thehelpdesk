
<!-- jQuery UI 1.11.4 -->

<script src="/thehelpdesk/assets/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->

<script src="/thehelpdesk/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/thehelpdesk/assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/thehelpdesk/assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/thehelpdesk/assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/thehelpdesk/assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/thehelpdesk/assets/plugins/jquery-knob/jquery.knob.min.js"></script>

<!-- daterangepicker -->
<script src="/thehelpdesk/assets/plugins/moment/moment.min.js"></script>
<script src="/thehelpdesk/assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/thehelpdesk/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/thehelpdesk/assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/thehelpdesk/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/thehelpdesk/assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/thehelpdesk/assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/thehelpdesk/assets/dist/js/pages/dashboard.js"></script>
<script>
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#imgPlaceholder').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  }
  $("#chooseFile").change(function () {
    readURL(this);
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable( {
      "bDestroy": true,
        dom: 'Bfrtip',
        "language": {
          "search": "ค้นหา:",
          "emptyTable": "ไม่มีรายการ"
        } ,
        "oLanguage": {
         "sInfo": "แสดงข้อมูลที่ _START_ ถึง _END_ จาก _TOTAL_ รายการ",
         "sInfoEmpty": "แสดงข้อมูลที่ 0 ถึง 0 จาก 0 รายการ",
         "oPaginate": {
          "sPrevious": "ย้อนกลับ",
           "sNext": "หน้าต่อไป"
         }
        },
      
        "aaSorting": [[ 1, "desc" ]] ,
        buttons: [
            'copy', 'excel','print'
        ]
    } );
    
} );

$(document).ready(function() {
    $('#indextable').DataTable( {
        dom: 'Bfrtip',
        "language": {
          "search": "ค้นหา:",
          "emptyTable": "ไม่มีรายการ"
        } ,
        "oLanguage": {
         "sInfo": "แสดงข้อมูลที่ _START_ ถึง _END_ จาก _TOTAL_ รายการ",
         "sInfoEmpty": "แสดงข้อมูลที่ 0 ถึง 0 จาก 0 รายการ",
         "oPaginate": {
          "sPrevious": "ย้อนกลับ",
           "sNext": "หน้าต่อไป"
         }
        },
        "pageLength": 15 ,
        "aaSorting": [[ 0, "desc" ]] ,
        buttons: [
            'copy', 'excel','print'
        ]
    } );
    
} );

$(document).ready(function() {
    $('#dashboard').DataTable( {
        dom: 'Bfrtip',
        "language": {
          "search": "ค้นหา:",
          "emptyTable": "ไม่มีรายการ"
        } ,
        "oLanguage": {
         "sInfo": "แสดงข้อมูลที่ _START_ ถึง _END_ จาก _TOTAL_ รายการ",
         "sInfoEmpty": "แสดงข้อมูลที่ 0 ถึง 0 จาก 0 รายการ",
         "oPaginate": {
          "sPrevious": "ย้อนกลับ",
           "sNext": "หน้าต่อไป"
         }
        },
        "pageLength": 15 ,
        "aaSorting": [[ 0, "desc" ]] ,
        buttons: [
            'copy', 'excel','print'
        ]
    } );
    
} );

$(document).ready(function() {
    $('#dashboard2').DataTable( {
      dataType:'json',
        dom: 'Bfrtip',
        "language": {
          "search": "ค้นหา:",
          "emptyTable": "ไม่มีรายการ"
        } ,
        "oLanguage": {
         "sInfo": "แสดงข้อมูลที่ _START_ ถึง _END_ จาก _TOTAL_ รายการ",
         "sInfoEmpty": "แสดงข้อมูลที่ 0 ถึง 0 จาก 0 รายการ",
         "oPaginate": {
          "sPrevious": "ย้อนกลับ",
           "sNext": "หน้าต่อไป"
         }
        },
        "pageLength": 5 ,
        "aaSorting": [[ 1, "desc" ]] ,
        buttons: [
            'copy', 'excel','print'
        ]
    } );
    
} );

$(document).ready(function() {
    $('#example2').DataTable( {
        dom: 'Bfrtip',
        "language": {
          "search": "ค้นหา:",
          "emptyTable": "ไม่มีรายการ"
        } ,
        "oLanguage": {
         "sInfo": "แสดงข้อมูลที่ _START_ ถึง _END_ จาก _TOTAL_ รายการ",
         "sInfoEmpty": "แสดงข้อมูลที่ 0 ถึง 0 จาก 0 รายการ",
         "oPaginate": {
          "sPrevious": "ย้อนกลับ",
           "sNext": "หน้าต่อไป"
         }
        },
        buttons: [
            'copy','excel','print'
        ]
    } );
} );

$('#provinces').change(function() {
    var id_province = $(this).val();
      $.ajax({
      type: "POST",
      url: "../../config/ajax_db.php",
      data: {id:id_province,function:'provinces'},
      success: function(data){
          $('#amphures').html(data); 
          $('#districts').html(' '); 
          $('#districts').val(' ');  
          $('#zip_code').val(' '); 
      }
    });
  });

  $('#amphures').change(function() {
    var id_amphures = $(this).val();

      $.ajax({
      type: "POST",
      url: "../../config/ajax_db.php",
      data: {id:id_amphures,function:'amphures'},
      success: function(data){
          $('#districts').html(data);  
      }
    });
  });

   $('#districts').change(function() {
    var id_districts= $(this).val();

      $.ajax({
      type: "POST",
      url: "../../config/ajax_db.php",
      data: {id:id_districts,function:'districts'},
      success: function(data){
          $('#zip_code').val(data)
      }
    });
  
  });

  $('#allproduct').dataTable({
        dom: 'Bfrtip',
        "language": {
          "search": "ค้นหา:",
          "emptyTable": "ไม่มีรายการ"
        } ,
        "pageLength": 7 ,
        "oLanguage": {
         "sInfo": "แสดงข้อมูลที่ _START_ ถึง _END_ จาก _TOTAL_ รายการ",
         "sInfoEmpty": "แสดงข้อมูลที่ 0 ถึง 0 จาก 0 รายการ",
         "oPaginate": {
          "sPrevious": "ย้อนกลับ",
           "sNext": "หน้าต่อไป"
         }
        },
        "aaSorting": [[ 1, "asc" ]] ,
        buttons: [
            'copy','excel','print'
        ]
    } );
      $('#lowqtyproduct').dataTable({
        dom: 'Bfrtip',
        "language": {
          "search": "ค้นหา:",
          "emptyTable": "ไม่มีรายการ"
        } ,
        "oLanguage": {
         "sInfo": "แสดงข้อมูลที่ _START_ ถึง _END_ จาก _TOTAL_ รายการ",
         "sInfoEmpty": "แสดงข้อมูลที่ 0 ถึง 0 จาก 0 รายการ",
         "oPaginate": {
          "sPrevious": "ย้อนกลับ",
           "sNext": "หน้าต่อไป"
         }
        },
        buttons: [
            'copy','excel','print'
        ]
    } );
      $('#disableproduct').dataTable({
        dom: 'Bfrtip',
        "language": {
          "search": "ค้นหา:",
          "emptyTable": "ไม่มีรายการ"
        } ,
        "oLanguage": {
         "sInfo": "แสดงข้อมูลที่ _START_ ถึง _END_ จาก _TOTAL_ รายการ",
         "sInfoEmpty": "แสดงข้อมูลที่ 0 ถึง 0 จาก 0 รายการ",
         "oPaginate": {
          "sPrevious": "ย้อนกลับ",
           "sNext": "หน้าต่อไป"
         }
        },
        buttons: [
            'copy','excel','print'
        ]
    } );
      $('#padmin').dataTable( {
        dom: 'Bfrtip',
        "language": {
          "search": "ค้นหา:",
          "emptyTable": "ไม่มีรายการ"
        } ,
        "oLanguage": {
         "sInfo": "แสดงข้อมูลที่ _START_ ถึง _END_ จาก _TOTAL_ รายการ",
         "sInfoEmpty": "แสดงข้อมูลที่ 0 ถึง 0 จาก 0 รายการ",
         "oPaginate": {
          "sPrevious": "ย้อนกลับ",
           "sNext": "หน้าต่อไป"
         }
        },
        "aaSorting": [[ 0, "desc" ]] ,
        buttons: [
            'copy','excel','print'
        ]
    });
      $('#puser').dataTable( {
        dom: 'Bfrtip',
        "language": {
          "search": "ค้นหา:",
          "emptyTable": "ไม่มีรายการ"
        } ,
        "oLanguage": {
         "sInfo": "แสดงข้อมูลที่ _START_ ถึง _END_ จาก _TOTAL_ รายการ",
         "sInfoEmpty": "แสดงข้อมูลที่ 0 ถึง 0 จาก 0 รายการ",
         "oPaginate": {
          "sPrevious": "ย้อนกลับ",
           "sNext": "หน้าต่อไป"
         }
        },
        "aaSorting": [[ 0, "desc" ]] ,
        buttons: [
            'copy','excel','print'
        ]
    });
</script>

<script language="javascript">
function fncCal()
{
	var tot = 0;
	var sum = 0;
	for(i=1;i<=document.form1.hdnLine.value;i++)
	{
		tot = parseInt(eval("document.form1.txtVol1_"+i+".value")) - parseInt(eval("document.form1.txtVol2_"+i+".value"))
		eval("document.form1.txtVol3_"+i+".value="+tot);
		sum = tot + sum;
		document.form1.txtSum.value=sum;
	}
}
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript">

    function sweet() {
        Swal.fire({
  title: 'ต้องการออกจากระบบหรือไม่ ?',
  showDenyButton: true,
  confirmButtonText: `ใช่`,
  denyButtonText: `ไม่`,
  icon: 'warning'
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    Swal.fire('ออกจากระบบเรียบร้อย', '', 'success')
    window.location = "/thehelpdesk/config/logout";
  } else if (result.isDenied) {
    Swal.fire('อยู่ในระบบต่อ', '', 'success')
  }
})
}  

function sweet2() {
        Swal.fire({
  title: 'ไม่สามารถทำรายการนี้ได้ !',
  showDenyButton: true,
  denyButtonText: `ออก`,
  icon: 'warning'
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    Swal.fire('ขอบคุณครับ', '', 'success')
  } else if (result.isDenied) {
    Swal.fire('ขอบคุณครับ', '', 'success')
  }
})
}

$('#myModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attribute    
        var rid = button.data('id')
        var modal = $(this);
        var dataString = 'id=' + recipient;
          $.ajax({
              type: "GET",
              url: "/thehelpdesk/config/bill.php?itemId="+rid,
              data: dataString,
              cache: false,
              success: function (data) {
                  console.log(data);
                  modal.find('.dash').html(data);
              },
              error: function(err) {
                  console.log(err);
              }
          });
  })
  

  $('#detailproduct').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attribute    
        var rid = button.data('id')
        var modal = $(this);
        var dataString = 'id=' + recipient;
          $.ajax({
              type: "GET",
              url: "/thehelpdesk/config/popup_model.php?repair_id="+rid,
              data: dataString,
              cache: false,
              success: function (data) {
                  console.log(data);
                  modal.find('.dash').html(data);
              },
              error: function(err) {
                  console.log(err);
              }
          });
  })
  $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attribute    
        var rid = button.data('id')
        var modal = $(this);
        var dataString = 'id=' + recipient;
          $.ajax({
              type: "GET",
              url: "/thehelpdesk/config/popup_model.php?repair_id="+rid,
              data: dataString,
              cache: false,
              success: function (data) {
                  console.log(data);
                  modal.find('.dash').html(data);
              },
              error: function(err) {
                  console.log(err);
              }
          });
  })
  $('#exampleModal2').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attribute    
        var rid = button.data('id')
        var modal = $(this);
        var dataString = 'id=' + recipient;
          $.ajax({
              type: "GET",
              url: "/thehelpdesk/config/popup_model2.php?repair_id="+rid,
              data: dataString,
              cache: false,
              success: function (data) {
                  console.log(data);
                  modal.find('.dash').html(data);
              },
              error: function(err) {
                  console.log(err);
              }
          });
  })
  $('#exampleModal3').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attribute    
          var rid = button.data('id')
          var modal = $(this);
          var dataString = 'id=' + recipient;
            $.ajax({
                type: "GET",
                url: "/thehelpdesk/config/popup_model3.php?repair_id="+rid,
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.dash').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
</script>

<script>
const str1 = 'Hello';
var connectUrl = "http://icons.iconarchive.com/icons/yellowicon/game-stars/256/Mario-icon.png";
$("<img>")
.on("load", function () {
    $(".connect-status").addClass("connected").str2.concat(str1);

})
.attr("src", connectUrl + '?' + Math.random());
</script>


<script src="../../config/jscolor.js"></script>
