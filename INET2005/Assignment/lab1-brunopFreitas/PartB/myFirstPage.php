<!DOCTYPE html>
<html>
<head>
    <title>My First PHP Page</title>
</head>
<body>
    <?php
        echo "<h1> “Greetings from Lab1.” </h1>";
        echo "<p> “PHP is WEIRD!” </p>";
    ?>
    <?php
        echo "<h3> “CSS is the worse part of webDev for sure, but I kind of like it.” </h3>";
    ?>
    <?php
        $name = "Bruno Freitas";
        echo "<h3>" .$name. "</h3>";
    ?>
    <?php
        $favoriteDayOfTheWeek="Friday";
        echo "<p>" . "For " . $name . ", the best day of the week is " . $favoriteDayOfTheWeek . "</p>"
    ?>
</body>
</html>
