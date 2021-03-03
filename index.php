<?php
error_reporting(E_ERROR | E_PARSE);
error_reporting(E_ALL);
ini_set('display_errors', 'On');

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
session_cache_expire(180000);
session_start();

/**
 * Configuration
 */
$path_parts = pathinfo($_SERVER['SCRIPT_FILENAME']);
$__config = parse_ini_file("{$path_parts['dirname']}/config.ini", true);
$_SESSION['ini'] = $__config;

/**
 * Includes
 */
include('./classes/class.controller.php');
include('./classes/class.category.php');
include('./classes/class.product.php');
include('./crud.php');

/**
 * Routes/Pages
 */
if (isset($_GET['page'])) {
    if ($_GET['page'] === 'dashboard') {
        include("./views/dashboard/dashboard.php");
    } else if ($_GET['page'] == 'addCategory') {
        include("./views/category/addCategory.php");
        js_link('./assets/js/category.js');
    } else if ($_GET['page'] == 'addProduct') {
        include("./views/product/addProduct.php");
        js_link('./assets/js/product.js');
    } else if ($_GET['page'] == 'products') {
        include("./views/product/products.php");
        js_link('./assets/js/product.js');
    } else if ($_GET['page'] == 'categories') {
        include("./views/category/categories.php");
        js_link('./assets/js/category.js');
    } else if ($_GET['page'] == 'editProducts') {
        include("./views/product/addProduct.php");
        js_link('./assets/js/product.js');
    } else if ($_GET['page'] == 'editCategory') {
        include("./views/category/addCategory.php");
        js_link('./assets/js/category.js');
    } else {
        print('PAGE NOT FOUND');
    }
} else {
    include("./views/dashboard/dashboard.php");
}

/**
 *
 * Function to include JavaScript Page
 * @return string
 */
function js_link($src)
{
    if (file_exists($src)) {
        return print '<script type="text/javascript" src="' . $src . '"></script>';
    }
    return "<!-- Unable to load " . $src . "-->";
}