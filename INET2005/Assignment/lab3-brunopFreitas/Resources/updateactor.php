<!DOCTYPE html>
<html>
<head>
    <title>INET2005 - Lab 3 - Part B</title>
</head>
<body>
<h1>INET2005 - Bruno Freitas - Lab 3 - Part B</h1>
<p>Step 5</p>
<a href="deleteactor.php">Go Back</a>
    <form id="newActor" name="newActor" method="post" action="addactor.php">
        <p><label>First Name: <input type="text" name="firstName" id="firstName" /></label></p>
        <p><label>Last Name: <input type="text" name="lastName" id="lastName" /></label></p>
        <p><input type="submit" id="submit" value="submit" /></p>
    </form>
<?php
require_once("dbconn.php");
            if(isset($_POST['actorId']))
            {
                //        Inserting
                if(isset($_POST['firstName']) && isset($_POST['lastName']) && !empty($_POST['actorId']))
                {

                    $conn = getDbConnection();

                    $sql = "UPDATE actor SET first_name = '";
                    $sql .= $_POST['firstName'];
                    $sql .= "', last_name = '";
                    $sql .= $_POST['lastName'];
                    $sql .= "' WHERE actor_id = ";
                    $sql .= $_POST['actorId'];
                    $sql .= ";";

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


                $result = mysqli_query($conn, $sql);
                if(!$result)
                {
                    die("Unable to update record: " . mysqli_error($conn));
                }
                else
                {
                    echo "<h2>Success! Record was updated.</h2>";
                }
            }

        ?>
    </body>
</html>
<?php mysqli_close($conn); ?>