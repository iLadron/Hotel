<?php

class User
{

    public static function login($data)
    {
        $_SESSION["LOGIN"] = true;
        $_SESSION["USER_ID"] = $data["id"];
        $_SESSION["USER_NAME"] = $data["name"];
        $_SESSION["USER_ROLE"] = $data["role"];
        $_SESSION["USER_LOGIN"] = $data["login"];  

    }


    public static function isLogin()
    {        
        if (isset($_SESSION["LOGIN"]) && $_SESSION["LOGIN"]) {
            return true;
        } else {
            return false;
        }
    }

    public static function isAdmin()
    {
        return (isset($_SESSION["USER_ROLE"]) && $_SESSION["USER_ROLE"] == ADMIN_ROLE);
    }

    public static function getID()
    {
        if (isset($_SESSION["USER_ID"])) {
            return $_SESSION["USER_ID"];
        }else{return false;}
        
    }


    public static function getLogin()
    {        
        if (isset($_SESSION["USER_LOGIN"])) {
            return $_SESSION["USER_LOGIN"];
        }else{
        return false;
        }
    }

    public static function logout()
    {           
        session_destroy();
    }
}
