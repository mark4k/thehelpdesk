<?php 
     include("../conf/connect.php");
     error_reporting(0);
    // Database connection
  
    
    if(isset($_POST["submit"])) {
        // Set image placement folder
        $target_dir = "../assets/img/repairpic/";
        $repair_id = basename($_POST['repair_id']);
        $repaircode = basename($_POST['repaircode']);
        $empid = basename($_POST['empid']);
        $empname2 = basename($_POST['empname2']);
        $line_token = basename($_POST['line_token']);
        $technician_id = basename($_POST['tech_id']);
        $repdetail = basename($_POST['repdetail']);
        $product_name = basename($_POST['product_name']);
        $repcause = basename($_POST['repcause']);
        $cat_id = basename($_POST['cat_id']);
        $uploadpic = basename($_FILES["fileUpload"]["name"]);
        $status_id = basename($_POST['status_id']);
        
        // Get file path
        $target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
        // Get file extension
        $imageExt = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Allowed file types
        $allowd_file_ext = array("jpg", "jpeg", "png");

            if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
                
                $sql = "UPDATE repair SET 
                repair_code = '$repaircode',
                employee_id = '$empid',
                technician_id = '$technician_id',
                repair_detail = '$repdetail',
                repair_cause = '$repcause',
                category_id = '$cat_id',
                image_name = '$uploadpic',
                status_id = '$status_id'
                WHERE repair_id = '$repair_id'";
                $query = $conn->query($sql) or die($conn->error . "<br>$sql"); 
            
                $sql2 = "INSERT INTO repair_time (repair_id,status_id) 
                VALUES ('$repair_id','$status_id')"; 
                $stmt = $conn->prepare($sql2);
                 if($stmt->execute()){
                    $resMessage = array(
                    );      
                 }

            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal.fire({
                title: "สำเร็จ!",
                text: "แก้ไขเรียบร้อย",
                showConfirmButton: false,
                type: "success",
                icon: "success"
            });';
            echo '}, 500 );</script>';
    
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { 
                window.location.href = "/thehelpdesk/dashboard/show/repairdisplay";';
            echo '}, 2000 );</script>';

            } 

            else {

                $sql = "UPDATE repair SET 
                repair_code = '$repaircode',
                employee_id = '$empid',
                technician_id = '$technician_id',
                repair_detail = '$repdetail',
                repair_cause = '$repcause',
                category_id = '$cat_id',
                status_id = '$status_id'
               
                WHERE repair_id = '$repair_id'";
                $query = $conn->query($sql) or die($conn->error . "<br>$sql"); 

                $sql2 = "INSERT INTO repair_time (repair_id,status_id) 
                VALUES ('$repair_id','$status_id')"; 
                $stmt = $conn->prepare($sql2);
                 if($stmt->execute()){
                    $resMessage = array(
                    );      
                 }

            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal.fire({
                title: "สำเร็จ!",
                text: "แก้ไขเรียบร้อย",
                showConfirmButton: false,
                type: "success",
                icon: "success"
            });';
            echo '}, 500 );</script>';
    
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { 
                window.location.href = "/thehelpdesk/dashboard/show/repairdisplay";';
            echo '}, 2000 );</script>';

            }

            if($status_id==2){

                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
                date_default_timezone_set("Asia/Bangkok");
                $sToken = $line_token;
                $sMessage = "รายการแจ้งซ่อมเสร็จเรียบร้อย !";
                $inputimage = "https://cdn4.iconfinder.com/data/icons/materia-flat-basic-vol-2/24/009_084_assignment_complete_tablet_turned-512.png";
                $message = "รายการแจ้งซ่อมเสร็จเรียบร้อย "."\n"."เลขที่รายการ : ".$repaircode."\n"."ผู้แจ้งซ่อม คุณ : ".$empname2 ."\n"."อุปกรณ์ : ".$product_name ."\n"."หมายเหตุ : ".$repdetail ."";     

                $chOne = curl_init(); 
                curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
                curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
                curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
                curl_setopt( $chOne, CURLOPT_POST, 1); 
                curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=$message&imageThumbnail=$inputimage&imageFullsize=$inputimage"); 
                $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
                curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
                curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
                $result = curl_exec( $chOne ); 

                //Result error 
                if(curl_error($chOne)) 
                { 
                    echo 'error:' . curl_error($chOne); 
                } 
                else { 
                    $result_ = json_decode($result, true); 
                    
                } 
                curl_close( $chOne );
                
            }
    }
    
?>