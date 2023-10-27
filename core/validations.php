<?php

function emailVal($input)
{
   if(filter_var($input,FILTER_VALIDATE_EMAIL))
   {
    return true;
   }
   else
   {
    return false;
   }
}


function reqVal( $input)
{
    if(!empty($input))
    {
        return true;
    }
    else
    {
        return false;
    }

}




?>