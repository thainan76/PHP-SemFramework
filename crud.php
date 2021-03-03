<?php

/**
 *  Request of AJAX
 */

if (isset($_GET['method'])) {

    /**
     * Configuration
     */
    $path_parts = pathinfo($_SERVER['SCRIPT_FILENAME']);
    $__config = parse_ini_file("{$path_parts['dirname']}/config.ini", true);
    $_SESSION['ini'] = $__config;

    include('./classes/class.controller.php');
    include('./classes/class.category.php');
    include('./classes/class.product.php');

    if ($_GET['method'] == 'addProduct') {
        $product = new Product();
        return $product->addProduct($_POST['val'], 'products');
    } else if ($_GET['method'] == 'editProduct') {
        $product = new Product();
        return $product->updatedProduct($_POST['val'], 'products');
    } else if ($_GET['method'] == 'deleteProduct') {
        $product = new Product();
        return $product->deleteProduct($_POST['val'], 'products');
    } else if ($_GET['method'] == 'addCategory') {
        $category = new Category();
        return $category->addCategory($_POST['val'], 'categories');
    } else if ($_GET['method'] == 'editCategory') {
        $category = new Category();
        return $category->updatedCategory($_POST['val'], 'categories');
    } else if ($_GET['method'] == 'deleteCategory') {
        $category = new Category();
        return $category->deleteCategory($_POST['val'], 'categories');
    }
}
