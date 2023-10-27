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
            reDirect("../../admin/updateCategory.php");
        }
        else
        {
            $category=new Category;
            $updatedCategoryId=$_POST['id'];
            $newData=$_POST['category'];
            $category->updateCategory($updatedCategoryId,
            ["name"=>$newData]
        );
            $succes="The category is updated succesfully";
            $_SESSION['succes']=$succes;
            reDirect('../../admin/updateCategory.php');
        }

    }
    else
    {
        $errors[]="Please write the name of the category";
        $_SESSION['errors']=$errors;
        reDirect("../../admin/updateCategory.php");
    }

    
}
else
{
    $errors[]= 'usoported method';
    $_SESSION['errors']=$errors;
    reDirect("../../admin/updateCategory.php");
}




?>