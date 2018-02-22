<?php

/**
 * Description of DBUtil
 *
 * @author Robby
 */
class DBUtil {

    public static function createdPDOConnection() {
        $link = new PDO("mysql:host=localhost;dbname=your_dbname", "username",
                "password");
        $link->setAttribute(PDO::ATTR_AUTOCOMMIT, FALSE);
        $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $link;
    }

    public static function closePDOConnection(PDO $link) {
        if (isset($link)) {
            $link = NULL;
        }
    }

}
