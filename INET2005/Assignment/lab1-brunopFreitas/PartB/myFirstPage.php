<!DOCTYPE html>
<html>
<head>
    <title>My First PHP Page</title>
</head>
<body>
<!--Step 1: Mixing PHP and HTML-->
    <?php
        echo "<h1> “Greetings from Lab1.” </h1>";
        echo "<h2> “Step 1: Mixing PHP and HTML” </h2>";
        echo "<p> “PHP is WEIRD!” </p>";
    ?>
    <?php
        echo "<h3> “CSS is the worse part of webDev for sure, but I kind of like it.” </h3>";
    ?>
<!--Step 2: Using a String Variable-->
    <?php
        $name = "Bruno Freitas";
        echo "<h2> “Step 2: Using a String Variable” </h2>";
        echo "<h3>" .$name. "</h3>";
    ?>
<!--Step 3: Using the Concatenation Operator-->
    <?php
        $favoriteDayOfTheWeek="Friday";
        echo "<h2> “Step 3: Using the Concatenation Operator” </h2>";
        echo "<p>" . "For " . $name . ", the best day of the week is " . $favoriteDayOfTheWeek . "</p>"
    ?>
<!--Step 4: Using the Arithmetic Operators-->
    <?php
        $result1 = (32*14)+83;
        $result2 = (1024/128)-7;
        $result3 = fmod(769,6);
        echo "<h2> “Step 4: Using the Arithmetic Operators” </h2>";
        echo "<p>" . "The result of (32*14)+83 is " . $result1 . "</p>";
        echo "<p>" . "The result of (1024/128)-7 is " . $result2 . "</p>";
        echo "<p>" . "The reminder of 769 divided by 6 is " . $result3 . "</p>";
    ?>
<!--Step 5: Use a loop-->
    <?php
        $count = 10;
        echo "<h2> “Step 5: Use a loop” </h2>";
        while ($count>0) {
            echo $count . "...";
            $count--;
        }
        if ($count == 0) {
            echo "Blast Off";
        }
    ?>
<!--Step 6: Use an Array-->
    <?php
        $Colors = array(
                "Black",
                "White",
                "Grey",
                "Pink",
                "Red",
                "Blue",
                "Yellow"
        );
        echo "<h2> “Step 6: Use an Array” </h2>";
        echo "<p> “Using FOR” </p>";
        for ($counter=0;$counter<count($Colors);$counter++) {
            echo "$Colors[$counter] ";
        }
        echo "<p> “Using FOREACH” </p>";
        foreach ($Colors as $ColorPosition => $Color) {
            echo "$Color ";
        }
        echo "<p> “Using Functions” </p>";
        function printArray($Array): bool|string
        {
            return print_r($Array);
        }
        printArray($Colors);
    ?>

</body>
</html>
