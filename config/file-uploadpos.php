<?php 

    include("connect.php");
    
    if(isset($_POST["submit"])) {
        // Set image placement folder
        $target_dir = "../assets/img/category/";
        $code = basename($_POST['code']);
        $name_th = basename($_POST['name_th']);
        $name_en = basename($_POST['name_en']);
        $province_id = basename($_POST['province_id']);
        
                $sql = "INSERT INTO amphures (code,name_th,name_en,province_id) 
                VALUES ('$code','$name_th','$name_en','$province_id')";        

                $stmt = $conn->prepare($sql);
                 if($stmt->execute()){
                    $resMessage = array(
                        "status" => "alert-success",
                        "message" => "Image uploaded successfully."
                    );                 
                 }
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal.fire({
            title: "สำเร็จ!",
            text: "เพิ่มตำแหน่งเรียบร้อย",
            showConfirmButton: false,
            type: "success",
            icon: "success"
        });';
        echo '}, 500 );</script>';

        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { 
            window.location.href = "/thehelpdesk/dashboard/show/position";';
        echo '}, 2000 );</script>';
        }

    
    
?>