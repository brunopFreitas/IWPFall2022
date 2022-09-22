<img width="150px" src="https://w0244079.github.io/nscc/nscc-jpeg.jpg" >

# INET2005 - LAB 2

## PART C – POST/GET

### Instructions

#### Step 1: Create a Two-Part Form Using POST
1.	Create a static HTML page (i.e. an “input.html” page and not an “input.php” page) that contains a form with the following elements:
*	First name textbox.
*	Last name textbox.
*	Height in feet textbox.
*	Height in inches textbox.
2.	Add a PHP File to handle the form submitted via POST:
*	The PHP file will output a message like the following based on the input on the HTML form:

```sh
Your first name is: John
Your last name is:  Doe
Your height in metres is:  1.62
```

> NOTE: Your PHP code will obviously need to contain logic to take an entered height in feet and inches and figure out the height in metres.

#### Step 2: Create a Two-Part Form Using GET

1.	Create a static HTML page that contains a form with the following elements:
*	First name textbox.
* Last name textbox.
*	Birthday month textbox.
*	Birthday day textbox.
2.	Add a PHP File to handle the form submitted via GET:
*	The PHP file will output a message like the following based on the input on the HTML form:

```sh
Hello, John Doe! 
Your zodiac sign is:  Gemini
```

> NOTE: Your PHP code will obviously need to contain logic to take an entered birth month and day and figure out the Zodiac Sign.

#### Step 3: Add a File Uploader to your Two-Part Form Using POST from Step 1

1.	Add a control to your static HTML page from Step 1 to allow the user to select a file to upload to the server (e.g. a picture of themselves).
2.	Modify the  PHP File from Step 1 to handle the posted file :
* The PHP file will output a message like the following based on the file uploaded on the HTML form:
```sh
Tmp: C:\wamp\tmp\php1B9.tmp 
Orig: mikeandaaron.JPG 
Size: 1379618 
Error: 0 
```
3.	Copy the uploaded file from its temp location on the web server to a subfolder of your website and print a message if successfully stored.
