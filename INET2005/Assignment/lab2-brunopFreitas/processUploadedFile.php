<?php
    echo "<a href=input.html>Go Back</a>";
    echo "<p>Part C - Step 1</p>";
    $fileTmpName = $_FILES['userImage']['tmp_name'];
    $fileOrigName = $_FILES['userImage']['name'];
    $fileSize = $_FILES['userImage']['size'];
    $fileUploadError = $_FILES['userImage']['error'];
    $result = move_uploaded_file($fileTmpName,"uploads/".$fileOrigName);
    echo "<p>Temp: $fileTmpName</p>";
    echo "<p>Orig: $fileOrigName</p>";
    echo "<p>Size: $fileSize</p>";
    echo "<p>Error: $fileUploadError</p>";

    echo "<p>Part C - Step 3</p>";
    $file = "uploads/".$fileOrigName;
    $newfile = "/home/bruno/Documents/NSCC/Fall2022/git/IWPFall2022/INET2005/Assignment/lab2-brunopFreitas/uploads".$fileOrigName;
    if (!copy($file, $newfile)) {
        echo "<p>failed to copy $file...</p>";
    } else {
        echo "<p>The file $fileOrigName was moved from $file to $newfile!</p>";
    }
?>
