<!DOCTYPE html>
<html>
    <head>
        <title>INET2005 - Lab 3 - Part A</title>
        <style>
            th, tr, td { border: solid 1px black;}
        </style>
    </head>
    <body>
    <h1>INET2005 - Bruno Freitas - Lab 3</h1>
    <p>Step 1</p>
        <table>
            <thead>
                <th>Film</th>
                <th>Description</th>
            </thead>
            <tbody>
            <?php
                require_once("dbconn.php");
                $conn = getDbConnection();

                $result = mysqli_query($conn,"SELECT * FROM film LIMIT 0,10");
                if(!$result)
                {
                    die("Could not retrieve records from database: " . mysqli_error($conn));
                }

                while($row = mysqli_fetch_assoc($result)):
                ?>
                    <tr>
                        <td><?php echo $row['title'] ?></td>
                        <td><?php echo $row['description'] ?></td>
                    </tr>

                <?php
                endwhile;

            closeDbConnection($conn);
            ?>
            </tbody>
        </table>
    </body>
</html>