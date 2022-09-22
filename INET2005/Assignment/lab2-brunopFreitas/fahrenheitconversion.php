<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INET2005 - Lab 2</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>INET2005 - Bruno Freitas - Lab 2</h1>
<a href="celsiusconversion.php">Check out the Celsius to Fahrenheit conversion here!</a>

<?php
function convertingFahrenheitToCelsius($fah): int|float
{
    return (($fah - 32) * 5) / 9;
}

echo "<p>Part B</p>";

echo "<table>
            <tr>
            <th>Fahrenheit</th>
            <th>Celsius</th>
            </tr>";

for ($counter = 0; $counter <= 100; $counter++) {
    $celsius = number_format(convertingFahrenheitToCelsius($counter), 2);
    //echo "<p>$counter degree(s) Fahrenheit is equal to $celsius degree(s) Celsius.</p>";
    echo "<tr><td>".$counter."</td><td>".$celsius."</td></tr>";
}

echo "</table>";


?>

</body>

</html>