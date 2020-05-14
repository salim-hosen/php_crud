<?php
  class Session{
    public static function init(){
      session_start();
    }

    public static function set($key,$val){
      if(isset($key) && isset($val)){
        $_SESSION[$key] = $val;
      }else{
        return false;
      }
    }

    public static function get($key){
      if(isset($_SESSION[$key])){
        return $_SESSION[$key];
      }else{
        return false;
      }
    }

    public static function isLoginTrue($key){
      if(self::get($key) == true){
        header("Location: index.php");
        exit();
      }else{
        return false;
      }
    }

    public static function isLoginFalse($key){
      if(empty(self::get($key))){
        header("Location: login.php");
        exit();
      }else{
        return false;
      }
    }

    public static function destroy(){
      session_destroy();
    }
  }
?>
