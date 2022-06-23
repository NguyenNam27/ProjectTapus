<?php
////$servername = "103.138.88.11";
////$username = "tap59726_webtest";
////$password = "A@123456789";
////$database = "tap59726_webtest";
//
//$servername = "localhost";
//$username = "root";
//$password = "";
//$database = "tapus";
//
//// Create connection
//$connect = mysqli_connect($servername, $username, $password, $database);
//
//// Check connection
//if (!$connect) {
//  die("Connection failed: " . mysqli_connect_error());
//}
//
//mysqli_set_charset($connect, "utf8mb4");
//
//if(!session_id()){
//    @session_start([
//		'cookie_lifetime' => 86400,
//	]);
//}
//
//?>

<?php

class Database
{
    /**
     * $host Chứa thông tin host
     * @var string
     */
    private $host = 'localhost';
    /**
     * $username Tài khoản truy cập mysql
     * @var string
     */
    private $username = 'root';
    /**
     * $password Mật khẩu truy cập sql
     * @var string
     */
    private $password = '';
    /**
     * $databaseName Tên Database các bạn muốn kết nối
     * @var string
     */
    private $databaseName = 'tapus';

    /**
     * $conn Lưu trữ lớp kết nối
     * @var [objetc]
     */
    private $connect;

    public function __construct()
    {
        $this->connect();
    }

    public function getConnect(){
        return $this->connect;
    }

    private function connect()
    {
        // Create connection
            $this->connect = mysqli_connect($this->host, $this->username, $this->password, $this->databaseName);

            // Check connection
            if (!$this->connect) {
              die("Connection failed: " . mysqli_connect_error());
            }

            mysqli_set_charset($this->connect, "utf8mb4");

            if(!session_id()) {
                @session_start([
                    'cookie_lifetime' => 86400,
                ]);
            }
    }
}
?>



