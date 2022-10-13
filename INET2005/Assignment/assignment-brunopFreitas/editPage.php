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
<h1>Update Form</h1>
<a href="main.php">Go Back</a>
<?php
require_once ('req3.php');
require_once ('req5.php');
$showFormFlag=true;
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
<form action="editPage.php" method="post" <?php if ($showFormFlag==false){?>style="display:none"<?php } ?>>
    <p><input type="hidden" name="empNo" value="<?php echo $row['emp_no']?>"></p>
    <p>Birthdate: <input type="text" name="birthDate" value="<?php echo $row['birth_date']?>"></p>
    <p>First Name: <input type="text" name="firstName" value="<?php echo $row['first_name']?>"></p>
    <p>Last Name: <input type="text" name="lastName" value="<?php echo $row['last_name']?>"></p>
    <p>Gender: <input type="text" name="gender" value="<?php echo $row['gender']?>"></p>
    <p>Hire Date: <input type="text" name="hireDate" value="<?php echo $row['hire_date']?>"></p>
    <p><input type="submit" name="Submit" value="Update"></p>
</form>
</body>
</html>


