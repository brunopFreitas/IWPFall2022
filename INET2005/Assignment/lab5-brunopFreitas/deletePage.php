<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="main.js"></script>
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
$row=0;
if(isset($_POST['logout'])) {
    logOut();
}
if(isset($_GET['id']) && $_GET['id']!='')
{
    $result = findEmployeeByID($_GET['id']);
    $row = $result->fetch_assoc();
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
<form action="deletePage.php" method="post" id="form" <?php if ($showFormFlag==false){?>style="display:none"<?php } ?>>
    <p><input type="hidden" name="empNo" value="<?php if ($row){echo $row['emp_no'];}?>"></p>
    <p>Birthdate: <input type="text" name="birthDate" id="birthDate" status="false" value="<?php if ($row){echo $row['birth_date'];}?>" disabled></p>
    <p>First Name: <input type="text" name="firstName" id="firstName" status="false" value="<?php if ($row){echo $row['first_name'];}?>" disabled></p>
    <p>Last Name: <input type="text" name="lastName" id="lastName" status="false" value="<?php if ($row){echo $row['last_name'];}?>" disabled></p>
    <p>Gender: <input type="text" name="gender" id="gender" status="false" value="<?php if ($row){echo $row['gender'];}?>" disabled></p>
    <p>Hire Date: <input type="text" name="hireDate" id="hireDate" status="false" value="<?php if ($row){echo $row['hire_date'];}?>" disabled></p>
    <p id="checkboxText">Confirm delete? <input type="checkbox" name="deleteConfirm" id="deleteConfirm"></p>
    <p><input type="button" name="Submit" id="Submit" value="Delete" onclick="validateFormDeletion()"></p>
</form>
<form action="deletePage.php" method="post">
    <p><input type="submit" name="logout" value="Logout" /></p>
</form
</body>
</html>


