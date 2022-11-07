<?php 

    include("connect.php");
    
    if(isset($_POST["submit"])) {
        // Set image placement folder
        $target_dir = "../assets/img/category/";
        $placename = basename($_POST['placename']);
        
                $sql = "INSERT INTO tblplace (placename) 
                VALUES ('$placename')";        

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
            text: "เพิ่มสถานที่เรียบร้อย",
            showConfirmButton: false,
            type: "success",
            icon: "success"
        });';
        echo '}, 500 );</script>';

        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { 
            window.location.href = "../show/place";';
        echo '}, 2000 );</script>';
        }

    
    
?>