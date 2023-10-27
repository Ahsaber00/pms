<?php
require_once("db.php");

class Content extends db
{
    public function addNewContent($data)
    {
        $result=$this->insert('products',$data)->excu();
        return $result;

    }
    public function getContentList()
    {
        return $this->select("products","*")->getAll();
    }

    public function deleteContent($id)
    {
        return $this->delete("products")->where("id","=",$id)->excu();
    }

    public function updateContent($id,$data)
    {
        return $this->update("products",$data)->where("id","=",$id)->excu();
    }
}





?>