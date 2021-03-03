<?php
    $product = new Product();
    $allProducts = $product->getProducts();
?>
<!doctype html>
<html ⚡>
<head>
  <title>Webjump | Backend Test | Products</title>
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
      <h1 class="title">Products</h1>
      <a href="/assessment-backend-xp?page=addProduct" class="btn-action">Add new Product</a>
    </div>
    <table class="data-grid">
      <tr class="data-row">
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Name</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">SKU</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Price</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Quantity</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Categories</span>
        </th>

        <th class="data-grid-th">
            <span class="data-grid-cell-content">Actions</span>
        </th>
      </tr>

        <?php
            foreach ($allProducts as $product) {
                echo '<tr class="data-row">
                        <td class="data-grid-td">
                           <span class="data-grid-cell-content">' . $product['nome'] .  '</span>
                        </td>
                      
                        <td class="data-grid-td">
                           <span class="data-grid-cell-content">' . $product['sku'] .  '</span>
                        </td>
                
                        <td class="data-grid-td">
                           <span class="data-grid-cell-content">' . $product['preco'] .  '</span>
                        </td>
                
                        <td class="data-grid-td">
                           <span class="data-grid-cell-content">' . $product['quantidade'] .  '</span>
                        </td>
                
                        <td class="data-grid-td">
                           <span class="data-grid-cell-content">' . $product['categoria'] .  '</span>
                        </td>
                      
                        <td class="data-grid-td">
                          <div class="actions">
                            <div class="action edit"><span>
                                <a class="buttonEdit" href="/assessment-backend-xp?page=editProducts&id='.$product['id'].'">Edit</a>
                                <a class="buttonDelete cursor-pointer" onclick="del('.$product['id'].')">Delete</a>
                            </span></div>
                          </div>
                        </td>
                      </tr>';
            }
        ?>
    </table>
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
