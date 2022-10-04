<!DOCTYPE html>
<html>
<head>
    <title>INET2005 - Lab 3 - Part B</title>
</head>
<body>
<h1>INET2005 - Bruno Freitas - Lab 3 - Part B</h1>
<p>Step 5</p>
<a href="deleteactor.php">Go Back</a>
    <form id="updateActor" name="updateActor" method="post" action="updateactor.php">
        <input type="hidden" name="actorId" value="<?php echo $_POST['actorId']; ?>">
        <p><label>First Name: <input type="text" name="firstName" id="firstName" /></label></p>
        <p><label>Last Name: <input type="text" name="lastName" id="lastName" /></label></p>
        <p><input type="submit" id="submit" value="Update" /></p>
    </form>
<?php
require_once("dbconn.php");

                //        Updating
                if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['actorId'])) {

                    $conn = getDbConnection();

                    $sql = "UPDATE sakila.actor SET first_name = ";
                    $sql .= "'";
                    $sql .= $_POST['firstName'];
                    $sql .= "', last_name = '";
                    $sql .= $_POST['lastName'];
                    $sql .= "' WHERE actor_id = ";
                    $sql .= $_POST['actorId'];
                    $sql .= ";";

                    $result = mysqli_query($conn, $sql);
                    if (!$result) {
                        die("Unable to update record: " . mysqli_error($conn));
                    } else {
                        echo "<h2>Success! Record was updated.</h2>";
                        $myCount = mysqli_affected_rows($conn);
                        echo "<h3>Numbers of rows affected: $myCount</h3>";
                        closeDbConnection($conn);
                    }
                }

        ?>
    </body>
</html>