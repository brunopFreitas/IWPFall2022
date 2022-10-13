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
<h1>Update Form</h1>
<a href="main.php">Go Back</a>
<?php
require_once ('req3.php');
require_once ('req5.php');
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
if(isset($_POST['Submit'])) {
    $showFormFlag=false;
    if(!empty($_POST['empNo'])
        && !empty($_POST['birthDate'])
        && !empty($_POST['firstName'])
        && !empty($_POST['lastName'])
        && !empty($_POST['gender'])
        && !empty($_POST['hireDate'])) {
        $result = updateEmployee($_POST['empNo'],$_POST['birthDate'],$_POST['firstName'],$_POST['lastName'],$_POST['gender'],$_POST['hireDate']);
        echo "<h2>Employee was updated!</h2> ";
        echo "<h2>Number of rows affected: $result</h2> ";
    }
}
?>
<form action="editPage.php" method="post" id="form" <?php if ($showFormFlag==false){?>style="display:none"<?php } ?>>
    <p><input type="hidden" name="empNo" value="<?php echo $row['emp_no']?>"></p>
    <p>Birthdate: <input type="text" name="birthDate" id="birthDate" status="false" value="<?php echo $row['birth_date']?>"></p>
    <p>First Name: <input type="text" name="firstName" id="firstName" status="false" value="<?php echo $row['first_name']?>"></p>
    <p>Last Name: <input type="text" name="lastName" id="lastName" status="false" value="<?php echo $row['last_name']?>"></p>
    <p>Gender: <input type="text" name="gender" id="gender" status="false" value="<?php echo $row['gender']?>"></p>
    <p>Hire Date: <input type="text" name="hireDate" id="hireDate" status="false" value="<?php echo $row['hire_date']?>"></p>
    <p><input type="button" name="Submit" id="Submit" value="Update" onclick="validateForm()"></p>
</form>
<form action="editPage.php" method="post">
    <p><input type="submit" name="logout" value="Logout" /></p>
</form>
</body>
</html>

