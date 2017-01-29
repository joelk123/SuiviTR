<?php
namespace F3il;
defined('__F3IL__') or die('Acces interdit');

abstract class Messenger {
    const SESSION_KEY = "f3il.messenger";
    
    public static function setMessage($message){
         $_SESSION[self::SESSION_KEY] = htmlspecialchars($message);
    }
    
    public static function getMessage(){
        if (!isset($_SESSION[self::SESSION_KEY])){
            return "";
        }
        else{
            $tmp_messages = $_SESSION[self::SESSION_KEY];
            unset($_SESSION[self::SESSION_KEY]);
            return $tmp_messages;
        }
    }
    
    public static function hasMessage(){
        if (!isset($_SESSION[self::SESSION_KEY])){
            return false;
        }
        return true;
    }
}
