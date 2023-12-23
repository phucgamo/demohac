<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "sqli";
$conn = mysqli_connect($hostname, $username, $password,$dbname );
if(!$conn){
    die("Unable to connect");
}
if($_POST){
    $uname = $_POST["username"];
    $pass = $_POST["password"];
    //Preventing SQL Injection
    //$uname = mysqli_real_escape_string($conn, $uname);
   // $pass = mysqli_real_escape_string($conn, $uname);
    $sql = "SELECT * FROM demo WHERE user = '$uname' AND pwd = '$pass'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) >= 1){
        echo"Welcome, user!";
        while( $row = mysqli_fetch_assoc( $result)){
            // Get values
            $id = $row["id"];
            $uname = $row["user"];

            //Feedback for and user
            echo "<pre>ID: {$id}<br />Username: {$uname}</pre>";
        }
    }else{
        echo"Incorrect Username/Password";
    }
}
?>