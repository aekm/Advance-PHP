<?php

class Model
{
    public static $conn = '';

    function __construct()
    {
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'your-database-name';
        $attr = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

        self::$conn = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname, $username, $password, $attr);
        self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       
    } #connect to database

   

    function doSelect($sql, $values = [], $fetch = '', $fetchStyle = PDO::FETCH_ASSOC)
    {
        $stmt = self::$conn->prepare($sql);
        foreach ($values as $key => $value) {
            $stmt->bindValue($key + 1, $value);

        }
        $stmt->execute();
        if ($fetch == '') {
            $result = $stmt->fetchAll($fetchStyle);
        } else {
            $result = $stmt->fetch($fetchStyle);
        }
        return $result;
    } #for select data from database


    function doQuery($sql, $values = [])
    {
        $stmt = self::$conn->prepare($sql);
        foreach ($values as $key => $value) {
            $stmt->bindValue($key + 1, $value);
        }
        $stmt->execute();

    } #for update tables or delete data from tables and database

   

    public static function sessionInit()
    {
        @session_start();
    } #start session

    public static function sessionSet($name, $value)
    {
        $_SESSION[$name] = $value;

    } #set session 

    public static function sessionGet($name)
    {
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        } else {
            return false;
        }
    } #get session

    public static function getBasketCookie()
    {
        if (isset($_COOKIE['basket'])) {
            $cookie = $_COOKIE['basket'];
        } else {
            $expire = time() + 7 * 24 * 3600;
            $value = time();
            setcookie('your-cookie-name', $value, $expire, '/');
            $cookie = $value;
        }
        return $cookie;
    } #set cookie if needed

  

}
