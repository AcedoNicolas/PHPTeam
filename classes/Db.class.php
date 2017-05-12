<?php
/**
 * Created by PhpStorm.
 * User: jorisdelvaux
 * Date: 10/05/17
 * Time: 18:51
 */abstract class Db
{
    private static $conn = null;

    public static function getInstance()
    {
        if (isset(self::$conn)) {
            return self::$conn;
        } else {
            self::$conn = new PDO('mysql:host=localhost; dbname=IMDterest', 'root', '');
            //self::$conn = new PDO("mysql:host=localhost;dbname=jorisd1q_IMDterest", "jorisd1q_joDeis", "jo-ris-D-22L");
            return self::$conn;
        }
    }
}
