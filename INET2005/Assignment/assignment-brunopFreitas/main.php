<?php
$fileList = array(
    'req1.php',
    'req3.php',
    'req4.php',
    'isLoggedIn.php',
    'logOut.php'
);
$dirPath = '';
foreach($fileList as $fileName)
{
    include_once($dirPath.$fileName);
}
//Check if Logged In
checkIfLoggedIn();
// Login Out
if(isset($_POST['logout'])) {
    logOut();
}
//Global Variables
$maxRows = 25;
//Defining the page value
if(!isset($_POST['action'])) {
    $page = 0;
} elseif ($_POST['action'] == 'Next') {
    //Next button value
    $page = intval($_POST['page'])+1;
} elseif ($_POST['action'] == 'Previous') {
    //Previous button value
    $page = intval($_POST['page'])-1;
}
//
if ($_POST['word'] && !$_POST['Clear']) {
    $_SESSION["condition"] = $_POST['word'];
} elseif ($_POST['Clear']) {
    $_SESSION["condition"] = '';
    $page = 0;
}
    $condition = $_SESSION["condition"];
?>

<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="main.js"></script>
<title>INET2005 - Assignment 1</title>
</head>
<body>
<style>
th, tr, td { border: solid 1px black;}
form {
    margin: 0;
    padding: 0;
}
#emp-nmb, textarea {
    background-color: lightgray;
}
</style>
<h1>INET2005 - Bruno Freitas - Assignment 1</h1>
<form action="main.php" method="post">
<!--    Sticky Form-->
    <p>Search: <input type="text" name="word" value="<?php echo $condition?>"></p>
    <p><input type="submit" name="Submit" value="Search"><input type="submit" name="Clear" value="Clear"></p>
</form>
<form action="main.php" method="post">
<table>
<thead>
<th>Employee Number</th>
<th>Birth Date</th>
<th>First Name</th>
<th>Last Name</th>
<th>Gender</th>
<th>Hire Date</th>
<th>Add/Edit</th>
<th>Delete</th>
</thead>
<tbody>
<p><input type="submit" name="addBtn" value="Add"></p>
<?php
if($_POST['addBtn']) {
    $row = mysqli_fetch_assoc(getMyLastPK());
//    Solving the PK issue
    $myCurrentPK = $row['emp_no']+1;
    $_SESSION["nextPK"] = $myCurrentPK;
    echo "<tr>";
    ?>
    <td><input type='text' id='emp-nmb' name='emp-nmb' value="<?php echo $myCurrentPK;?>" disabled></td>
<?php
    echo "<td><input type='text' id='emp-brt-dt' name='emp-brt-dt'></td>";
    echo "<td><input type='text' id='emp-fn' name='emp-fn'></td>";
    echo "<td><input type='text' id='emp-ln' name='emp-ln'></td>";
    echo "<td><input type='text' id='emp-g' name='emp-g'></td>";
    echo "<td><input type='text' id='emp-hd' name='emp-hd'></td>";
    echo "<td><input type='submit' name='add' value='Add' onClick='checkInsertFields()'></td>";
    echo "</tr>";
}
?>
<?php
if($_POST['add']) {
    if($_SESSION["nextPK"]!='' && !empty($_POST['emp-brt-dt']) && !empty($_POST['emp-fn']) && !empty($_POST['emp-ln']) && !empty($_POST['emp-g']) && !empty($_POST['emp-hd'])) {
        $emp_no =  $_SESSION["nextPK"];
        $birthDate  =  $_POST['emp-brt-dt'];
        $firstName  =  $_POST['emp-fn'];
        $lastName  =  $_POST['emp-ln'];
        $gender  =  $_POST['emp-g'];
        $hireDate =  $_POST['emp-hd'];
        $result = addEmployee($emp_no, $birthDate, $firstName, $lastName, $gender, $hireDate);
        echo "Number of rows affected: " , $result;
    } else {

    }
}
?>
<?php
// Displaying employee info
if (!$condition) {
    //    Local variables
    //    Result quantity
    $total_rows = mysqli_num_rows(countEmployee());
    if ($total_rows > 0) {
        //      Page quantity
        $total_pages = ceil($total_rows/$maxRows);
        if ($page < 0) {
            $page = 0;
        }
        if ($page+1 >= $total_pages) {
            $page = $total_pages-1;
        }
        $start = $page*$maxRows;
        if ($start > $total_rows) {
            $start = $total_rows-1;
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
                <td><?php echo "<a href='editPage.php?id=".$row['emp_no']."'><input type='button' name='add' value='Add/Edit'></a>"?></td>
                <td><?php echo "<a href='deletePage.php?id=".$row['emp_no']."'><input type='button' name='delete' value='Delete'></a>"?></td>
            </tr>

        <?php endwhile;
    } else {
        $total_pages = 1;
        echo "<p>Nothing to display</p>";
    }
        ?>

<?php
//Search my result
} elseif($condition || isset($_POST['Submit'])) {

    //    Local variables
    //    Result quantity
    $total_rows = mysqli_num_rows(findEmployee($condition));
    if ($total_rows>0) {
        //    Page quantity
        $total_pages = ceil($total_rows/$maxRows);
        if ($page < 0) {
            $page = 0;
        }
        if ($page+1 >= $total_pages) {
            $page = $total_pages-1;
        }
        $start = $page*$maxRows;
        if ($start > $total_rows) {
            $start = $total_rows;
        }
        $result = findEmployeeLimit($condition,$start, $maxRows);
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
                    <td><?php echo "<a href='editPage.php?id=".$row['emp_no']."'><input type='button' name='add' value='Add/Edit'></a>"?></td>
                    <td><?php echo "<a href='deletePage.php?id=".$row['emp_no']."'><input type='button' name='delete' value='Delete'></a>"?></td>
                </tr>

            <?php
            endwhile;
        }else {
            echo "<p>Nothing to display.</p>";
        }
    } else {
        $total_pages = 1;
        echo "<p>No results for $condition</p>";
    }
}
?>
<?php
//Updating and Delete
    if(isset($_GET['id']) && $_GET['id']!='')
    {
        echo $_GET['id'];
    }

?>

    </tbody>
</table>
</form>
<form action="main.php" method="post">
    <p><?php echo 'Total Results: ', $total_rows ?></p>
    <p><?php $pageResult = $page; echo 'Page: ', ++$pageResult, ' of ', $total_pages ?></p>
    <input type="hidden" name="page" value="<?php echo $page; ?>">
    <input type="submit" name="action" value="Previous" />
    <input type="submit" name="action" value="Next" />
    <p></p>
</form>
<form action="main.php" method="post">
    <p><input type="submit" name="logout" value="Logout" /></p>
</form>
</body>

</html>