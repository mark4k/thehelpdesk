<?php
require_once('../connect.php');
// include composer autoload
require_once 'vendor/autoload.php';
// path โฟลเดอร์ที่จะเก็บไฟล์รูป qrcode ที่สร้าง
$path_qrcode = "images/product/";
$sql = "
SELECT * FROM products
";
$result = $conn->query($sql);
if($result && $result->num_rows>0){ 
    while($row = $result->fetch_assoc()){        
        $file_qrcode = $row['id'].".png";
        $full_savePath = $path_qrcode.$file_qrcode;
        $text_qrcode = $row['id'];
        \PHPQRCode\QRcode::png('แก้ไขเป็นลิงค์โดเมนของท่านเอง/thehelpdesk/config/updateqtybyqr?itemId='.$text_qrcode, $full_savePath, 'M', 4, 2);

        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal.fire({
          title: "สำเร็จ!",
          text: "สร้าง QR CODE เรียบร้อย",
          showConfirmButton: false,
          type: "success",
          icon: "success"
        });';
        echo '}, 500 );</script>';
        header('location:../../dashboard/show/product');
    }
}

?>