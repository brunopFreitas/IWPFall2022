<?php

require_once '../controller/CustomerController.php';

$custController = new CustomerController();

if(isset($_GET['idUpdate']))
{
    $custController->updateAction($_GET['idUpdate']);
}
elseif ($_GET['create']){
    $custController->insertAction();
}
elseif (isset($_POST['InsertBtn'])){
    $custController->commitInsertAction($_POST['firstName'],$_POST['lastName']);
}
elseif (isset($_GET['idDelete'])){
    $custController->deleteAction($_GET['idDelete']);
}
elseif (isset($_POST['UpdateBtn']))
{
    $custController->commitUpdateAction($_POST['editCustId'],$_POST['firstName'],$_POST['lastName']);
}
else
{
    $custController->displayAction();
}

?>