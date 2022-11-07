<?php
//ส่งค่าไปที่ function
$host='localhost';
$user='root';
$password='';
$dbname='thehelpdesk';

$info = array(
    'host' => 'localhost',
    'user' => 'root',
    'password' => '',
    'dbname' => 'thehelpdesk'
);
$conn = mysqli_connect($info['host'], $info['user'], $info['password'], $info['dbname']) or die('Error connection database!');
mysqli_set_charset($conn, 'utf8');