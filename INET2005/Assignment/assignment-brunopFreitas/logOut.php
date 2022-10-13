<?php
function logOut()
{
    session_start();
    session_destroy();
    header('location:login.html');
}