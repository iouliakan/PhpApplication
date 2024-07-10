<?php

namespace App\Libraries; 

class Hash 
{
    //Encrypt user password
    public static  function encrypt($password)
    {
       return password_hash($password, PASSWORD_BCRYPT); 
    }

    //check user password with db password 

    public static function check($userPassword, $dbUserPassword)
    {
        if(password_verify($userPassword, $dbUserPassword))
        {
            return true; 
        }
        return false; 
    }
}