<?php
/**
 * Created by PhpStorm.
 * User: Thainan
 * Date: 26/02/2021
 * Time: 21:28
 */

class Product extends Controller
{

    private $_connection;
    private $_controller;
    private $_category;

    /**
     * Function construct
     */
    public function __construct() {
        $this->_controller = new Controller();
        $this->_category = new Category();
        $this->_connection = $this->_controller->connectionMysql($_SESSION['ini']['HOST'], $_SESSION['ini']['USER'], $_SESSION['ini']['PASSWORD'], $_SESSION['ini']['DATABASE']);
    }

    /**
     * Function to get all products
     * @return bool|mysqli_result|array
     */
    public function getProducts () {
        $_sql = 'SELECT * FROM products order by id DESC';
        $result_query = mysqli_query($this->_connection, $_sql) or die ('Erro na conexão');

        $a = 0;
        while($row = mysqli_fetch_array($result_query, MYSQLI_NUM)){
            $category = $this->_category->getCategoriesById($row[3]);
            $_consult[$a] = array (
                'id' => $row[0],
                'nome' => $row[1],
                'quantidade' => $row[2],
                'id_categoria' => $row[3],
                'categoria' => $category[0]['nome'],
                'preco' => number_format($row[4], 2,',','.'),
                'sku' => $row[5],
                'descricao' => $row[6],
                'image' => $row[7]
            );
            $a++;
        }

        return isset($_consult) ? $_consult : [];
    }

    /**
     * Function add products
     * @return null
     * @param $_data
     * @param $_table
     */
    public function addProduct ($_data, $_table = 'products') {

        $insertProduct = [];
        foreach ($_data as $key => $value) {
            $insertProduct[$key] = $value;
        }

        return $this->_controller->InsertGeneric($this->_connection, $_data, $_table);

    }

    /**
     * Function updated products
     * @return null
     * @param $_data
     * @param $_table
     */
    public function updatedProduct ($_data, $_table = 'products') {

        $where = [];
        foreach ($_data as $key => $value) {
            if ($key == 'id') {
                $where[$key]= $value;
            }
        }

        return $this->_controller->UpdateGeneric($this->_connection, $_data, $_table, $where);

    }

    /**
     * Function delete product
     * @return null
     * @param $_data
     * @param $_table
     */
    public function deleteProduct ($_data, $_table = 'products') {

        $where = [];
        foreach ($_data as $key => $value) {
            if ($key == 'id') {
                $where[$key]= $value;
            }
        }

        return $this->_controller->DeleteGeneric($this->_connection, $_table, $where);

    }

    /**
     * Function get all products
     * @return null
     * @param $id
     */
    public function getProductById ($id) {
        $_sql = 'SELECT * FROM products where id='.$id;
        $result_query = mysqli_query($this->_connection, $_sql) or die ('Erro na conexão');

        $a = 0;
        while($row = mysqli_fetch_array($result_query, MYSQLI_NUM)){
            $_consult[$a] = array (
                'id' => $row[0],
                'nome' => $row[1],
                'quantidade' => $row[2],
                'id_categoria' => $row[3],
                'preco' => number_format($row[4], 2,',','.'),
                'sku' => $row[5],
                'descricao' => $row[6],
                'image' => $row[7]
            );
            $a++;
        }

        return isset($_consult) ? $_consult : [];
    }

}