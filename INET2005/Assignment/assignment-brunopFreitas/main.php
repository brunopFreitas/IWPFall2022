<?php
$fileList = array(
    'req1.php',
    'req2.php',
    'req3.php'
);

$dirPath = '';
foreach($fileList as $fileName)
{
    include_once($dirPath.$fileName);
}

$maxRows = 25;

?>

<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>INET2005 - Assignment 1</title>
</head>
<body>
<style>
th, tr, td { border: solid 1px black;}
</style>
<h1>INET2005 - Bruno Freitas - Assignment 1</h1>
<p>REQ 1, 2, 3</p>
<table>
<thead>
<th>Employee Number</th>
<th>Birth Date</th>
<th>First Name</th>
<th>Last Name</th>
<th>Gender</th>
<th>Hire Date</th>
</thead>
<tbody>
<?php
if(!isset($_POST["word"])) {
$result = displayEmployee(3, $maxRows);
while($row = mysqli_fetch_assoc($result)):
    ?>
    <tr>
        <td><?php echo $row['emp_no'] ?></td>
        <td><?php echo $row['birth_date'] ?></td>
        <td><?php echo $row['first_name'] ?></td>
        <td><?php echo $row['last_name'] ?></td>
        <td><?php echo $row['gender'] ?></td>
        <td><?php echo $row['hire_date'] ?></td>
    </tr>

<?php
endwhile;
}

if(isset($_POST["word"])) {
$result = findEmployee($_POST["word"]);
$row = mysqli_fetch_assoc($result);
    if($row!=0) {
        while($row = mysqli_fetch_assoc($result)):
            ?>
            <tr>
                <td><?php echo $row['emp_no'] ?></td>
                <td><?php echo $row['birth_date'] ?></td>
                <td><?php echo $row['first_name'] ?></td>
                <td><?php echo $row['last_name'] ?></td>
                <td><?php echo $row['gender'] ?></td>
                <td><?php echo $row['hire_date'] ?></td>
            </tr>

        <?php
        endwhile;
    } else {
        echo "<p>Nothing to display.</p>";
    }
}
?>
    </tbody>
</table>
<button id="previousbtn">
    Previous
</button>
<button id="nextbtn">
    Next
    </button>
<form action="main.php" method="post">
    <p>Search: <input type="text" name="word"></p>
    <p><input type="submit" name="Submit" value="Submit"></p>
    <p></p>
</form>
</body>

</html>