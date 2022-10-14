<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>INET2005 - Lab 4</title>
</head>
<body>
<form action="index.php" method="post">
    <fieldset style="border: 1px black solid">
        <legend style="border: 1px black solid;margin-left: 1em; padding: 0.2em 0.8em ">Circle</legend>
        <label>Radius:<input type="text" name="circleRadius" value="<?php echo $_POST['circleRadius']?>"></label>
        <label>Percentage:<input type="text" name="circlePercentage" value="<?php echo $_POST['circlePercentage']?>"></label>
        <input type="radio" id="grow" name="intypeCircle" value="grow">
        <label for="grow">Grow</label>
        <input type="radio" id="shrink" name="intypeCircle" value="shrink">
        <label for="shrink">Shrink</label>
    </fieldset>
    <fieldset style="border: 1px black solid">
        <legend style="border: 1px black solid;margin-left: 1em; padding: 0.2em 0.8em ">Rectangle</legend>
        <label>Length:<input type="text" name="rectangleLength" id="rectangleLength" value="<?php echo $_POST['rectangleLength']?>"></label>
        <label>Height:<input type="text" name="rectangleHeight" id="rectangleHeight" value="<?php echo $_POST['rectangleHeight']?>"></label>
    </fieldset>
    <fieldset style="border: 1px black solid">
        <legend style="border: 1px black solid;margin-left: 1em; padding: 0.2em 0.8em ">Triangle</legend>
        <label>Base:<input type="text" name="triangleBase" id="triangleBase" value="<?php echo $_POST['triangleBase']?>"></label>
        <label>Height:<input type="text" name="triangleHeight" id="triangleHeight" value="<?php echo $_POST['triangleHeight']?>">
        <label>New Height:<input type="text" name="triangleNewHeight" value="<?php echo $_POST['triangleNewHeight']?>"></label>
        <input type="radio" id="grow" name="intypeTriangle" value="grow">
        <label for="grow">Grow</label>
    </fieldset>
    <br/>
    <input type="submit" value="Calculate">
</form>
<?php
include_once("Circle.php");
include_once("Rectangle.php");
include_once("Triangle.php");

//$_POST['circleRadius'];
//$_POST['rectangleLength'];
//$_POST['rectangleHeight'];
//$_POST['triangleBase'];
//$_POST['triangleHeight'];
//$_POST['intype']

if ($_POST['circleRadius']) {
    $myCircle = new Circle("Circle",$_POST['circleRadius']);
    $result = $myCircle->CalculateArea();
    if(isset($_POST['intypeCircle'])) {
        $result = $myCircle->Resize($_POST['circlePercentage'],$_POST['intypeCircle']);
    }
    echo "<h1>".$myCircle->getName() ." Area is: </h1>";
    echo "<h2>".$result."</h2>";
}
if ($_POST['rectangleLength'] && $_POST['rectangleHeight'] ) {
    $myRectangle = new Rectangle("Rectangle",$_POST['rectangleLength'],$_POST['rectangleHeight']);
    $result = $myRectangle->CalculateArea();
    echo "<h1>". $myRectangle->getName() ." Area is: </h1>";
    echo "<h2>".$result."</h2>";
}
if ($_POST['triangleBase'] && $_POST['triangleHeight']) {
    $myTriangle = new Triangle("Triangle",$_POST['triangleBase'],$_POST['triangleHeight']);
    $result = $myTriangle->CalculateArea();
    if(isset($_POST['intypeTriangle'])) {
        $result = $myTriangle->Resize($_POST['triangleNewHeight'],$_POST['intypeTriangle']);
    }
    echo "<h1>". $myTriangle->getName() ." Area is: </h1>";
    echo "<h2>".$result."</h2>";
}
?>
</body>
</html>
