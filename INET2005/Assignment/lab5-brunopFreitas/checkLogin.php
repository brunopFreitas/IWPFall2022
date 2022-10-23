<?php
require_once ("dbconn.php");
session_start();
ob_start();

$conn = getDbConnection();

$loginUser = $_POST['loginUser'];
$loginPwd = $_POST['loginPwd'];

$loginUser = stripslashes($loginUser);
$loginPwd = stripslashes($loginPwd);
$loginUser = mysqli_real_escape_string($conn, $loginUser);
$loginPwd = mysqli_real_escape_string($conn, $loginPwd);

$hash = hash("sha1", $loginPwd);

// prepare and bind
$sql = $conn->prepare("SELECT * FROM employees.user WHERE user_name = ? AND password = ?");
$sql->bind_param("ss", $loginUser, $hash);
$sql->execute();
$result = $sql->get_result();
$sql->close();

if(!$result)
{
    die("An error occurred in querying the database: " + mysqli_error($conn));
}

$count = $result->num_rows;

closeDbConnection($conn);

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