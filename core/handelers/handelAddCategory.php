<?php
include "../functions.php";
require "../../lib/category.php";
$errors=[];
$succes='';
session_start();

if($_SERVER['REQUEST_METHOD']=='POST'||$_SERVER['REQUEST_METHOD']=='get')
{
    if(isset($_POST['category'])&&!empty($_POST['category']))
    {
        $categoryData=santhizeInput($_POST['category']);
        if(empty($categoryData))
        {
            $errors[]="Please write the name of the category";
            $_SESSION['errors']=$errors;
            reDirect("../../admin/addCategory.php");
        }
        else
        {
            $category=new Category;

            $category->adNewCategory(
                ["name"=>$categoryData]
            );
            $succes='The category is inserted sucsessfully';
            $_SESSION['succes']=$succes;
            reDirect('handelAddCategory.php');
        }

    }
    else
    {
        $errors[]="Please write the name of the category";
        $_SESSION['errors']=$errors;
        reDirect("../../admin/addCategory.php");
    }

    
}
else
{
    $errors[]= 'usoported method';
    $_SESSION['errors']=$errors;
    reDirect("../../admin/addCategory.php");
}




?>