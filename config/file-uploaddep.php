<?php 

    include("connect.php");
    
    if(isset($_POST["submit"])) {
        // Set image placement folder
        $target_dir = "../assets/img/category/";
        $code = basename($_POST['code']);
        $name_th = basename($_POST['name_th']);
        $name_en = basename($_POST['name_en']);
        $token_id = basename($_POST['token_id']);
        
                $sql = "INSERT INTO provinces (code,name_th,name_en,token_id) 
                VALUES ('$code','$name_th','$name_en','$token_id')";        

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
            text: "เพิ่มแผนกเรียบร้อย",
            showConfirmButton: false,
            type: "success",
            icon: "success"
        });';
        echo '}, 500 );</script>';

        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { 
            window.location.href = "../show/department";';
        echo '}, 2000 );</script>';
        }

    
    
?>