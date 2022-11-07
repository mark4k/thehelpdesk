<?php
$sname = $_POST['sname'];
$date_start = $_POST['date_start'];
$date_end = $_POST['date_end'];
$sql = "SELECT * FROM repair,category_repair,tblusers 
where repair.category_id=category_repair.category_id and repair.employee_id=tblusers.id and (repair_date BETWEEN '$date_start' and '$date_end' ) group by repair_id";
$result = $conn->query($sql); 
?>