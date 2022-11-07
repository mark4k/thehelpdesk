  <!-- JQVMap -->
  <title>พิมพ์ใบแจ้งซ่อม</title>
  <link rel="stylesheet" href="/thehelpdesk/assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/thehelpdesk/assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  
<?php

require_once __DIR__ . '/vendor/autoload.php';

include '../connect.php';


$id = $_GET['repair_id'];

$sqlc = "SELECT repair_code,repair_date,category_name,repair_detail,fullname,name_th,repair_cause FROM repair,category_repair,repair_status,tblusers,provinces where tblusers.provinces_id=provinces.id and repair.employee_id=tblusers.id and repair.status_id=repair_status.status_id and category_repair.category_id=repair.category_id and repair_id=$id";
$resultc = $conn->query($sqlc);
$rowc = $resultc ->fetch_assoc();  

	
$mpdf = new \Mpdf\Mpdf();

$content = '
<style>
	body{
		font-family: "Garuda";
	}
</style>
<style>
th,td {

  font-size: 11px;
}
table {
    -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
    border-radius: 100%;
}
#rcorners1 {
    border-collapse: collapse;
    border-radius: 111em;
    }

    #rcorners2 {
      border-collapse: collapse;
      border-radius: 111em;
      }
    
	body{
		font-family: "Garuda";
	}
    * {
      }
      
      /* Create two unequal columns that floats next to each other */
      .column {
        float: right;
      }

      .column2 {
        float: right;
      }

      .column3 {
        float: right;
      }
      
      .left {
        width: 50%;
      }
      
      .right {
        width: 50%;
      }

      .left11 {
        width: 34%;
      }
      
      .right11 {
        width: 33%;
      }

      .center {
        width: 33%;
      }

      .right3 {
        width: 40%;
      }

      img {
        max-width:50%;
        height:auto;
    }
      
      /* Clear floats after the columns */
      .row:after {
        content: "";
        display: table;
        clear: both;
      }
      #example1 {
        border: 1px solid #000;
        border-radius: 10px;
        margin: 0 auto;
        width: 115px;
        padding: 10px;
        height: 0px;
        background-color: grey;
      }
      greys {
      
        background-color: grey;
    }
      #example2 {
        border: 1px solid #000;
        border-radius: 10px;
        float:right;
        width: 80px;
        padding: 10px;
        height: 0px;
      }
      #example3 {
        border: 1px solid #000;
        border-radius: 10px;
        width: 98%;
        height: 90px;
      }
      #example5 {
        border-radius: 10px;
        width: 98%;
        height: 90px;
      }
      #example4 {
        border: 1px solid #000;
        border-radius: 10px;
        width: 98%;
        margin-top: 190px;
      }
</style>

<h2 style="text-align:center">ใบแจ้งซ่อม/Job Service</h2>
<table class="" id="" width="100%"  style="radius:21px; solid #000; font-size:12pt;margin-top:8px;">

    <tr style="border:0px solid #000;padding:4px;">
    <th  style="border-right:0px solid #000;padding:4px;text-align:left;"   width="10%">ชื่อลูกค้า : '.$rowc['fullname'].'</th>
    <th  style="border-right:0px solid #000;padding:4px;text-align:left;"   width="10%">วันเวลาแจ้งซ่อม : '.$rowc['repair_date'].'</th>
    </tr>
    <tr style="border:0px solid #000;padding:4px;">
    <th  style="border-right:0px solid #000;padding:4px;text-align:left;"   width="10%">หน่วยงาน : '.$rowc['name_th'].'</th>
    <th  style="border-right:0px solid #000;padding:4px;text-align:left;"   width="10%">เบอร์ติดต่อกลับ : .....................................................</th>
    </tr>
    <tr style="border:0px solid #000;padding:4px;">
    <th  style="border-right:0px solid #000;padding:4px;text-align:left;"   width="10%">ช่องทางการแจ้ง : <input type="checkbox"> โทรศัพท์ <input type="checkbox"> ไลน์ <input type="checkbox"> เว็บไซต์ <input type="checkbox"> Fax </th>
    <th  style="border-right:0px solid #000;padding:4px;text-align:left;"   width="10%">สถานที่ตั้งอุปกรณ์ : .....................................................</th>
    </tr>
   
    <tr style="border:0px solid #000;padding:4px;">
    <th  style="border-right:0px solid #000;padding:4px;text-align:left;"   width="10%">อาการเสีย/ชำรุด : '.$rowc['repair_detail'].'</th>
    </tr>

