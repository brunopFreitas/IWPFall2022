<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INET2005 - Lab 3</title>
</head>
<body>
<style>
    th, tr, td { border: solid 1px black;}
</style>
<h1>INET2005 - Bruno Freitas - Lab 3</h1>
<p>Step 2</p>
<table>
    <thead>
    <th>Film</th>
    <th>Description</th>
    </thead>
    <tbody>
<?php
if(isset($_POST["word"])) {
    require_once("dbconn.php");

    $conn = getDbConnection();

    $myQuerie = "SELECT " .
        "title, description " .
        "FROM " .
        "sakila.film " .
        "WHERE " .
        "description " .
        "LIKE " .
        "'%" .
        $_POST['word'] .
        "%'";

    $result = mysqli_query($conn,$myQuerie);
    if(!$result)
    {
        die("Could not retrieve records from database: " . mysqli_error($conn));
    }

    $row = mysqli_fetch_assoc($result);

    if($row!=0) {
        while($row = mysqli_fetch_assoc($result)):
            ?>
            <tr>
                <td><?php echo $row['title'] ?></td>
                <td><?php echo $row['description'] ?></td>
            </tr>

        <?php
        endwhile;
    } else {
        echo "<p>Nothing to display.</p>";
    }

    closeDbConnection($conn);

}
?>
    </tbody>
</table>
<form action="lab3step2.php" method="post">
    <p>Search: <input type="text" name="word"></p>
    <p><input type="submit" name="Submit" value="Submit"></p>
</form>
</body>

</html>