<?php 

    include 'connect.php';

    define('DB_SERVER', $host);
    define('DB_USER', $user); // Database Username
    define('DB_PASS', $password); // Database Password
    define('DB_NAME', $dbname); // Database Name

    class DB_con {
        function __construct() {
            $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
            $this->dbcon = $conn;
            mysqli_query($conn, "SET NAMES UTF8");

            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
        }


        public function fetchdatacategory_repair() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM category_repair");
            return $result;
        }


        public function updatetoken($token,$lid) {
            $result = mysqli_query($this->dbcon, "UPDATE linetoken SET 
            token = '$token'
            WHERE id = '$lid'
            ");
            return $result;
        }

        public function usernameavailable($uname) {
            $checkuser = mysqli_query($this->dbcon, "SELECT username FROM tblusers WHERE username = '$uname'");
            return $checkuser;
        }

        public function fetchdapartment() {
            $checkuser = mysqli_query($this->dbcon, "SELECT * FROM provinces ");
            return $checkuser;
        }

        public function fetchposition() {
            $checkuser = mysqli_query($this->dbcon, "SELECT * FROM amphures ");
            return $checkuser;
        }

        
        public function registration($fname, $uname, $uemail,$province_id,$amphure_id,$district_id, $password,$uploadpic) {
            $reg = mysqli_query($this->dbcon, "INSERT INTO tblusers(fullname, username, useremail,provinces_id,amphures_id,districts_id, password,uploadpic) VALUES('$fname', '$uname', '$uemail','$province_id','$amphure_id','$district_id', '$password','$uploadpic')");
            return $reg;
        }
        

        public function signin($uname, $password) {
            $signinquery = mysqli_query($this->dbcon, "SELECT tblusers.id, fullname ,role_id,token_id,uploadpic FROM tblusers,provinces WHERE username = '$uname' AND password = '$password' and provinces.id=tblusers.provinces_id");
            return $signinquery;
        }

        public function fetchdata() {
            $result = mysqli_query($this->dbcon, "SELECT * , tblusers.id as uid FROM tblusers,provinces where tblusers.id > 0 and provinces.id=tblusers.provinces_id");
            return $result;
        }

        public function fetchonerecord($userid) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM tblusers WHERE id = '$userid'");
            return $result;
        }

        public function deleteposition($userid) {
            $deleterecord = mysqli_query($this->dbcon, "DELETE FROM amphures WHERE id = '$userid'");
            return $deleterecord;
        }

        public function deletedepartment($userid) {
            $deleterecord = mysqli_query($this->dbcon, "DELETE FROM provinces WHERE id = '$userid'");
            return $deleterecord;
        }

        public function deletecategoryrepair($userid) {
            $deleterecord = mysqli_query($this->dbcon, "DELETE FROM category_repair WHERE category_id = '$userid'");
            return $deleterecord;
        }

        public function update($fname, $uname, $email, $password, $date, $userid) {
            $result = mysqli_query($this->dbcon, "UPDATE tblusers SET 
                fullname = '$fname',
                username = '$uname',
                useremail = '$email',
                password = '$password',
                regdate = '$date'
                WHERE id = '$userid'
            ");
            return $result;
        }

        public function delete($userid) {
            $deleterecord = mysqli_query($this->dbcon, "DELETE FROM tblusers WHERE id = '$userid'");
            return $deleterecord;
        }

        public function updaterole($role_id,$uid,$line_token) {
            $result = mysqli_query($this->dbcon, "UPDATE tblusers SET 
            role_id = '$role_id',
            line_token = '$line_token'
            WHERE id = '$uid'
            ");
            return $result;
        }

        public function uploadPhoto($fields = array()) {

            $photo = $this->_db->insert('userPhotos', array('user_id' => $this->data()->id));
            if(!$photo) {
                throw new Exception('There was a problem creating your account.');
            }
        }

}

?>