<?php
include "../functions.php";
require "../../lib/category.php";
require "../../lib/content.php";
$errors=[];
$succes='';
session_start();

if($_SERVER['REQUEST_METHOD']=='POST'||$_SERVER['REQUEST_METHOD']=='get')
{
    foreach($_POST as $key=>$value)
    {
        $$key=santhizeInput($value);
        
    }
    $image_name=$_FILES['cover']['name'];
    $image_tmp=$_FILES['cover']['tmp_name'];
    move_uploaded_file($image_tmp,"../../design/uploadedCover/". $image_name);

    
    $contentData=[
            
        "name"=>$name,
        "category_id"=>$categories,
        "cover"=>$image_name,
        "description"=>$description
        
        
    ];
    
    

    
    if(empty($contentData['name']))
        {
            $errors[]="Please enter the name of the content";
            $_SESSION['errors']=$errors;
            reDirect("../../admin/addContent.php");
        }
    if(empty($contentData['description']))
        {
            $errors[]="Please enter the description of the content";
            $_SESSION['errors']=$errors;
            reDirect("../../admin/addContent.php");
        }
    if(empty($contentData['category_id']))
        {
            $errors[]="Please enter the categoryID";
            $_SESSION['errors']=$errors;
            reDirect("../../admin/addContent.php");
        }
    if(empty($_FILES['cover']))
        {
            $errors[]="Please upload the item cover";
            $_SESSION['errors']=$errors;
            reDirect("../../admin/addContent.php");
        }
    if(!empty($contentData["name"]&&!empty($contentData["description"]&&!empty($contentData["category_id"]&&!empty($contentData["cover"])))))
        {
            $content=new Content;

            $content->addNewContent($contentData);
            $succes='The content is added sucsessfully';
            $_SESSION['succes']=$succes;
            reDirect('../../admin/addContent.php');
        }

    }

    

else
{
    $errors[]= 'usoported method';
    $_SESSION['errors']=$errors;
    reDirect("../../admin/addContent.php");
}




