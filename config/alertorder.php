<?php 

$sqla = "SELECT count(repair_id) as oid FROM `repair` WHERE status_id=0";
$resulta = $conn->query($sqla);
$rowa = $resulta ->fetch_assoc();
$alerts = $rowa['oid'];
if ($rowa['oid']>0) {
    
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal.fire({
        showDenyButton: true,
  confirmButtonText: `ดูรายการ`,
  confirmButtonColor: "orange",
  denyButtonText: `ยกเลิก`,
        title: "มีรายการเปิดงานแจ้งซ่อม '.$alerts.' รายการ!",
        type: "warning",
        icon: "warning"
    })
    .then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          window.location = "/thehelpdesk/dashboard/show/repairdisplay";
        } else if (result.isDenied) {
            swal.fire({
          confirmButtonText: `ตกลง`,
          denyButtonText: `ยกเลิก`,
                title: "ดูภายหลัง ",
                confirmButtonColor: "orange",
                type: "success",
                icon: "success"
            })
        }
      });';
    echo '}, 500 );</script>';

}

?>
