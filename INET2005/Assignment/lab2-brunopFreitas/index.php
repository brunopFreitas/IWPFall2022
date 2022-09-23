<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INET2005 - Lab 2</title>
</head>
<body>
<h1>INET2005 - Bruno Freitas - Lab 2</h1>

<?php
function makeHeading($num, $text): void
{
$heading="h".$num;
echo "<$heading>".
    $text.
    "</$heading>";
}

echo "<p>Step 1</p>";

for($counter=1;$counter<=7;$counter++) {
    if ($counter>=1 && $counter<=6) {
        $text = "This is a " . "h" . $counter . " tag.";
        makeHeading($counter, $text);
    } else {
        echo "<p>This is an error message because there are no " . "h" . $counter . " tags.</p>";
    }

}

echo "<p>Step 2</p>";

function letsChangeThisStringOne ($string): void
{
    $string = $string . "...blah";
}

function letsChangeThisStringTwo (&$string): void
{
    $string = $string . "...blah";
}

$stepTwoString = "Hello, Hurricane Fiona";
echo "<p>$stepTwoString</p>";
letsChangeThisStringOne($stepTwoString);
echo "<p>$stepTwoString</p>";
letsChangeThisStringTwo($stepTwoString);
echo "<p>$stepTwoString</p>";

echo "<p>Step 3</p>";

$personAge = 37;

function printAge(&$age) {
    echo "<p> You are $age years old";
}

printAge($personAge);

echo "<p>Step 4</p>";
echo "<p><a href=overalphpinfo.php target=_blank>OveralPHPInfo</a></p>";
    echo "<p><a href=specificphpinfo.php target=_blank>SpecificPHPInfo</a></p>";

?>





</body>

</html>