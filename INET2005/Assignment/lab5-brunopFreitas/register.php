<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>INET2005 - Lab 5</title>
    <script src="main.js" defer></script>
</head>
<body>
<h1>New User Register Form</h1>
<a href="login.html">Go Back</a>
<?php
require_once ('step2.php');
require_once ('validPassword.php');
$showFormFlag=true;
if(isset($_POST['Submit'])) {
    //Validating passwords
    $isPasswordValid = validatePassword($_POST['password']);
    if($isPasswordValid) {
        if(!empty($_POST['username'])
            && !empty($_POST['password'])) {
            $result = addUser($_POST['username'],$_POST['password']);
            if ($result) {
                $showFormFlag=false;
                echo "<h2>New user included!</h2> ";
                echo "<h2>Number of rows affected: $result</h2> ";
            } else {
                echo "<h2>User already registered!</h2> ";
            }
        }
    } else {
        echo "<h2 id='passwordText'>Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.</h2> ";
    }
}
?>
<form action="register.php" method="post" id="loginForm" <?php if ($showFormFlag==false){?>style="display:none"<?php } ?> onsubmit="return checkform(this);">
    <p>Username: <input type="text" name="username" id="userName" status="false" value="<?php echo $_POST['username']?>"></p>
    <p>Password: <input type="password" name="password" id="password" status="false"></p>
    <p><input type="button" name="Submit" id="Submit" value="Insert" onclick="validateRegisterForm()"></p>
    <!-- START CAPTCHA -->
    <br>
    <div class="capbox">

        <div id="CaptchaDiv"></div>

        <div class="capbox-inner">
            Type the number:<br>

            <input type="hidden" id="txtCaptcha">
            <input type="text" name="CaptchaInput" id="CaptchaInput" size="15"><br>

        </div>
    </div>
    <br><br>
    <!-- END CAPTCHA -->
</form>
</body>
</html>