<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INET2005 - Assignment 1</title>
    <style>
        form {
            border: 1px solid black;
        }
    </style>
</head>
<body>
<h1>Delete Form</h1>
<h2>Data will be permanently deleted from the database!</h2>
<a href="main.php">Go Back</a>
<?php
require_once ('req3.php');
require_once ('req7.php');
require_once ('isLoggedIn.php');
require_once ('logOut.php');
$showFormFlag=true;
//Check if Logged In
checkIfLoggedIn();
// Login Out
if(isset($_POST['logout'])) {
    logOut();
}
if(isset($_GET['id']) && $_GET['id']!='')
{
    $result = findEmployeeByID($_GET['id']);
    $row = mysqli_fetch_assoc($result);
}
?>
<?php
if(isset($_POST['Submit']) && isset($_POST['deleteConfirm'])) {
    $showFormFlag=false;
    if(!empty($_POST['empNo'])) {
        $result = deleteEmployee($_POST['empNo']);
        echo "<h2>Employee was deleted!</h2> ";
        echo "<h2>Number of rows affected: $result</h2> ";
    }
}
?>
<form action="deletePage.php" method="post" <?php if ($showFormFlag==false){?>style="display:none"<?php } ?>>
    <p><input type="hidden" name="empNo" value="<?php echo $row['emp_no']?>"></p>
    <p>Birthdate: <input type="text" name="birthDate" value="<?php echo $row['birth_date']?>" disabled></p>
    <p>First Name: <input type="text" name="firstName" value="<?php echo $row['first_name']?>" disabled></p>
    <p>Last Name: <input type="text" name="lastName" value="<?php echo $row['last_name']?>" disabled></p>
    <p>Gender: <input type="text" name="gender" value="<?php echo $row['gender']?>" disabled></p>
    <p>Hire Date: <input type="text" name="hireDate" value="<?php echo $row['hire_date']?>" disabled></p>
    <p>Confirm delete? <input type="checkbox" name="deleteConfirm"></p>
    <p><input type="submit" name="Submit" value="Delete"></p>
</form>
<form action="deletePage.php" method="post">
    <p><input type="submit" name="logout" value="Logout" /></p>
</form
</body>
</html>


