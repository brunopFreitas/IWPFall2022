<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INET2005 - Lab 2 - Part 4</title>
</head>
<body>
<h1>Display specific PHP information</h1>
<?php
echo "<p>Step 4</p>";
$phpversion = phpversion();
$zendVersion = zend_version();
$mimeContent = mime_content_type('php.ini');

echo "<h1> This page was rendered in PHP version $phpversion </h1>";
echo "<p>Php Version: $phpversion</p>";
echo "<p>Zend Version: $zendVersion</p>";
echo "<p>Mime type: $mimeContent</p>";
?>

</body>
</html>