<?php
/**
 * Created by PhpStorm.
 * User: Thainan
 * Date: 26/02/2021
 * Time: 21:30
 */

class Category extends Controller
{

    private $_connection;
    private $_controller;

    public function __construct() {
        $this->_controller = new Controller();
        $this->_connection = $this->_controller->connectionMysql($_SESSION['ini']['HOST'], $_SESSION['ini']['USER'], $_SESSION['ini']['PASSWORD'], $_SESSION['ini']['DATABASE']);
    }

    /**
     * Function to get all categories
     * @return null|mysqli_result
     */
    public function getCategories () {
        $_sql = 'SELECT * FROM categories';
        $result_query = mysqli_query($this->_connection, $_sql) or die ('Erro na conexão');

        $a = 0;
        while($row = mysqli_fetch_array($result_query, MYSQLI_NUM)){
            $_consult[$a] = array (
                'id' => $row[0],
                'nome' => $row[1]
            );
            $a++;
        }

        return isset($_consult) ? $_consult : null;
    }


    /**
     * Function add category
     * @return null
     * @param $_data
     * @param $_table
     */
    public function addCategory ($_data, $_table = 'categories') {

        $insertCategory = [];
        foreach ($_data as $key => $value) {
            $insertCategory[$key] = $value;
        }

        return $this->_controller->InsertGeneric($this->_connection, $_data, $_table);

    }


    /**
     * Function updated category
     * @return null
     * @param $_data
     * @param $_table
     */
    public function updatedCategory ($_data, $_table = 'categories') {

        $where = [];
        foreach ($_data as $key => $value) {
            if ($key == 'id') {
                $where[$key]= $value;
            }
        }

        return $this->_controller->UpdateGeneric($this->_connection, $_data, $_table, $where);

    }

    /**
     * Function delete category
     * @return null
     * @param $_data
     * @param $_table
     */
    public function deleteCategory ($_data, $_table = 'categories') {

        $where = [];
        foreach ($_data as $key => $value) {
            if ($key == 'id') {
                $where[$key]= $value;
            }
        }

        return $this->_controller->DeleteGeneric($this->_connection, $_table, $where);

    }

    /**
     * Function to get category by id
     * @return null|mysqli_result
     * @param $id
     */
    public function getCategoriesById ($id) {
        $_sql = "SELECT * FROM categories WHERE id={$id}";
        $result_query = mysqli_query($this->_connection, $_sql) or die ('Erro na conexão');

        $a = 0;
        while($row = mysqli_fetch_array($result_query, MYSQLI_NUM)){
            $_consult[$a] = array (
                'id' => $row[0],
                'nome' => $row[1]
            );
            $a++;
        }
        return isset($_consult) ? $_consult : null;
    }
}