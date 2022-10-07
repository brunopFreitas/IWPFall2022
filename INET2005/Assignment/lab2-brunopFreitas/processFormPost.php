<!DOCTYPE html>
<html>
<head>
    <title>Process Page for Post</title>
</head>
<body>
<a href="input.html">Go Back</a>
<?php
function convertToMeters($lengthInInches, $lengthInFeet): float|int
{
    if ($lengthInInches!=0) {
        return $heightInMetres = number_format($lengthInInches/3.281,2);
    } elseif ($lengthInFeet!=0) {
        return $heightInMetres = number_format($lengthInFeet/39.37,2);
    } else {
        return $heightInMetres = 0;
    }
}

    echo "<p>Your first name is: " . $_POST['firstName'] . "</p>";
    echo "<p>Your last name is: " . $_POST['lastName'] . "</p>";
    echo "<p>Your height in metres is: " . convertToMeters($_POST['heightFeet'], $_POST['heightInches']) . "</p>";

    ?>
</body>
</html>