</table>
<div class="column right">
<div id="example5 ">
<table class="" id="" width="100%"  style="radius:21px; solid #000; font-size:12pt;margin-top:8px;">
    <tr style="border:0px solid #000;padding:4px;">
    <th  style="border-right:0px solid #000;padding:4px;text-align:center;"   width="10%">ลงชื่อ.............................................ผู้รับซ่อม</th>
    </tr>
    <tr style="border:0px solid #000;padding:4px;">
    <td  style="border-right:0px solid #000;padding:4px;text-align:center;"   width="10%">(...............................................................)</td>
    </tr>
</table>
</div>
</div>
<div class="column right">
<div id="example5 ">
<table class="" id="" width="100%"  style="radius:21px; solid #000; font-size:12pt;margin-top:8px;">
    <tr style="border:0px solid #000;padding:4px;">
    <th  style="border-right:0px solid #000;padding:4px;text-align:center;"   width="10%">ลงชื่อ.............................................ผู้รับแจ้ง</th>
    </tr>
    <tr style="border:0px solid #000;padding:4px;">
    <td  style="border-right:0px solid #000;padding:4px;text-align:center;"   width="10%">(...............................................................)</td>
    </tr>
</table>
</div>
</div>
ผลการดำเนินการแก้ปัญหา(Problem Solving Process)
<table class="bordered" width="100%" style="border:1px solid #000;padding:4px;">
<tr style="border:0px solid #000;padding:4px;">
<th  style="border-right:0px solid #000;padding:4px;text-align:left;"   width="10%">วันที่เริ่มแก้ไข : .....................................................</th>
<th  style="border-right:0px solid #000;padding:4px;text-align:left;"   width="10%">รายละเอียด : '.$rowc['repair_detail'].'</th>
<tr style="border:0px solid #000;padding:4px;">
<th  style="border-right:0px solid #000;padding:4px;text-align:left;"   width="10%">การแก้ไข : '.$rowc['repair_cause'].'</th>
</tr>
<tr style="border:0px solid #000;padding:4px;">
<th  style="border-right:0px solid #000;padding:4px;text-align:left;"   width="10%">สถานะ : <input type="checkbox"> อยู่ในระหว่างดำเนินการ/รออะไหล่ <input type="checkbox"> ย้ายจุดติดตั้งไปที่ ...................................... </th>
</tr>
<tr style="border:0px solid #000;padding:4px;">
<th  style="border-right:0px solid #000;padding:4px;text-align:left;"   width="10%"><input type="checkbox"> ปิดงาน</th>
</tr>
</table>

<div class="column right">
<div id="example5 ">
<table class="" id="" width="100%"  style="radius:21px; solid #000; font-size:12pt;margin-top:8px;">
    <tr style="border:0px solid #000;padding:4px;">
    <th  style="border-right:0px solid #000;padding:4px;text-align:center;"   width="10%">ลงชื่อ.............................................ผู้รับบริการ</th>
    </tr>
    <tr style="border:0px solid #000;padding:4px;">
    <td  style="border-right:0px solid #000;padding:4px;text-align:center;"   width="10%">(...............................................................)</td>
    </tr>
</table>
</div>
</div>
<div class="column right">
<div id="example5 ">
<table class="" id="" width="100%"  style="radius:21px; solid #000; font-size:12pt;margin-top:8px;">
    <tr style="border:0px solid #000;padding:4px;">
    <th  style="border-right:0px solid #000;padding:4px;text-align:center;"   width="10%">ลงชื่อ.............................................ผู้ให้บริการ</th>
    </tr>
    <tr style="border:0px solid #000;padding:4px;">
    <td  style="border-right:0px solid #000;padding:4px;text-align:center;"   width="10%">(...............................................................)</td>
    </tr>
</table>
</div>
';

$mpdf->WriteHTML($content);


$mpdf->Output();

?>
