<script src="../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script src="../../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="../../node_modules/sweetalert2/dist/sweetalert2.min.css">
<?php 
    include_once('../functions.php');
    include_once('../header.php');
    include_once('../nav.php');

    if (isset($_GET['user_id'])) {
        $userid = $_GET['user_id'];
        if($userid==999){
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal.fire({
            title: "ไม่สำเร็จ!",
            text: "ไม่สามารถลบแอดมินหลักได้ !",
            showConfirmButton: false,
            type: "warning",
            icon: "warning"
        });';
        echo '}, 500 );</script>';

        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { 
            window.location.href = "../../dashboard/show/user";';
        echo '}, 2000 );</script>';

        }
        else{
        $deletedata = new DB_con();
        $sql = $deletedata->delete($userid);

        if ($sql) {
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal.fire({
              title: "สำเร็จ!",
              text: "ลบรายการเรียบร้อย",
              showConfirmButton: false,
              type: "success",
              icon: "success"
            });';
            echo '}, 500 );</script>';

            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { 
                window.location.href = "../../dashboard/show/user";';
            echo '}, 2000 );</script>';
        }
    }
    }

?>