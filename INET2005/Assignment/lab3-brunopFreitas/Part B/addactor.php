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
    <p>Steps 1, 2 and 3</p>
    <a href="<?php $_SERVER['PHP_SELF']; ?>">Refresh</a>
    <table>
        <thead>
        <th>PK</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Last Update</th>
        </thead>
        <tbody>
        <form id="newActor" name="newActor" method="post" action="addactor.php">
            <p><label>First Name: <input type="text" name="firstName" id="firstName" /></label></p>
            <p><label>Last Name: <input type="text" name="lastName" id="lastName" /></label></p>
            <p><input type="submit" id="submit" value="submit" /></p>
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
        //        Inserting
            if(isset($_POST['firstName']) && isset($_POST['lastName']))
            {

                $conn = getDbConnection();

                $sql = "INSERT INTO sakila.actor (first_name, last_name) VALUES ('";
                $sql .= $_POST['firstName'];
                $sql .= "','";
                $sql .= $_POST['lastName'];
                $sql .= "');";

                $result = mysqli_query($conn, $sql);
                if(!$result)
                {
                    die("Unable to insert record: " . mysqli_error($conn));
                }
                else
                {
                    echo "<h2>Success! Record was entered.</h2>";
                    closeDbConnection($conn);
                }
            }
        ?>
        </tbody>
    </table>
    </body>
</html>