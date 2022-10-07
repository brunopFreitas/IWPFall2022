<!DOCTYPE html>
<html>
<head>
    <title>INET2005 - Lab 3 - Part B</title>
    <style>
        th, tr, td { border: solid 1px black;}
    </style>
</head>
<body>
<h1>INET2005 - Bruno Freitas - Lab 3 - Part B</h1>
<p>Step 4</p>
<a href="<?php $_SERVER['PHP_SELF']; ?>">Refresh</a>
<table>
    <thead>
    <th>PK</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Last Update</th>
    </thead>
    <tbody>
    <form id="deleteActor" name="deleteActor" method="post" action="deleteactor.php">
        <p><label>Actor Id: <input type="text" name="actorId" id="actorId" /></label></p>
        <p><input type="submit" id="submit" value="delete" /></p>
    </form>
    <form id="updateActor" name="updateActor" method="post" action="updateactor.php">
        <p><label>Actor Id: <input type="text" name="actorId" id="actorId"/></label></p>
        <p><input type="submit" id="submit" value="update" /></p>
    </form>
    <?php
    require_once("dbconn.php");
    function queryMyTable () {
        //        Selecting
        $conn = getDbConnection();
        $myQuerie = "SELECT " .
            "* " .
            "FROM ".
            "sakila.actor ".
            "ORDER BY ".
            "actor_id DESC " .
            "limit 0,10";
        $result = mysqli_query($conn,$myQuerie);
        if(!$result)
        {
            die("Could not retrieve records from database: " . mysqli_error($conn));
        }

        while($row = mysqli_fetch_assoc($result)):
            ?>
            <tr>
                <td><?php echo $row['actor_id'] ?></td>
                <td><?php echo $row['first_name'] ?></td>
                <td><?php echo $row['last_name'] ?></td>
                <td><?php echo $row['last_update'] ?></td>
            </tr>

        <?php
        endwhile;
        closeDbConnection($conn);
    }
    queryMyTable();

    //        Deleting
    if(isset($_POST['actorId']))
    {

        $conn = getDbConnection();

        $sql = "DELETE FROM actor WHERE actor_id = ";
        $sql .= $_POST['actorId'];
        $sql .= ";";

        $result = mysqli_query($conn, $sql);
        if(!$result)
        {
            die("Unable to insert record: " . mysqli_error($conn));
        }
        else
        {
            echo "<h2>Success! Record was deleted.</h2>";
            $myCount = mysqli_affected_rows($conn);
            echo "<h3>Numbers of rows affected: $myCount</h3>";
            closeDbConnection($conn);
        }
    }
    ?>
    </tbody>
</table>
</body>
</html>