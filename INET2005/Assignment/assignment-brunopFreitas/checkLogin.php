<?php
session_start();
ob_start();

$conn = mysqli_connect("localhost", "root", "inet2005", "employees");
if(!$conn)
{
    die("Could not connect to the database: " + mysqli_connect_error());
}

$loginUser = $_POST['loginUser'];
$loginPwd = $_POST['loginPwd'];

$loginUser = stripslashes($loginUser);
$loginPwd = stripslashes($loginPwd);
$loginUser = mysqli_real_escape_string($conn, $loginUser);
$loginPwd = mysqli_real_escape_string($conn, $loginPwd);

$hash = hash("sha1", $loginPwd);

$sql = "SELECT * FROM employees.user WHERE user_name = '$loginUser' AND password = '$hash'";

$result = mysqli_query($conn, $sql);
if(!$result)
{
    die("An error occurred in querying the database: " + mysqli_error($conn));
}

$count = mysqli_num_rows($result);

mysqli_close($conn);

if($count == 1)
{
    $_SESSION['LoggedInUser'] = $loginUser;
    header('location:main.php');
}
else
{
    echo "<h1>Incorrect Login</h1>";
    echo "<a href='login.html'>Try again</a>";
}

ob_end_flush();

//CREATE TABLE employees.user (
//    user_name varchar(255),
//    password varchar(255)
//);
//
//INSERT INTO employees.user (user_name, password) VALUES ('hr', SHA1('password'));