<?php

/**
 * Created by PhpStorm.
 * User: Thainan
 * Date: 26/02/2021
 * Time: 21:28
 */
class Controller
{

    /**
     * Function of connection to database
     * @return mysqli
     * @param $host
     * @param $user
     * @param $password
     * @param $database
    */
    public function connectionMysql($host = 'localhost', $user = 'root', $password = '', $database = 'ecommerce')
    {
        $mysqli = new mysqli($host, $user, $password, $database);

        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }

        return $mysqli;
    }

    /**
     * Function generic to insert
     * @return null
     * @param $_connection
     * @param $_data
     * @param $_table
     */
    public function InsertGeneric($_connection, $_data, $_table)
    {
        foreach ($_data as $key => $value) {
            $value = mysqli_real_escape_string($_connection, $value);
            $set[] = "{$key}='{$value}'";
        }

        $set_final = implode(',', $set);

        $_sql = " 
            INSERT INTO
                {$_table}
            SET
                {$set_final}";

        $this->logMsg($_sql);

        $_res = mysqli_query($_connection, $_sql) or false;

        if ($_res == false) {
            return 'erro';
        } else {
            return mysqli_insert_id($_connection);
        }
    }

    /**
     * Function generic to update
     * @return null
     * @param $_connection
     * @param $_data
     * @param $_table
     * @param $_where
     */
    public function UpdateGeneric($_connection, $_data, $_table, $_where)
    {
        foreach ($_data as $key => $value) {
            $value = mysqli_real_escape_string($_connection, $value);
            $set[] = "{$key}='{$value}'";
        }

        $set_final = implode(',', $set);

        foreach ($_where as $key => $value) {
            $value = mysqli_real_escape_string($_connection, $value);
            $where[] = "{$key}='{$value}'";
        }

        $where_final = implode(' and ', $where);

        $_sql = " 
          UPDATE
            {$_table}
          SET
            {$set_final}
          WHERE
            {$where_final}";

        $this->logMsg($_sql);

        $_res = mysqli_query($_connection, $_sql) or false;

        return mysqli_affected_rows($_connection);

    }

    /**
     * Function generic to delete
     * @return null
     * @param $_connection
     * @param $_table
     * @param $_where
     */
    public function DeleteGeneric($_connection, $_table, $_where)
    {
        foreach ($_where as $key => $value) {
            $value = mysqli_real_escape_string($_connection, $value);
            $where[] = "{$key}='{$value}'";
        }

        $where_final = implode(' and ', $where);

        $_sql = " 
          DELETE
          FROM
            {$_table}
          WHERE
            {$where_final}";

        $this->logMsg($_sql);

        $_res = mysqli_query($_connection, $_sql) or false;

        return mysqli_affected_rows($_connection);

    }

    /**
     * Function make a log execution
     * @return void
     * @param $msg
     * @param $level
     * @param $file
     */
    public function logMsg( $msg, $level = 'info', $file = 'main' )
    {
        $levelStr = '';

        switch ( $level )
        {
            case 'info':
                $levelStr = 'INFO';
                break;

            case 'warning':
                $levelStr = 'WARNING';
                break;

            case 'error':
                $levelStr = 'ERROR';
                break;
        }

        $dateToName = date( 'Y-m-d H:i' );
        $date = date( 'Y-m-d H:i:s' );

        $file = $file . '_' . str_replace('-','_', str_replace(' ', '_', str_replace(':', '_', $dateToName))) . '.log';

        $msg = sprintf( "[%s] [%s]: %s%s", $date, $levelStr, $msg, PHP_EOL );

        file_put_contents('log/'.$file, $msg, FILE_APPEND );
    }

}