<?php
/**
*Session Class
**/
class Session{
 public static function init(){
  if (version_compare(phpversion(), '5.4.0', '<')) {
        if (session_id() == '') {
            session_start();
        }
    } else {
        if (session_status() == PHP_SESSION_NONE) {
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

 public static function checkSession(){ //Dùng để check phiên đăng nhập, tránh người khác biết đường dẫn để vào
    self::init();
    if (self::get("login")== false) {
     self::destroy();
     header("Location:../index.php"); //trỏ về trang đăng nhập
    }
 }

 public static function checkLogin(){
    self::init();
    if (self::get("login")== true) {
     header("Location:pages/index.php");
     exit();
    }
 }

 public static function destroy(){  //Dùng cho logout
  session_destroy();
  header("Location:../index.php");
 }
}
?>