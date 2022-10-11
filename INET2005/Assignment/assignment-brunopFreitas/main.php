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
$page = 0;

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
<form action="main.php" method="post">
<!--    Sticky Form-->
    <p>Search: <input type="text" name="word" value="<?php if (isset($_POST ['word'])) echo $_POST['word'];?>"></p>
    <p><input type="submit" name="Submit" value="Submit"></p>
</form>
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
//Quantity results
$total_rows = mysqli_num_rows(countEmployee());

//echo $total_rows;
$total_pages = ceil($total_rows/$maxRows);

//Display first time
if(!isset($_POST["word"]) && !isset($_POST['action'])) {
    $result = displayEmployeePage(0, $maxRows);
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

<?php endwhile ?>
<?php
//    Next Button
} elseif (!isset($_POST["word"]) && isset($_POST['action'])) {
    if ($_POST['action'] == 'Next') {
        $page = intval($_POST['page'])+1;
        if ($page > $total_pages) {
            $page = $total_pages;
        }
        $start = $page*$maxRows;
        if ($start > $total_rows) {
            $start = $total_rows -1;
        }
        $result = displayEmployeePage($start, $maxRows);
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

        <?php endwhile ?>
 <?php
        //    Previous Button
    } elseif ($_POST['action'] == 'Previous') {
        $page = intval($_POST['page'])-1;
        if ($page < 0) {
            $page = 0;
        }
        $start = $page*$maxRows;
        $result = displayEmployeePage($start, $maxRows);
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

        <?php endwhile ?>
<?php
//    No button
    } else {
        "<p>Wrong action!</p>";
    }
}


//WHERE my result
if(isset($_POST["word"])) {
    $condition = $_POST['word'];
    $result = findEmployee($condition,0,25);
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
<form action="main.php" method="post">
    <p><?php echo 'Total Results: ', $total_rows ?></p>
    <p><?php $pageResult = $page; echo 'Row number: ', ++$pageResult ?></p>
    <input type="hidden" name="page" value="<?php echo $page; ?>">
    <input type="submit" name="action" value="Previous" />
    <input type="submit" name="action" value="Next" />
    <p></p>
</form>
</body>

</html>