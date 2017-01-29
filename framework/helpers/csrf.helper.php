<?php

    namespace F3il;    
    defined('__F3IL__') or die('Acces interdit');

    abstract class CsrfHelper {
        const SESSION_KEY = 'f3il.csrfToken';
        
        public static function getToken(){
            if(!isset($_SESSION[self::SESSION_KEY])){
                $_SESSION[self::SESSION_KEY] = hash('sha256',  uniqid());
            }
            
            return $_SESSION[self::SESSION_KEY];
        }
        
        public static function csrf(){
           
            ?><input type="hidden" name="<?php echo self::getToken();?>" value="0"/>
            <?php
        }
        
        public static function checkToken(){
            if(!isset($_SESSION[self::SESSION_KEY]) || !isset($_POST[self::getToken()])){
                ?><pre><?php print_r($_SESSION) ?> </pre>
                <pre><?php print_r($_POST) ?> </pre>
                <?php
                return false;
            }
            else if($_POST[self::getToken()] != "0"){
                return false;
            }
            else{
                return true;
            }
        }
    }