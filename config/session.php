<?php
/**
 *Session Class
 **/
class Session{
    public static function init(){
            if (session_id() == NULL) {
                session_start();
            } else {
            if (session_status() == NULL) {
                session_start();
            }
        }
    }

    public static function set($key, $val){
        $_SESSION[$key] = $val;
    }

    public static function get($key){
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }

    public static function checkSession(){
        self::init();
        if (self::get("adminLogin") == false) {
            self::destroy();
            header("Location:login.php");
        }
    }

    public static function checkLogin(){
        self::init();
        if (self::get("access_level") == 100) {
            header("Location:index.php");
        }
    }

    public static function destroy(){
        session_destroy();
        header("Location:login.php");
    }
}
?>