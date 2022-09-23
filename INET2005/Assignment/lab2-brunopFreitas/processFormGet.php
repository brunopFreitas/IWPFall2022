<!DOCTYPE html>
<html>
<head>
    <title>Process Page for Get</title>
</head>
<body>
<a href="inputget.html">Go Back</a>
<?php
echo "<p>Part B - Step 3</p>";
function findMyZodiacSign($month, $day)
{
    if(($month==3 && ($day>=21 && $day<=31)) || ($month==4 && ($day>=1 && $day<=19))) {
        return "Aries";

    } elseif (($month==4 && ($day>=20 && $day<=30)) || ($month==5 && ($day>=1 && $day<=20))) {
        return "Taurus";

    } elseif (($month==5 && ($day>=21 && $day<=31)) || ($month==6 && ($day>=1 && $day<=20))) {
        return "Gemini";

    } elseif (($month==6 && ($day>=21 && $day<=30)) || ($month==7 && ($day>=1 && $day<=22))) {
        return "Cancer";

    } elseif (($month==7 && ($day>=23 && $day<=31)) || ($month==8 && ($day>=1 && $day<=22))) {
        return "Leo, the coolest zodiac sign.";
    } elseif (($month==8 && ($day>=23 && $day<=31)) || ($month==9 && ($day>=1 && $day<=22))) {
        return "Virgo";

    } elseif (($month==9 && ($day>=23 && $day<=30)) || ($month==10 && ($day>=1 && $day<=22))) {
        return "Libra";

    } elseif (($month==10 && ($day>=23 && $day<=31)) || ($month==11 && ($day>=1 && $day<=21))) {
        return "Scorpio";

    } elseif (($month==11 && ($day>=22 && $day<=30)) || ($month==12 && ($day>=1 && $day<=21))) {
        return "Sagittarius";

    } elseif (($month==12 && ($day>=22 && $day<=31)) || ($month==1 && ($day>=1 && $day<=19))) {
        return "Capricorn";

    } elseif (($month==1 && ($day>=20 && $day<=31)) || ($month==2 && ($day>=1 && $day<=18))) {
        return "Aquarius";

    } elseif (($month==2 && ($day>=19 && $day<=28)) || ($month==3 && ($day>=1 && $day<=20))) {
        return "Pisces";

    } else {
        return "There's no such date " . $month . "/" . $day;
    }

}

echo "<p>Hello: " . $_GET['firstName'] . " " . $_GET['lastName'] . "</p>";
echo "<p>Your zodiac sign is: " . findMyZodiacSign($_GET['bMonth'], $_GET['bDay']) . "</p>";

?>
</body>
</html>