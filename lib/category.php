<?php

require "db.php";

class Category extends db
{
    public function adNewCategory($data)
    {
        $result=$this->insert('category',$data)->excu();
        return $result;

    }
    public function getcategorylist()
    {
        return $this->select("category","*")->getAll();
    }

    public function deleteCategory($id)
    {
        return $this->delete("category")->where("id","=",$id)->excu();
    }


    public function updateCategory($id,$data)
    {
        return $this->update("category",$data)->where("id","=",$id)->excu();
    }
}







?>