<?php 

    include("../conf/connect.php");
    
    if(isset($_POST["submit"])) {
        // Set image placement folder
        $category_name = basename($_POST['category_name']);
        $category_color = '#'.basename($_POST['category_color']);
        // Get file path
                
                $sql = "INSERT INTO category_repair (category_name,category_color) 
                VALUES ('$category_name','$category_color')";        

                $stmt = $conn->prepare($sql);
                 if($stmt->execute()){
                    $resMessage = array(
                    );             
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () { swal.fire({
                        title: "สำเร็จ!",
                        text: "เพิ่มประเภทงานเรียบร้อย",
                        showConfirmButton: false,
                        type: "success",
                        icon: "success"
                    });';
                    echo '}, 500 );</script>';
            
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () { 
                        window.location.href = "../view/categoryrepair";';
                    echo '}, 2000 );</script>';
                   
                 }
        
            
    
    
                }
?>