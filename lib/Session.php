<?php

/**
 * Class Session
 *
 * This class provides methods for handling user sessions.
 */
class Session {
    /**
     * Initialize the session.
     */
    public static function init(){
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
    }

    /**
     * Set a session variable.
     *
     * @param string $key The key of the session variable.
     * @param mixed $val The value to set for the session variable.
     */
    public static function set($key, $val){
        $_SESSION[$key] = $val;
    }

    /**
     * Get the value of a session variable.
     *
     * @param string $key The key of the session variable to retrieve.
     *
     * @return mixed|false The value of the session variable if found, or false otherwise.
     */
    public static function get($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }
        return false;
    }

    /**
     * Set the login status in the session.
     *
     * @param bool $bool The login status to set (true for logged in, false for logged out).
     */
    public static function setLogin($bool){
        self::set('login', $bool);
    }

    /**
     * Check if a user is logged in.
     *
     * @return bool True if the user is logged in, false otherwise.
     */
    public static function checkLogin(){
        return self::get('login') || false;
    }

    /**
     * Destroy the session and redirect to the login page.
     */
    public static function destroy(){
        session_destroy();
        self::setLogin(false);
        header("Location: login.php");
    }
}
?>
