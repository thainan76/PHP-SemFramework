<?php
    $productController = new Product();
    $allProducts = $productController->getProducts();
?>

<!doctype html>
<html ⚡ xmlns="http://www.w3.org/1999/html">
<head>
    <title>Webjump | Backend Test | Dashboard</title>
    <meta charset="utf-8">
    <?php
        include('./views/link.php');
    ?>
</head>
    <!-- Header -->
    <?php
        include('./views/header.php');
    ?>
    <!-- Header -->
    <body>
        <!-- Main Content -->
        <main class="content">
            <div class="header-list-page">
                <h1 class="title">Dashboard</h1>
            </div>
            <div class="infor">
                You have <?php echo count($allProducts) > 0 ? count($allProducts) : 0 ?> products added on this store: <a
                        href="/assessment-backend-xp?page=addProduct" class="btn-action">Add new Product</a>
            </div>
            <ul class="product-list">
                <?php
                foreach ($allProducts as $product) {
                    echo '<li>
                            <div class="product-image">
                              <img src="'.$product['image'].'" layout="responsive" width="164" height="145" alt="' . $product['nome'] . '"/>
                            </div>
                            <div class="product-info">
                              <div class="product-name"><span>' . $product['nome'] . ' </span></div>
                              <div class="product-price"><span class="special-price">' . $product['quantidade'] . ' available</span> <span>$ ' . $product['preco'] . '</span></div>
                            </div>
                          </li>';
                }
                ?>
            </ul>
        </main>
        <!-- Main Content -->
        <?php
            include('./views/script.php');
        ?>
        <!-- Footer -->
        <?php
            include('./views/footer.php');
        ?>
        <!-- Footer -->
    </body>
</html>
