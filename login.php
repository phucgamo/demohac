<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_dbname";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Thực hiện truy vấn kiểm tra thông tin đăng nhập
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    // Kiểm tra xem truy vấn có thành công hay không
    if ($result !== false) {
        if ($result->num_rows > 0) {
            echo "Login successful";
            // Thực hiện các hành động sau khi đăng nhập thành công
        } else {
            echo "Login failed. Invalid username or password.";
        }
    } else {
        // Hiển thị thông báo lỗi nếu truy vấn thất bại
        die("Query failed: " . $conn->error);
    }
}

$conn->close();
?>
